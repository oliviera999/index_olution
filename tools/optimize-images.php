<?php
/**
 * Optimise les images de assets/img (JPEG/PNG) avec GD :
 *  - redimensionne à MAX_DIM px de large/haut maximum (proportions conservées) ;
 *  - applique la rotation EXIF avant traitement (sinon les photos d'appareil
 *    pivotées s'afficheraient couchées une fois l'EXIF retiré) ;
 *  - ré-encode JPEG (qualité JPEG_QUALITY) et PNG (compression max) ;
 *  - ne remplace le fichier que si le résultat est plus petit que l'original.
 *
 * Usage, depuis la racine du dépôt :
 *   php tools/optimize-images.php           # applique
 *   php tools/optimize-images.php --dry-run # liste ce qui serait fait
 *
 * Après exécution, régénérer les dimensions du portfolio :
 *   php tools/gen-portfolio-dims.php
 */

const MAX_DIM = 1920;
const JPEG_QUALITY = 82;

$dryRun = in_array('--dry-run', $argv, true);
$root = dirname(__DIR__);
$dir = $root . '/assets/img';

$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS));
$totalBefore = 0;
$totalAfter = 0;
$changed = 0;

foreach ($it as $file) {
    $path = $file->getPathname();
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    if (!in_array($ext, ['jpg', 'jpeg', 'png'], true)) continue;

    $sizeBefore = filesize($path);
    $info = @getimagesize($path);
    if (!$info) { fwrite(STDERR, "Illisible, ignoré : $path\n"); continue; }
    [$w, $h] = $info;
    $isJpeg = $info[2] === IMAGETYPE_JPEG;
    $isPng  = $info[2] === IMAGETYPE_PNG;

    // Rotation EXIF (JPEG uniquement)
    $orientation = 1;
    if ($isJpeg && function_exists('exif_read_data')) {
        $exif = @exif_read_data($path);
        if (!empty($exif['Orientation'])) $orientation = (int) $exif['Orientation'];
    }

    $needsResize = max($w, $h) > MAX_DIM;
    $needsRotate = $orientation > 1;
    // PNG déjà petits : seul un resize justifie de toucher au lossless
    if ($isPng && !$needsResize) { $totalBefore += $sizeBefore; $totalAfter += $sizeBefore; continue; }

    $img = $isJpeg ? @imagecreatefromjpeg($path) : @imagecreatefrompng($path);
    if (!$img) { fwrite(STDERR, "Décodage impossible : $path\n"); continue; }

    if ($needsRotate) {
        $angle = [3 => 180, 6 => -90, 8 => 90][$orientation] ?? 0;
        if ($angle) {
            $img = imagerotate($img, $angle, 0);
            [$w, $h] = [imagesx($img), imagesy($img)];
        }
    }

    if ($needsResize) {
        $scale = MAX_DIM / max($w, $h);
        $nw = (int) round($w * $scale);
        $nh = (int) round($h * $scale);
        $dst = imagecreatetruecolor($nw, $nh);
        if ($isPng) {
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
        }
        imagecopyresampled($dst, $img, 0, 0, 0, 0, $nw, $nh, $w, $h);
        imagedestroy($img);
        $img = $dst;
    }

    $tmp = $path . '.tmp';
    if ($isJpeg) {
        imageinterlace($img, true); // JPEG progressif
        imagejpeg($img, $tmp, JPEG_QUALITY);
    } else {
        imagesavealpha($img, true);
        imagepng($img, $tmp, 9);
    }
    imagedestroy($img);

    $sizeAfter = filesize($tmp);
    $totalBefore += $sizeBefore;

    // Garde-fou : on ne remplace que si on gagne réellement (>5 %) ou si resize/rotation nécessaires
    if (($needsResize || $needsRotate) ? $sizeAfter < $sizeBefore : $sizeAfter < $sizeBefore * 0.95) {
        if ($dryRun) {
            printf("[dry-run] %s : %s -> %s%s\n", substr($path, strlen($root) + 1),
                round($sizeBefore / 1024) . ' Ko', round($sizeAfter / 1024) . ' Ko',
                $needsResize ? ' (resize)' : '');
            unlink($tmp);
            $totalAfter += $sizeAfter;
        } else {
            rename($tmp, $path);
            $totalAfter += $sizeAfter;
            $changed++;
        }
    } else {
        unlink($tmp);
        $totalAfter += $sizeBefore;
    }
}

printf("%s%d fichier(s) modifié(s) · total avant : %.1f Mo · après : %.1f Mo (-%.0f %%)\n",
    $dryRun ? '[dry-run] ' : '', $changed,
    $totalBefore / 1048576, $totalAfter / 1048576,
    $totalBefore > 0 ? (1 - $totalAfter / $totalBefore) * 100 : 0);
