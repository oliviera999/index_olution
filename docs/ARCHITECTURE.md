# Architecture du site Index Olution

## Sections et IDs

| ID section | Rôle |
|------------|------|
| `#hero` | Bannière d'accueil avec image de fond aléatoire, logo, slogan |
| `#act` | « What is it ? » — présentation du projet Olution (slider) |
| `#about` | olution.info — plateforme, chiffres (compteurs), domaines |
| `#portfolio` | Les actions — galerie filtrable par catégorie |
| `#services` | Sites en lien — n³, IOT olution, Gnomes&Licornes, Farmflow, Marout |
| `#testi` | Me concernant — témoignages (slider) |
| `#contact` | Contact — email affiché |

La barre de navigation utilise ces IDs pour le défilement (`.scrollto`). Ne pas les modifier sans adapter la nav dans `index.php`.

---

## Hero (entête)

- **Images** : 16 fichiers dans `assets/img/entete/bg-1.jpg` … `bg-16.jpg`.
- **Logique PHP** : en tête de `index.php`, tableau `$nomimages` indexé de 1 à `$nbimages` (16). Tirage avec `rand(1, $nbimages)`. Le style inline injecte `url('...')` dans `#hero`.
- **Convention** : chemins en `assets/img/entete/...` (racine du site). Indices 1 à N uniquement.

---

## Portfolio (Les actions)

- **Filtres Isotope** : `#portfolio-flters` avec `data-filter` pointant vers des classes.
- **Classes de filtre** (suffixe `filter-` + clé `cat` des données) :
  - `filter-bateau` — Dehors
  - `filter-brousse` — Dedans
  - `filter-urbain` — Nature urbaine
  - `filter-fictions` — Jeux et fictions
  - `filter-prototypage` — Tech

### Source des données : `data/portfolio.php`

Depuis la v4.35, les items du portfolio ne sont plus écrits en dur dans `index.php` :
ils sont déclarés dans **`data/portfolio.php`** (source unique) et rendus par une boucle
`foreach` dans la section `#portfolio`. Le markup HTML produit reste identique au précédent.

**Ajouter / modifier un item** = éditer le tableau retourné par `data/portfolio.php` :

```php
[
  'cat'   => 'prototypage',                              // bateau|brousse|urbain|fictions|prototypage
  'img'   => 'assets/img/portfolio/tech/mon-image.jpg',  // lien lightbox + vignette
  'title' => 'Titre du lien lightbox',
  'alt'   => 'Texte alternatif de la vignette',
  'h4'    => 'Titre affiché',
  'loc'   => 'Lieu / sous-titre',
  'w'     => 1200, 'h' => 800,                            // dimensions intrinsèques (anti-CLS)
],
```

Puis régénérer les dimensions automatiquement :

```bash
php tools/gen-portfolio-dims.php
```

`w`/`h` alimentent les attributs `width`/`height` de la vignette (évite le *layout shift* / CLS).
Si on les omet (`null`), la vignette est rendue sans dimensions (comportement historique).
Le contenu de `data/portfolio.php` est de **confiance** (édité par l’auteur) : il est inséré sans
échappement pour reproduire le markup existant.

### Curation de l’onglet « En bref »

Le filtre par défaut affiche `data-en-bref-count` items (8). Par défaut le tirage est
aléatoire à chaque chargement. Pour **curater** la sélection, ajouter `’bref’ => true`
aux items à mettre en avant dans `data/portfolio.php` : ils sont pris en priorité,
le reste du quota est complété au hasard. Aucun item marqué = comportement aléatoire pur.

### Outils (`tools/`)

| Script | Rôle |
|---|---|
| `gen-portfolio-dims.php` | Recalcule `w`/`h` de chaque item depuis les fichiers images |
| `optimize-images.php` | Redimensionne (max 1920 px) et recompresse JPEG/PNG via GD ; `--dry-run` pour prévisualiser ; corrige l’orientation EXIF |
| `check-images.php` | Vérifie qu’aucune image n’est orpheline ni référencée à tort (exécuté par la CI) |

Après tout ajout/remplacement d’image : `php tools/optimize-images.php` puis
`php tools/gen-portfolio-dims.php`, et la CI vérifie l’intégrité.

Catégories de dossiers d’images : `dehors`, `dedans`, `urbain`, `jeux`, `tech`.

---

## Sliders (Swiper)

- **Actions** (What is it) : `.actions-slider` — slides avec `.action-item`, image `.action-img`, titre h3, paragraphe.
- **Témoignages** (Me concernant) : `.testimonials-slider` — slides avec `.testimonial-item`, `.testimonial-img`, h3, h4, paragraphe.

Les deux sont initialisés dans `assets/js/main.js`. Ne pas supprimer les classes `.swiper`, `.swiper-wrapper`, `.swiper-slide`.

---

## Compteurs (section olution.info)

- **Attributs** : `data-purecounter-start`, `data-purecounter-end`, `data-purecounter-duration` sur des `<span class="purecounter">`.
- **Blocs** : chaque compteur est dans un `.count-box` avec une icône Bootstrap (bi-*), le span, et un `<p>` descriptif.

---

## Conventions générales

- **Chemins assets** : toujours depuis la racine du site, préfixe `assets/` (ex. `assets/css/style.css`, `assets/img/entete/...`). Pas de `../` pour les assets depuis `index.php`.
- **Vendor** : ne pas modifier les fichiers dans `assets/vendor/`. Personnalisation dans `assets/css/style.css` et `assets/js/main.js`.
- **Formulaire contact** : actuellement commenté dans le HTML ; pas de `forms/contact.php`. Contact affiché : info@olution.info.
