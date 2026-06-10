<!DOCTYPE html>
<html lang="fr">
<head>
<?php
$version = trim((string) @file_get_contents(__DIR__ . '/VERSION')) ?: '0.0.0';
?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Mentions légales – olution.info</title>
  <meta name="description" content="Mentions légales du site vitrine du projet Olution.">
  <meta name="robots" content="noindex, follow">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="legal-page">
  <main class="container py-5" style="max-width: 860px;">
    <p><a href="index.php">&larr; Retour au site</a></p>
    <h1 class="mb-4">Mentions légales</h1>

    <h2 class="h4 mt-4">Éditeur du site</h2>
    <p>
      Ce site est édité par l'association <strong>Marout</strong> (association loi 1901),
      dans le cadre du projet pédagogique Olution.<br>
      Site de l'association : <a href="https://marout.org" rel="noopener noreferrer" target="_blank">marout.org</a><br>
      Contact : <a href="mailto:info@olution.info">info@olution.info</a>
    </p>

    <h2 class="h4 mt-4">Directeur de la publication</h2>
    <p>Olivier Arnould-Laurent, pour l'association Marout.</p>

    <h2 class="h4 mt-4">Hébergement</h2>
    <p>
      Le site est hébergé par :<br>
      <strong>o2switch</strong><br>
      Chemin des Pardiaux<br>
      63000 Clermont-Ferrand — France<br>
      <a href="https://www.o2switch.fr/" rel="noopener noreferrer" target="_blank">www.o2switch.fr</a> — Tél. : +33 (0)4 44 44 60 40
    </p>

    <h2 class="h4 mt-4">Propriété intellectuelle</h2>
    <p>
      Les contenus de ce site (textes, photographies, logos) sont la propriété de l'association
      Marout et du projet Olution, sauf mention contraire. Toute reproduction ou réutilisation
      sans autorisation préalable est interdite.
    </p>
    <p>
      Le gabarit graphique est basé sur le template
      <a href="https://bootstrapmade.com/laura-free-creative-bootstrap-theme/" rel="noopener noreferrer" target="_blank">Laura</a>
      de BootstrapMade, utilisé conformément à sa
      <a href="https://bootstrapmade.com/license/" rel="noopener noreferrer" target="_blank">licence</a>.
    </p>

    <h2 class="h4 mt-4">Données personnelles et cookies</h2>
    <p>
      Ce site ne dépose <strong>aucun cookie</strong>, n'utilise <strong>aucun outil de mesure
      d'audience</strong> et ne comporte aucun formulaire de collecte de données personnelles.
    </p>
    <p>
      Certaines ressources techniques (polices de caractères, bibliothèques d'affichage) sont
      chargées depuis des services tiers — <a href="https://fonts.google.com/" rel="noopener noreferrer" target="_blank">Google Fonts</a>
      et <a href="https://www.jsdelivr.com/" rel="noopener noreferrer" target="_blank">jsDelivr</a> —
      qui peuvent, à cette occasion, recevoir votre adresse IP. Aucune autre donnée n'est transmise.
    </p>
    <p>
      Pour toute question relative à vos données :
      <a href="mailto:info@olution.info">info@olution.info</a>.
    </p>
  </main>

  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Association <strong><span>Marout</span></strong> — v<?php echo htmlspecialchars($version); ?>
        — <a href="index.php">Accueil</a>
      </div>
    </div>
  </footer>
</body>
</html>
