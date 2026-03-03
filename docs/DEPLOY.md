# Déploiement et correction erreur Composer

## Si vous voyez l’erreur Composer (vendor/autoload, polyfill-intl-grapheme)

Cela signifie que le serveur utilise encore d’**anciens** `index.php` et `public/index.php` (qui chargeaient Composer). Ce projet **n’utilise pas Composer** ; il faut que le serveur utilise les fichiers du dépôt.

### Solution rapide (en SSH sur le serveur)

Dans la racine du site (ex. `/home4/oliviera/index.olution.info/`) :

```bash
cd /home4/oliviera/index.olution.info
git fetch origin
git checkout origin/main -- index.php public/index.php
```

Cela remplace `index.php` et `public/index.php` par les versions du dépôt (sans Composer).

### Alternative : script fourni

```bash
cd /home4/oliviera/index.olution.info
chmod +x deploy-fix.sh
./deploy-fix.sh
```

### (Optionnel) Supprimer l’ancien dossier vendor

Si le dossier `vendor/` existe encore et n’est plus utilisé, vous pouvez le supprimer :

```bash
rm -rf /home4/oliviera/index.olution.info/vendor
```

### Vérification

Après la mise à jour, recharger http://index.olution.info/ : l’erreur doit disparaître.

### Racine du site

- La **racine document** du serveur doit pointer sur la **racine du dépôt** (là où se trouvent `index.php` et le dossier `assets/`).
- Aucune commande `composer install` n’est nécessaire.
