<?php
/**
 * Régénère les dimensions intrinsèques (w/h) des items de data/portfolio.php.
 *
 * À lancer depuis la racine du dépôt après avoir ajouté/remplacé une image
 * ou un item :  php tools/gen-portfolio-dims.php
 *
 * Lit data/portfolio.php, recalcule w/h via getimagesize() pour chaque 'img',
 * et réécrit le fichier. Les autres champs (cat, img, title, alt, h4, loc)
 * sont préservés tels quels.
 */
$dataFile = __DIR__ . '/../data/portfolio.php';
$items = require $dataFile;

$missing = 0;
foreach ($items as &$item) {
    $path = __DIR__ . '/../' . $item['img'];
    if (is_file($path)) {
        $d = @getimagesize($path);
        if ($d) { $item['w'] = $d[0]; $item['h'] = $d[1]; continue; }
    }
    $item['w'] = $item['h'] = null;
    fwrite(STDERR, "Image introuvable/illisible : {$item['img']}\n");
    $missing++;
}
unset($item);

$header = <<<'TXT'
<?php
/**
 * Données des items du portfolio (« Actions et projets »).
 * Source unique : modifier/ajouter un item ici, le rendu suit (boucle dans index.php).
 *
 * Champs :
 *   cat   : catégorie de filtre Isotope (bateau|brousse|urbain|fictions|prototypage)
 *   img   : chemin de l'image (assets/img/portfolio/...) — lien lightbox + vignette
 *   title : attribut title du lien lightbox
 *   alt   : texte alternatif de la vignette
 *   h4    : titre affiché
 *   loc   : lieu / sous-titre
 *   w,h   : dimensions intrinsèques (anti-CLS). Régénérables via tools/gen-portfolio-dims.php
 * Contenu de confiance (édité par l'auteur).
 */
return 
TXT;

file_put_contents($dataFile, $header . var_export($items, true) . ";\n");
echo "data/portfolio.php régénéré : " . count($items) . " items, $missing image(s) manquante(s).\n";
