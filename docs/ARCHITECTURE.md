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
- **Classes de filtre** à utiliser pour les items :
  - `filter-bateau` — Dehors
  - `filter-brousse` — Dedans
  - `filter-urbain` — Nature urbaine
  - `filter-fictions` — Jeux et fictions
  - `filter-prototypage` — Tech

**Attention** : un item existant utilise la typo `filter-proptypage` (ligne ~581). Pour la cohérence, utiliser `filter-prototypage` pour les nouveaux items ; les deux peuvent coexister si on ne corrige pas l’ancien.

**Structure HTML d’un item** :

```html
<div class="col-lg-4 col-md-6 portfolio-item filter-XXX">
  <div class="portfolio-img"><img src="assets/img/portfolio/CATEGORIE/fichier.jpg" class="img-fluid" alt=""></div>
  <div class="portfolio-info">
    <h4>Titre de l'action</h4>
    <p>Sous-titre ou lieu</p>
    <a href="assets/img/portfolio/CATEGORIE/fichier.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="..."><i class="bx bx-plus"></i></a>
  </div>
</div>
```

Catégories de dossiers : `dehors`, `dedans`, `urbain`, `jeux`, `tech`.

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
