---
name: olution-update-stats
description: Met à jour les chiffres (utilisateurs, espaces de formation, années, établissements) ou le texte de la section olution.info dans index.php. Utiliser quand on demande de changer les statistiques ou la description de la plateforme.
---

# Mettre à jour les chiffres ou le contenu olution.info

## Localisation

Section `#about` dans index.php (bloc avec la classe `.about`).

## Compteurs

- Modifier les attributs `data-purecounter-end` des `<span class="purecounter">` pour les nouvelles valeurs.
- Optionnel : ajuster `data-purecounter-duration` (durée de l’animation).
- Les quatre compteurs correspondent à : Utilisateurs, Espaces de formation, Années d’existence, Etablissements.

## Texte

- Modifier les `<p>` dans `.content` et dans `.section-title` de la section about pour mettre à jour les descriptions.
- Ne pas supprimer la structure des `.count-box` ni les icônes Bootstrap (classes `bi-*`).

## Référence

La section contient aussi des barres de compétence (`.skills-content`, `.progress`) pour les domaines (SVT, Sciences et Technologie, SNT, SPE) ; les modifier si besoin en gardant la structure HTML existante.
