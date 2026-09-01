---
name: hero-add-background-image
description: Ajoute une nouvelle image de fond possible pour la section hero (entête) dans index.php. Utiliser quand on demande d'ajouter une image d'entête ou de fond hero.
---

# Ajouter une image de fond hero

## Étapes

1. **Placer l’image** dans `assets/img/entete/` avec un nom cohérent (ex. `bg-17.jpg` pour la 17e image).

2. **Dans index.php**, en tête de fichier :
   - Incrémenter `$nbimages` (ex. passer de 16 à 17).
   - Ajouter une ligne : `$nomimages[N]="assets/img/entete/bg-N.jpg";` où N est le nouvel indice (ex. 17).

3. **Vérifier** : Les indices du tableau doivent rester continus de 1 à `$nbimages`. Le tirage utilise `rand(1, $nbimages)` ; ne jamais utiliser l’indice 0.

**Exemple** : Pour ajouter `bg-17.jpg` :
- `$nbimages = 17;`
- `$nomimages[17]="assets/img/entete/bg-17.jpg";`
