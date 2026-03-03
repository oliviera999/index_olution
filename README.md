# Index Olution

Site vitrine une page pour le projet **Olution** : initiative pédagogique proposant des alternatives aux façons d’enseigner classiques (échange, création, apprentissage). Le site présente la plateforme olution.info, les actions terrain et les sites associés (Farmflow, IOT olution, Marout).

## Stack

- **Backend** : PHP (choix aléatoire de l’image hero)
- **Frontend** : HTML, CSS, JavaScript
- **Template** : [Laura](https://bootstrapmade.com/laura-free-creative-bootstrap-theme/) (BootstrapMade), basé sur Bootstrap
- **Librairies** : Bootstrap 5, Bootstrap Icons, Boxicons, Swiper, Isotope, GLightbox, PureCounter, Waypoints (chargées via CDN jsDelivr)

## Structure du projet

```
index_olution/
├── index.php              # Point d’entrée unique
├── public/
│   └── index.php          # Relais optionnel (sans Composer) si le serveur pointe sur public/
├── README.md
├── docs/
│   └── ARCHITECTURE.md     # Détail des sections, portfolio, hero, conventions
└── assets/
    ├── css/
    │   └── style.css       # Styles principaux (personnalisation)
    ├── js/
    │   ├── main.js         # Nav, sliders, filtres portfolio, lightbox, compteurs
    │   └── validate.js    # Validation formulaire (compatibilité template)
    ├── img/                # Images (entete, portfolio, logos, favicon)
    │   ├── entete/         # Images de fond hero (bg-1.jpg … bg-16.jpg)
    │   └── portfolio/      # dehors, dedans, urbain, jeux, tech
    └── vendor/             # Optionnel : librairies tierces (sinon chargées via CDN)
```

## Déploiement

- **Aucune dépendance Composer** : le site est du PHP seul. Après un `git clone`, rien à installer.
- **Racine du site** : configurer le serveur pour que la racine document soit la racine du dépôt (où se trouvent `index.php` et `assets/`).
- Si votre hébergeur exécute `public/index.php` : ce fichier délègue au vrai `index.php` sans utiliser Composer.

## Lancer en local

À la racine du dépôt :

```bash
php -S localhost:8000
```

Puis ouvrir http://localhost:8000. Les chemins des assets sont relatifs à la racine du site.

## Liens

- **olution.info** : plateforme d’enseignement en ligne — https://olution.info
- **Connexion** : https://olution.info/my/
- **Farmflow** : https://farmflow.marout.org
- **IOT olution** : https://iot.olution.info
- **Marout** (association) : https://marout.org

## Documentation technique

Voir [docs/ARCHITECTURE.md](docs/ARCHITECTURE.md) pour les sections, IDs, structure du portfolio, hero, sliders et conventions (chemins, vendor, formulaire contact).

## Crédits

- **Template** : Laura v4.8.1 — [BootstrapMade.com](https://bootstrapmade.com/laura-free-creative-bootstrap-theme/) (license BootstrapMade)
- **Contenu** : projet Olution, association Marout
