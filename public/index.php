<?php
/**
 * Point d'entrée public (sans Composer).
 * Délègue au vrai index.php à la racine du dépôt.
 */
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/../index.php';
