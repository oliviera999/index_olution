# CLAUDE.md — index_olution

Guide pour Claude Code sur **index_olution** : site vitrine une page du projet Olution (PHP,
Bootstrap, gabarit Laura). Répondre, commenter et documenter en **français**.
Référence détaillée : `README.md`, `docs/ARCHITECTURE.md`, `docs/DEPLOY.md`.

## Où ce dépôt s'inscrit

- **Projet Claude Code** : « olution — plateforme et enseignement ». Il regroupe les dépôts
  `mood_prod`, `pronoteio-sidecar`, `question_diagnostic`, `audit_bdd` et `index_olution` ;
  ses instructions s'ajoutent à ce fichier.
- **Projet de chat claude.ai** : « Projet olution.info ». Les contenus de cours, la banque de
  questions et les décisions pédagogiques s'y travaillent ; le code se fait ici.
- **Connecteur MCP `olution`** : il agit sur la **prod** de olution.info (plans d'écriture,
  déploiement, Pronote). À utiliser pour vérifier l'effet d'un changement, pas pour le contourner.

## Règles

- `VERSION` est la source unique du numéro de version : le monter à chaque livraison.
- Portfolio : données dans `data/portfolio.php` ; après ajout d'images, lancer
  `php tools/gen-portfolio-dims.php` et `php tools/check-images.php` (utilisé en CI).
- Bibliothèques par CDN avec versions épinglées et SRI : ne pas retirer l'empreinte.
- La vitrine est publiée par la surcouche `vitrine` de `mood_prod`
  (`scripts/update-vitrine.sh`) : la mise en ligne passe par ce dépôt-là, avec l'accord d'Oliv.
