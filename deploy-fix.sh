#!/bin/sh
# À exécuter sur le serveur (SSH) dans la racine du dépôt pour corriger
# l'erreur Composer en forçant index.php et public/index.php du repo.
set -e
cd "$(dirname "$0")"
git fetch origin
git checkout origin/main -- index.php public/index.php
echo "OK: index.php et public/index.php ont été mis à jour depuis le repo."
