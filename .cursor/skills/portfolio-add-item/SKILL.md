---
name: portfolio-add-item
description: Ajoute une nouvelle entrée au portfolio des actions dans index.php (section #portfolio). Utiliser quand on demande d'ajouter une action, une image ou un projet au portfolio.
---

# Ajouter une entrée au portfolio

## Étapes

1. **Localiser la section** : Dans index.php, trouver la div `.portfolio-container` (section `#portfolio`).

2. **Copier un bloc existant** : Réutiliser un bloc de la forme :
   ```html
   <div class="col-lg-4 col-md-6 portfolio-item filter-XXX">
     <div class="portfolio-img"><img src="assets/img/portfolio/CATEGORIE/fichier.jpg" class="img-fluid" alt=""></div>
     <div class="portfolio-info">
       <h4>Titre</h4>
       <p>Sous-titre ou lieu</p>
       <a href="assets/img/portfolio/CATEGORIE/fichier.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="..."><i class="bx bx-plus"></i></a>
     </div>
   </div>
   ```

3. **Choisir la classe de filtre** selon la catégorie :
   - Dehors → `filter-bateau` (dossier `dehors/`)
   - Dedans → `filter-brousse` (dossier `dedans/`)
   - Nature urbaine → `filter-urbain` (dossier `urbain/`)
   - Jeux et fictions → `filter-fictions` (dossier `jeux/`)
   - Tech → `filter-prototypage` (dossier `tech/`)

4. **Remplacer** : chemin de l’image (dans `src` et dans `href` du lien lightbox), titre (h4), sous-titre (p). Le `href` du lien doit être identique au `src` de l’image et avoir `data-gallery="portfolioGallery"` et la classe `portfolio-lightbox preview-link`.

5. **Image** : Si l’utilisateur fournit un fichier, le placer dans le bon sous-dossier sous `assets/img/portfolio/` (dehors, dedans, urbain, jeux ou tech).

**Note** : Un item existant utilise la typo `filter-proptypage` ; pour les nouveaux items utiliser `filter-prototypage`. Voir docs/ARCHITECTURE.md pour la structure détaillée.
