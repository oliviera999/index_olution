<!DOCTYPE html>
<html lang="fr">

<head>

<?php
// Version lue depuis VERSION (source unique) — mise à jour du pied de page automatique
$version = trim((string) @file_get_contents(__DIR__ . '/VERSION')) ?: '0.0.0';
$base = '';
// URL canonique pour le SEO (page d'accueil officielle olution.info)
$canonical_url = 'https://olution.info/';
$script_dir = dirname($_SERVER['SCRIPT_NAME']);
$base_for_document = rtrim($script_dir, '/') . '/';
if ($base_for_document !== '/' && $base_for_document !== '' && $base_for_document !== './') {
  $base = $base_for_document;
}
// Images hero : générées par boucle (bg-1.jpg … bg-N.jpg dans assets/img/entete/).
// Ajouter une image = déposer le fichier et incrémenter $nbimages.
$nbimages = 16;
$nomimages = [];
for ($i = 1; $i <= $nbimages; $i++) {
  $nomimages[$i] = "assets/img/entete/bg-$i.jpg";
}
// Chemins assets en relatifs (assets/) : valables après recopie sur olution.info ou tout hébergement
$hero_image_url = $nomimages[random_int(1, $nbimages)];

// Années d'existence : calcul automatique depuis le déploiement de la plateforme (2013)
$plateforme_annee_deploiement = 2013;
$annees_existence = max(1, (int)date('Y') - $plateforme_annee_deploiement);

// Données du portfolio (source unique) — rendues par boucle dans la section #portfolio
$portfolio_items = require __DIR__ . '/data/portfolio.php';
?>
  <?php if ($base !== ''): ?><base href="<?php echo htmlspecialchars($base); ?>"><?php endif; ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>olution.info – Olution : échanger, créer, apprendre | Plateforme pédagogique</title>
  <meta content="olution.info est la plateforme officielle du projet Olution : alternatives à l'enseignement classique, espaces de formation en ligne, actions pédagogiques en France et à l'international. Découvrez la plateforme Moodle, les projets terrain et les ressources pour enseignants et élèves." name="description">

  <!-- Canonical : évite la dilution entre olution.info et clone / miroirs -->
  <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

  <!-- Open Graph / partage social et signal sémantique -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
  <meta property="og:title" content="olution.info – Olution : échanger, créer, apprendre">
  <meta property="og:description" content="olution.info est la plateforme officielle du projet Olution : alternatives à l'enseignement classique, espaces de formation, actions pédagogiques en France et à l'international.">
  <meta property="og:image" content="<?php echo htmlspecialchars($canonical_url); ?>assets/img/logoblanc.png">
  <meta property="og:locale" content="fr_FR">
  <meta property="og:site_name" content="olution.info">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="olution.info – Olution : échanger, créer, apprendre">
  <meta name="twitter:description" content="olution.info, plateforme officielle du projet Olution : formation en ligne, pédagogie, actions en France et à l'international.">

  <!-- Données structurées (JSON-LD) pour Google -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "olution.info",
    "alternateName": "Olution",
    "url": "<?php echo htmlspecialchars($canonical_url); ?>",
    "description": "Plateforme officielle du projet Olution : échanger, créer, apprendre. Enseignement en ligne, espaces de formation, actions pédagogiques en France et à l'international.",
    "inLanguage": "fr",
    "publisher": {
      "@type": "Organization",
      "name": "Olution"
    }
  }
  </script>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Preload de l'image hero (LCP) : découverte tôt, priorité haute -->
  <link rel="preload" as="image" href="<?php echo htmlspecialchars($hero_image_url); ?>" fetchpriority="high">

  <!-- Preload polices critiques -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&family=Cabin:wght@400&display=swap" as="style">
  <!-- Google Fonts (variantes réduites) -->
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&family=Cabin:wght@400&display=swap" rel="stylesheet">

  <!-- Vendor CSS (CDN, versions épinglées + SRI pour intégrité/sécurité) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/glightbox@3.2.0/dist/css/glightbox.min.css" rel="stylesheet" integrity="sha384-GPAzSuZc0kFvdIev6wm9zg8gnafE8tLso7rsAYQfc9hAdWCpOcpcNI5W9lWkYcsd" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/swiper@11.2.10/swiper-bundle.min.css" rel="stylesheet" integrity="sha384-gAPqlBuTCdtVcYt9ocMOYWrnBZ4XSL6q+4eXqwNycOr4iFczhNKtnYhF3NEXJM51" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- AOS : Animate On Scroll -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" integrity="sha384-/rJKQnzOkEo+daG0jMjU1IwwY9unxt1NBw3Ef2fmOJ3PW/TfAg2KXVoWwMZQZtw9" crossorigin="anonymous">

  <!-- =======================================================
  * Template Name: Laura - v4.8.1
  * Template URL: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<style type="text/css">
#hero{ background-image: url('<?php echo htmlspecialchars($hero_image_url); ?>'); }
</style>
  
</head>

<body>
  <!-- Barre de progression au scroll -->
  <div id="scroll-progress" class="scroll-progress" aria-hidden="true"></div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex justify-content-center align-items-center header-transparent">

    <nav id="navbar" class="navbar" aria-label="Menu principal">
      <button type="button" class="mobile-nav-toggle d-lg-none" aria-label="Ouvrir le menu" aria-expanded="false"><i class="bi bi-list" aria-hidden="true"></i></button>
      <ul>
        <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
        <li><a class="nav-link scrollto" href="#act">Pourquoi Olution ?</a></li>
        <li><a class="nav-link scrollto" href="#about">olution.info</a></li>
        <li><a class="nav-link scrollto" href="#portfolio">Actions et projets</a></li>
        <li><a class="nav-link scrollto" href="#results">Résultats</a></li>
        <li><a class="nav-link scrollto" href="#services">Sites en lien</a></li>
        <li><a class="nav-link scrollto" href="#testi">Me concernant</a></li>
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        <li><a href="https://olution.info/my/" style="color:#ffab40"><i class="bi bi-box-arrow-in-right me-1" aria-hidden="true"></i>Se connecter</a></li>
      </ul>
      <a href="https://olution.info/my/" class="mobile-login-btn d-lg-none" aria-label="Se connecter"><i class="bi bi-box-arrow-in-right" aria-hidden="true"></i></a>
    </nav>
    <!-- .navbar -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1 class="hero-title">olution</h1>
      <img src="assets/img/logoblanc.png" class="img-fluid hero-logo" alt="Logo Olution">
      <h2 class="hero-subtitle">échanger, créer, apprendre</h2>
      <p class="hero-tagline">L'école vécue comme une aventure</p>
      <p class="hero-seo-intro mt-2 mb-0">olution.info — Plateforme officielle du projet Olution : formation en ligne, espaces pédagogiques, actions en France et à l'international.</p>
      <div class="hero-audience-buttons d-flex flex-wrap justify-content-center gap-2">
        <a href="#about" class="btn btn-outline-light rounded-pill scrollto">Enseignant</a>
        <a href="#portfolio" class="btn btn-outline-light rounded-pill scrollto">Élève</a>
        <a href="#results" class="btn btn-outline-light rounded-pill scrollto">Institution</a>
        <a href="#services" class="btn btn-outline-light rounded-pill scrollto">Partenaire</a>
      </div>
      <a href="#act" class="btn-scroll scrollto" title="Scroll Down"><i class="bi bi-chevron-down"></i></a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
       <!-- ======= Pourquoi Olution ? ======= -->

    <div id="act" class="section-title" data-aos="fade-up">
      <span>Pourquoi Olution ?</span>
      <h2>Pourquoi Olution ?</h2>
      <p>Un projet qui propose des alternatives aux façons d'enseigner classiques.</p>
    </div>

    <div class="container mb-4">
      <div class="row g-3 justify-content-center">
        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
          <div class="audience-card card h-100 border-0 shadow-sm">
            <div class="card-body">
              <p class="audience-card-icon mb-2" aria-hidden="true">🎓</p>
              <h5 class="card-title h6">Enseignant</h5>
              <p class="card-text small mb-0">Des ressources pédagogiques innovantes, prêtes à l'emploi, partagées</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
          <div class="audience-card card h-100 border-0 shadow-sm">
            <div class="card-body">
              <p class="audience-card-icon mb-2" aria-hidden="true">🧑‍🎒</p>
              <h5 class="card-title h6">Élève</h5>
              <p class="card-text small mb-0">Apprendre en jouant, en construisant, en sortant de la classe</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
          <div class="audience-card card h-100 border-0 shadow-sm">
            <div class="card-body">
              <p class="audience-card-icon mb-2" aria-hidden="true">🏫</p>
              <h5 class="card-title h6">Institution</h5>
              <p class="card-text small mb-0">Un dispositif documenté, évalué, déployé dans 5 établissements</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="250">
          <div class="audience-card card h-100 border-0 shadow-sm">
            <div class="card-body">
              <p class="audience-card-icon mb-2" aria-hidden="true">🤝</p>
              <h5 class="card-title h6">Partenaire</h5>
              <p class="card-text small mb-0">Un projet associatif à impact, ancré dans l'enseignement français à l'étranger</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <section id="actions" class="actions">

      <div class="container position-relative">
        <div class="actions-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="action-item">
                <img loading="lazy" src="assets/img/actions/_DSC4906.JPG" class="action-img" alt="Olution, une évolution à l'école">
                <h3>Olution</h3>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Plus qu'une solution. C'est une évolution, une révolution à l'école.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->
            
            <div class="swiper-slide">
              <div class="action-item">
                <img loading="lazy" src="assets/img/actions/20171205_172112.jpg" class="action-img" alt="Le monde change, s'adapter avec Olution">
                <h3>Le monde change</h3>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Tout va très vite. Il faut s'adapter en permanence, faire preuve de souplesse, découvrir, se réinventer, être créatif. Olution est là pour accompagner sur ce chemin.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->
            
            <div class="swiper-slide">
              <div class="action-item">
                <img loading="lazy" src="assets/img/actions/_DSC5567.JPG" class="action-img" alt="L'apprentissage par l'échange">
                <h3>L'apprentissage par l'échange</h3>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Olution, c'est cultiver l'imagination et créativité. Les idées viennent de chacun et sont le centre des projets.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->

            <div class="swiper-slide">
              <div class="action-item">
                <img loading="lazy" src="assets/img/actions/IMG_20190410_074928_4.jpg" class="action-img" alt="Philosophie Olution : échange, partage, open source">
                <h3>Une philosophie à part entière</h3>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Olution met à l'honneur l'échange, le partage, l'open source, le low-cost, le DIY, la nature.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->
            
            <div class="swiper-slide">
              <div class="action-item">
                <img loading="lazy" src="assets/img/actions/DSC03858.JPG" class="action-img" alt="Ludifier l'école, travailler en jouant">
                <h3>Ludifier l'école</h3>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Olution, c'est jouer en travaillant, et travailler en jouant. L'école se vit comme une aventure.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->
            
            <div class="swiper-slide">
              <div class="action-item">
                <img loading="lazy" src="assets/img/actions/_DSC5536.JPG" class="action-img" alt="Projet Olution, plateforme et pratique de terrain">
                <h3>Un projet aux facettes multiples</h3>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  La plateforme olution.info en est un des éléments centraux, proposant des dizaines d'espaces de formation. La pratique de terrain est également majeure.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->
            
            <div class="swiper-slide">
              <div class="action-item">
                <img loading="lazy" src="assets/img/actions/_DSC2651.JPG" class="action-img" alt="Le mouvement permanent, Olution en évolution">
                <h3>Le mouvement permanent</h3>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Olution change de jour en jour. Il évolue, se construit, se renouvelle sans cesse. C'est son essence.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- End actions Section -->
        <!-- ======= About Me Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <span>olution.info</span>
          <h2>olution.info</h2>
          <p>Olution.info est une plateforme Moodle, d'enseignement en ligne utilisée quotidiennement par les élèves.<br>Initialement, c'est le point de départ, la base d'olution. Aujourd'hui, cela n'en est plus qu'une partie.<br>Son hébergement est réalisé par <a href="https://www.o2switch.fr/" rel="noopener noreferrer" target="_blank">o2switch</a>, des professionnels reconnus dont les serveurs sont en France.</p>
        </div>

        <div class="row">
          <div class="image col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start" data-aos="fade-right" data-aos-delay="100"></div>
          <div class="col-lg-8 d-flex flex-column align-items-stretch">
            <div class="content ps-lg-4 d-flex flex-column justify-content-center">
              <div class="row mt-n4">
                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="count-box">
                    <i class="bi bi-emoji-smile" style="color: #20b38e;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="300" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Utilisateurs</strong><br>élèves accompagnés chaque année</p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch" data-aos="zoom-in" data-aos-delay="150">
                  <div class="count-box">
                    <i class="bi bi-journal" style="color: #8a1ac2;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Espaces de formation</strong><br>dans les domaines scientifiques</p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch" data-aos="zoom-in" data-aos-delay="200">
                  <div class="count-box">
                    <i class="bi bi-clock" style="color: #2cbdee;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo (int) $annees_existence; ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Années d'existence</strong><br>de terrain, en France et en Afrique</p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch" data-aos="zoom-in" data-aos-delay="250">
                  <div class="count-box">
                    <i class="bi bi-award" style="color: #ffb459;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Établissements</strong><br>en France, au Gabon et au Maroc</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->

            <div class="skills-content ps-lg-4" data-aos="fade-up" data-aos-delay="200">
              <div class="progress">
                <span class="skill">Sciences de la Vie et de la Terre<i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Sciences et Technologie <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Sciences Numériques et Technologie <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              
              <div class="progress">
                <span class="skill">Santé Prévention Environnement<i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Me Section -->
    <!-- ======= My Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <span>Actions et projets</span>
          <h2>Actions et projets</h2>
          <p>Olution est varié. N³, Gnomes&amp;Licornes, Mangroove, Farmflow, SAS, Les chroniques de tonton du bled, Scape New Order, Une vie en forêt, Météosaules… Ce sont autant de projets qui en font partie.</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter=".in-bref" class="filter-active"><button type="button">En bref</button></li>
          <li data-filter=".filter-bateau"><button type="button">Dehors</button></li>
          <li data-filter=".filter-brousse"><button type="button">Dedans</button></li>
          <li data-filter=".filter-urbain"><button type="button">Nature urbaine</button></li>
          <li data-filter=".filter-fictions"><button type="button">Jeux et fictions</button></li>
          <li data-filter=".filter-prototypage"><button type="button">Tech</button></li>
        </ul>

        <div class="row portfolio-container" data-en-bref-count="8">
          <?php foreach ($portfolio_items as $item): ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $item['cat']; ?><?php echo !empty($item['bref']) ? ' featured' : ''; ?>" data-aos="fade-up">
            <div class="portfolio-img"><a href="<?php echo $item['img']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $item['title']; ?>"><img loading="lazy" src="<?php echo $item['img']; ?>" class="img-fluid"<?php if ($item['w'] && $item['h']) echo ' width="'.$item['w'].'" height="'.$item['h'].'"'; ?> alt="<?php echo $item['alt']; ?>"></a></div>
            <div class="portfolio-info">
              <h4><?php echo $item['h4']; ?></h4>
              <p><?php echo $item['loc']; ?></p>
            </div>
          </div>
          <?php endforeach; ?>

        </div>

      </div>

    </section><!-- End My Portfolio Section -->

    <!-- ======= Résultats & Reconnaissances ======= -->
    <section id="results" class="results section-bg">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <span>Résultats & Reconnaissances</span>
          <h2>Résultats & Reconnaissances</h2>
        </div>
        <div class="row g-4 justify-content-center">
          <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="results-item results-stat">
              <span class="results-number">90%</span>
              <p class="mb-0">des élèves engagés sur l'année complète dans le dispositif Gnomes & Licornes</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
            <div class="results-item">
              <span class="results-badge"><span aria-hidden="true">🏆</span> Lauréat Hacktonfutur</span>
              <p class="mb-0">Farmflow, projet élève d'aquaponie connectée, présenté au salon BPI Casablanca 2022</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="results-item">
              <span class="results-badge"><span aria-hidden="true">💬</span> « L'école vécue comme une aventure »</span>
              <p class="mb-0">Retour d'expérience issu du projet n³, salle aérée du Lycée Lyautey</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
            <div class="results-item">
              <span class="results-badge"><span aria-hidden="true">💬</span> « On va vraiment aller sur Mars monsieur ? »</span>
              <p class="mb-0">Commentaire candide d'élève après 6 mois du projet EIST au lycée Blaise Pascal de Libreville</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="results-item">
              <span class="results-badge"><span aria-hidden="true">🏆</span> Lauréat Météo à l'École</span>
              <p class="mb-0">Projet Mété'O'Saules au collège de Guyancourt en 2016</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
            <div class="results-item">
              <span class="results-badge"><span aria-hidden="true">🎬</span> Une vie en forêt</span>
              <p class="mb-0">Participation des élèves au tournage avec Francis Hallé en 2019 au Gabon</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="results-item">
              <span class="results-badge"><span aria-hidden="true">📺</span> Interview SAS</span>
              <p class="mb-0">Réalisée par TVfil 78 pour mettre en valeur le dispositif de raccrochage scolaire au collège les Saules en 2015</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
            <div class="results-item">
              <span class="results-badge"><span aria-hidden="true">📰</span> Résultats et reconnaissance</span>
              <p class="mb-0">Publications dans Le Café pédagogique et Les Cahiers pédagogiques</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Résultats -->

 <!-- ======= My Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <span>Sites en lien</span>
          <h2>Sites en lien</h2>
          <p>Sites et projets développés dans le cadre d'Olution. L'association Marout en assure le support.</p>
        </div>

        <div class="row justify-content-center row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
          <div class="col d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box service-card">
              <img src="assets/img/logo-n3.png" class="img-fluid wp-35" alt="La salle aérée n³">
              <h4 class="title"><a href="https://n3.olution.info/" rel="noopener noreferrer" target="_blank">La salle aérée n³</a></h4>
              <span class="service-badge service-badge-1">Pour qui ? Institutions & partenaires</span>
              <p class="description">Une salle de cours extérieure et bien plus au lycée français de Casablanca.</p>
              <p class="service-impact">Premier espace d'apprentissage Nature, Nomade du réseau AEFE</p>
            </div>
          </div>

          <div class="col d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="150">
            <div class="icon-box service-card">
              <img src="assets/img/olutionff.png" class="img-fluid wp-35" alt="IOT olution">
              <h4 class="title"><a href="https://iot.olution.info" rel="noopener noreferrer" target="_blank">IOT olution</a></h4>
              <span class="service-badge service-badge-2">Pour qui ? Élèves & makers</span>
              <p class="description">Site présentant les modules DIY connectés créés avec les élèves et permettant leur suivi et contrôle en temps réel à distance.</p>
              <p class="service-impact">Modules open source, fabriqués en classe, pilotés en temps réel</p>
            </div>
          </div>

          <div class="col d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box service-card">
              <img src="assets/img/logo-gnomes-licornes.png" class="img-fluid wp-35" alt="Gnomes&amp;Licornes">
              <h4 class="title"><a href="https://gl.olution.info/" rel="noopener noreferrer" target="_blank">Gnomes&amp;Licornes</a></h4>
              <span class="service-badge service-badge-3">Pour qui ? Élèves de 6e & enseignants</span>
              <p class="description">Une véritable aventure ludique sur l'ensemble de l'année en Sciences et Technologie pour les sixièmes.</p>
              <p class="service-impact">Gamification complète d'une année scolaire en ST</p>
            </div>
          </div>

          <div class="col d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box service-card">
              <img src="assets/img/logoff.png" class="img-fluid wp-25" alt="Farmflow">
              <h4 class="title"><a href="https://farmflow.marout.org" rel="noopener noreferrer" target="_blank">Farmflow</a></h4>
              <span class="service-badge service-badge-4">Pour qui ? Partenaires & presse</span>
              <p class="description">Un projet de start-up d'aquaponie connectée initié par des élèves de seconde, récompensé au concours Hacktonfutur et présenté au salon de la BPI 2022.</p>
              <p class="service-impact">De la classe au salon BPI — une start-up née à l'école</p>
            </div>
          </div>

          <div class="col d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="150">
            <div class="icon-box service-card">
              <img src="assets/img/logomarout.png" class="img-fluid wp-35" alt="Marout">
              <h4 class="title"><a href="https://marout.org" rel="noopener noreferrer" target="_blank">Marout</a></h4>
              <span class="service-badge service-badge-5">Pour qui ? Réseau associatif</span>
              <p class="description">Mutualisation, partage, conseil sont les mots-clés qui définissent cette association.</p>
              <p class="service-impact">L'association support qui rend tout cela possible</p>
            </div>
          </div>

          <div class="col d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box service-card">
              <img src="assets/img/logo-education-nationale.png" class="img-fluid wp-45" alt="Ministère de l'Éducation Nationale">
              <h4 class="title"><a href="https://www.education.gouv.fr/" rel="noopener noreferrer" target="_blank">Ministère de l'Éducation Nationale</a></h4>
              <span class="service-badge service-badge-6">Pour qui ? Tous</span>
              <p class="description">Le portail officiel du ministère : politiques éducatives, programmes, concours et ressources pour les personnels et les familles.</p>
              <p class="service-impact">Liberté, Égalité, Fraternité — l'éducation pour tous</p>
            </div>
          </div>

          <div class="col d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="250">
            <div class="icon-box service-card">
              <img src="assets/img/logo-aefe.png" class="img-fluid wp-45" alt="AEFE - Agence pour l'enseignement français à l'étranger">
              <h4 class="title"><a href="https://www.aefe.fr/" rel="noopener noreferrer" target="_blank">AEFE</a></h4>
              <span class="service-badge service-badge-7">Pour qui ? Réseau français à l'étranger</span>
              <p class="description">Agence pour l'enseignement français à l'étranger : réseau des lycées français du monde, offres de formation et mobilité internationale.</p>
              <p class="service-impact">L'enseignement français à l'étranger — un réseau mondial</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End My Services Section -->





       <!-- ======= Testimonials Section ======= -->
    <div id="testi" class="section-title" data-aos="fade-up">
      <span>Me concernant</span>
      <h2>Me concernant</h2>
    </div>

    <section id="testimonials" class="testimonials">

      <div class="container position-relative">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide" data-swiper-autoplay="12000">
              <div class="testimonial-item">
                <img loading="lazy" src="assets/img/testimonials/olivier-arnould-laurent.png" class="testimonial-img" alt="Olivier ARNOULD-LAURENT">
                <h3>Olivier ARNOULD-LAURENT</h3>
                <h4>Enseignant certifié</h4>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Réseau AEFE · Lycée Lyautey de Casablanca · Académie de Versailles · 18 ans d'expérience terrain en France, au Gabon et au Maroc
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img loading="lazy" src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="Accompagner">
                <h3>Accompagner</h3>
                <h4>Du plus petit à l'âge au temps de la sagesse</h4>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Enseignant depuis de nombreuses années, mais aussi guide, encadrant dans de nombreux contextes. Partager et aider les autres à parcourir leur propre chemin charpente mon parcours.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img loading="lazy" src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="Nature">
                <h3>Nature</h3>
                <h4>Vivre dehors fait partie de mon ADN</h4>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Chance m'a été donnée de découvrir des endroits variés. Du pôle nord à l'équateur, à pied, en ski, ou en mer. En contexte professionnel ou personnel.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img loading="lazy" src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="Culture">
                <h3>Culture</h3>
                <h4>Être acteur dans son environnement</h4>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  A siégé et siège dans de nombreuses instances associatives et institutionnelles. Qu'il s'agisse d'art, de restauration, de commerce, ou de pilotage de projets.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img loading="lazy" src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="Tech">
                <h3>Tech</h3>
                <h4>Faire quelque chose de ses mains</h4>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Geek, touche à tout. Créer là où il n'existe rien est un leitmotiv. Et si l'on ne sait pas comment faire, on apprend. IRL ou virtuel.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Me Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Vous souhaitez adapter Olution à votre établissement ? Vous cherchez un intervenant pour un projet pédagogique innovant ? Vous voulez collaborer ou en savoir plus ? → <a href="mailto:info@olution.info">Écrivons-nous</a>.</p>
        </div>
      </div>
    </section><!-- End Contact Me Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>olution</h3>
      <p>échanger, créer, apprendre</p>
      <div class="copyright">
        &copy; Un projet proposé par l'association <strong><span>Marout</span></strong>. Tous droits réservés — v<?php echo htmlspecialchars($version); ?>
        — <a href="mentions-legales.php">Mentions légales</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS (CDN, versions épinglées + SRI). Tous en defer : exécution dans
       l'ordre du document, après parsing ; main.js (dernier) a donc toutes ses dépendances. -->
  <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.2.1/dist/purecounter_vanilla.js" defer integrity="sha384-b/OUoiaWoE9G/eDWFHc+o5LiouLHci4aajBAkjhwIDwfKUzZkMAsX1K7KXt//tX/" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox@3.2.0/dist/js/glightbox.min.js" defer integrity="sha384-Lcg6/G/AHqVn603GN2UHyiIV/TPsuh4QkJNKsdCAUmzbItQ9oSceVj00Zf5tM0EG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/isotope-layout@3.0.6/dist/isotope.pkgd.min.js" defer integrity="sha384-vtH+5pZsjdWxaTWlFSCrWM6i0TIG0HKOqJbPo91LB35dvWpVzuWdJeVoNweP+eoY" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11.2.10/swiper-bundle.min.js" defer integrity="sha384-2UI1PfnXFjVMQ7/ZDEF70CR943oH3v6uZrFQGGqJYlvhh4g6z6uVktxYbOlAczav" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js" defer integrity="sha384-n1AULnKdMJlK1oQCLNDL9qZsDgXtH6jRYFCpBtWFc+a9Yve0KSoMn575rk755NJZ" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js" defer></script>
</body>
</html>

