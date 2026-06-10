<?php
/**
 * Vérifie l'intégrité des références d'images du site :
 *  - aucune image référencée ne doit manquer sur le disque (référence cassée) ;
 *  - aucune image présente dans assets/img ne doit être orpheline (jamais référencée).
 *
 * Sources des références : rendu HTML de index.php (src/href), data/portfolio.php,
 * url() de assets/css/style.css, et les images hero bg-1..N générées par boucle.
 *
 * Usage : php tools/check-images.php   (code retour 1 si problème — utilisable en CI)
 */

$root = dirname(__DIR__);
chdir($root);

$used = [];

// 1. Hero bg-1..N : lire $nbimages dans le source de index.php
$indexSrc = file_get_contents('index.php');
if (preg_match('/\$nbimages\s*=\s*(\d+)/', $indexSrc, $m)) {
    for ($i = 1; $i <= (int) $m[1]; $i++) {
        $used["assets/img/entete/bg-$i.jpg"] = true;
    }
}

// 2. Données du portfolio
foreach (require 'data/portfolio.php' as $item) {
    $used[$item['img']] = true;
}

// 3. Rendu HTML de toutes les pages PHP à la racine (src/href vers assets/img)
foreach (glob('*.php') as $page) {
    $_SERVER['SCRIPT_NAME'] = '/' . $page;
    ob_start();
    include $page;
    $html = ob_get_clean();
    preg_match_all('/(?:src|href|content)="(assets\/img\/[^"]+\.(?:jpe?g|png|gif|svg|webp))"/i', $html, $m);
    foreach ($m[1] as $p) $used[$p] = true;
}

// 4. CSS : url(../img/...)
$css = file_get_contents('assets/css/style.css');
preg_match_all('/url\(["\']?\.\.\/(img\/[^"\')]+)["\']?\)/i', $css, $m);
foreach ($m[1] as $p) $used['assets/' . $p] = true;

// Comparaison avec le disque
$present = [];
$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('assets/img', FilesystemIterator::SKIP_DOTS));
foreach ($it as $f) {
    if (preg_match('/\.(jpe?g|png|gif|svg|webp)$/i', $f->getFilename())) {
        // l'itérateur est ouvert sur un chemin relatif : pathname déjà relatif à la racine
        $present[str_replace('\\', '/', $f->getPathname())] = true;
    }
}

$broken  = array_diff_key($used, $present);
$orphans = array_diff_key($present, $used);

$status = 0;
if ($broken) {
    echo "RÉFÉRENCES CASSÉES (image citée mais absente) :\n";
    foreach (array_keys($broken) as $p) echo "  - $p\n";
    $status = 1;
}
if ($orphans) {
    echo "IMAGES ORPHELINES (présentes mais jamais référencées) :\n";
    foreach (array_keys($orphans) as $p) echo "  - $p\n";
    $status = 1;
}
if ($status === 0) {
    printf("OK : %d images référencées, %d présentes, aucune orpheline ni référence cassée.\n",
        count($used), count($present));
}
exit($status);
