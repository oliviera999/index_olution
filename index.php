<!DOCTYPE html>
<html lang="fr">

<head>

<?php
$version = '1.5';
$base = '';
$script_dir = dirname($_SERVER['SCRIPT_NAME']);
$base_for_document = rtrim($script_dir, '/') . '/';
if ($base_for_document !== '/' && $base_for_document !== '' && $base_for_document !== './') {
  $base = $base_for_document;
}
$nbimages = 16;
$nomimages[1]="assets/img/entete/bg-1.jpg";
$nomimages[2]="assets/img/entete/bg-2.jpg";
$nomimages[3]="assets/img/entete/bg-3.jpg";
$nomimages[4]="assets/img/entete/bg-4.jpg";
$nomimages[5]="assets/img/entete/bg-5.jpg";
$nomimages[6]="assets/img/entete/bg-6.jpg";
$nomimages[7]="assets/img/entete/bg-7.jpg";
$nomimages[8]="assets/img/entete/bg-8.jpg";
$nomimages[9]="assets/img/entete/bg-9.jpg";
$nomimages[10]="assets/img/entete/bg-10.jpg";
$nomimages[11]="assets/img/entete/bg-11.jpg";
$nomimages[12]="assets/img/entete/bg-12.jpg";
$nomimages[13]="assets/img/entete/bg-13.jpg";
$nomimages[14]="assets/img/entete/bg-14.jpg";
$nomimages[15]="assets/img/entete/bg-15.jpg";
$nomimages[16]="assets/img/entete/bg-16.jpg";
$affimage = random_int(1, $nbimages);
$scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
$script_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
if ($host !== '') {
  $assets_base = $scheme . '://' . $host . $script_path . '/';
} else {
  $assets_base = '';
}
$assets_base_safe = htmlspecialchars($assets_base, ENT_QUOTES, 'UTF-8');
$hero_image_url = ($assets_base !== '') ? $assets_base . $nomimages[$affimage] : $nomimages[$affimage];

// Années d'existence : calcul automatique depuis le déploiement de la plateforme (2013)
$plateforme_annee_deploiement = 2013;
$annees_existence = max(1, (int)date('Y') - $plateforme_annee_deploiement);
?>
  <?php if ($base !== ''): ?><base href="<?php echo htmlspecialchars($base); ?>"><?php endif; ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Olution – échanger, créer, apprendre</title>
  <meta content="Olution propose des alternatives aux façons d'enseigner classiques. Plateforme d'enseignement en ligne, projets terrain, espaces de formation et actions pédagogiques en France et à l'international." name="description">
  <meta content="Olution, enseignement, pédagogie, plateforme, formation, olution.info, éducation, Marout" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo $assets_base_safe; ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo $assets_base_safe; ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Cabin" rel="stylesheet">

  <!-- Vendor CSS (CDN — pas besoin de assets/vendor/) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/glightbox@3.2.0/dist/css/glightbox.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo $assets_base_safe; ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Laura - v4.8.1
  * Template URL: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<style type="text/css">
#hero{
background-image: url('<?php echo htmlspecialchars($hero_image_url); ?>'); }
</style>
  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex justify-content-center align-items-center header-transparent">

    <nav id="navbar" class="navbar" aria-label="Menu principal">
      <ul>
        <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
        <li><a class="nav-link scrollto" href="#act">What is it ?</a></li>
        <li><a class="nav-link scrollto" href="#about">olution.info</a></li>
        <li><a class="nav-link scrollto" href="#portfolio">Les actions</a></li>
        <li><a class="nav-link scrollto" href="#services">Sites en lien</a></li>
        <li><a class="nav-link scrollto" href="#testi">Me concernant</a></li>
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        <li><a href="https://olution.info/my/" style="color:#ffab40" rel="noopener noreferrer" target="_blank">Se connecter</a></li>
      </ul>
      <button type="button" class="mobile-nav-toggle d-lg-none" aria-label="Ouvrir le menu" aria-expanded="false"><i class="bi bi-list" aria-hidden="true"></i></button>
    </nav>
    <!-- .navbar -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>olution</h1>
      <img src="<?php echo $assets_base_safe; ?>assets/img/logoblanc.png" class="img-fluid" width="10%" alt="Logo Olution">
      <br>
      <h2>échanger, créer, apprendre</h2>
      <a href="#act" class="btn-scroll scrollto" title="Scroll Down"><i class="bx bx-chevron-down"></i></a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
<br>
<br>
<br>
       <!-- ======= Testimonials Section ======= -->

    <div id="act" class="section-title">
      <span>What is it ?</span>
      <h2>What is it ?</h2>
      <p>Initalement  une Olution est un projet qui propose des alternatives aux façons d'enseigner classiques.</p>
    </div>
    
    <section id="actions" class="actions">

      <div class="container position-relative">
        <div class="actions-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="action-item">
                <img src="<?php echo $assets_base_safe; ?>assets/img/actions/_DSC4906.JPG" class="action-img" alt="Olution, une évolution à l'école">
                <h3>Olution</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Plus qu'une solution. C'est une évolution, une révolution à l'école.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->
            
            <div class="swiper-slide">
              <div class="action-item">
                <img src="<?php echo $assets_base_safe; ?>assets/img/actions/20171205_172112.jpg" class="action-img" alt="Le monde change, s'adapter avec Olution">
                <h3>Le monde change</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Tout va très vite. Il faut s'adapter en permanence, faire preuve de souplesse, découvrir, se réinventer, être créatif. Olution est là pour accompagner sur ce chemin.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->
            
            <div class="swiper-slide">
              <div class="action-item">
                <img src="<?php echo $assets_base_safe; ?>assets/img/actions/_DSC5567.JPG" class="action-img" alt="L'apprentissage par l'échange">
                <h3>L'apprentissage par l'échange</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Olution c'est cultiver imagination et créativité. Les idées viennent de chacun et sont le centre des projets.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->

            <div class="swiper-slide">
              <div class="action-item">
                <img src="<?php echo $assets_base_safe; ?>assets/img/actions/IMG_20190410_074928_4.jpg" class="action-img" alt="Philosophie Olution : échange, partage, open source">
                <h3>Une philosophie à part entière</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Olution met à l'honneur l'échange, le partage, l'open source, le lowcost, le diy, la nature.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->
            
            <div class="swiper-slide">
              <div class="action-item">
                <img src="<?php echo $assets_base_safe; ?>assets/img/actions/DSC03858.JPG" class="action-img" alt="Ludifier l'école, travailler en jouant">
                <h3>Ludifier l'école</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Olution, c'est jouer en travaillant, et travailler en jouant. L'école se vit comme une aventure.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->
            
            <div class="swiper-slide">
              <div class="action-item">
                <img src="<?php echo $assets_base_safe; ?>assets/img/actions/_DSC5536.JPG" class="action-img" alt="Projet Olution, plateforme et pratique de terrain">
                <h3>Un projet aux facettes multiples</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  La plateforme olution.info en est un des éléments centraux, proposant des dizaines d'espaces de formation.
La pratique de terrain est également majeure.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End action item -->
            
            <div class="swiper-slide">
              <div class="action-item">
                <img src="<?php echo $assets_base_safe; ?>assets/img/actions/_DSC2651.JPG" class="action-img" alt="Le mouvement permanent, Olution en évolution">
                <h3>Le mouvement permanent</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Olution change de jour en jour. Il évolue, se construit, se renouvelle sans cesse. C'est son essence.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
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
        <div class="section-title">
          <span>olution.info</span>
          <h2>olution.info</h2>
          <p>La plateforme d'enseignement en ligne utilisée quotidiennement par les élèves.<br> Initialement, c'est le point de départ, la base d'olution. Aujourd'hui, cela n'en est plus qu'une partie. </p>
        </div>

        <div class="row">
          <div class="image col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start"></div>
          <div class="col-lg-8 d-flex flex-column align-items-stretch">
            <div class="content ps-lg-4 d-flex flex-column justify-content-center">
              <div class="row mt-n4">
                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-emoji-smile" style="color: #20b38e;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="3196" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Utilisateurs</strong><br>Qui changent d'année en année...</p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-journal" style="color: #8a1ac2;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="90" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Espaces de formation</strong><br>Dans des domaines qui concernent les sciences.</p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-clock" style="color: #2cbdee;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo (int) $annees_existence; ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Années d'existence</strong><br>Parti de rien, chaque instant qui passe enrichit l'ensemble.</p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-award" style="color: #ffb459;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Etablissements</strong><br>En France et en Afrique.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->

            <div class="skills-content ps-lg-4">
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
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <span>Les actions</span>
          <h2>Les actions</h2>
          <p>Olution est varié. Mangroove, farmflow, sas, les chroniques de tonton du bled, Scape New Order, une vie en forêt, météosaules... Sans autant de projets qui en font partie.</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center">
          <li data-filter="*" class="filter-active">Tout</li>
          <li data-filter=".filter-bateau">Dehors</li>
          <li data-filter=".filter-brousse">Dedans</li>
          <li data-filter=".filter-urbain">Nature urbaine</li>
          <li data-filter=".filter-fictions">Jeux et fictions</li>
          <li data-filter=".filter-prototypage">Tech</li>
        </ul>

        <div class="row portfolio-container">
            
          <div class="col-lg-4 col-md-6 portfolio-item filter-bateau">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/IMG_4519.JPG" class="img-fluid" alt="Mangoove, à la découverte de la mangrove"></div>
            <div class="portfolio-info">
              <h4>"Mangoove", à la découverte de la mangrove</h4>
              <p>Libreville - Gabon</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/IMG_4519.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Mangoove, à la découverte de la mangrove"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-bateau">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/DSC03218.JPG" class="img-fluid" alt="La forêt pour tous, sortie naturaliste en fauteuil roulant"></div>
            <div class="portfolio-info">
              <h4>La forêt pour tous, une sortie naturaliste en fauteuil roulant</h4>
              <p>Essonne - France</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/DSC03218.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="La forêt pour tous, sortie naturaliste en fauteuil roulant"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          

          <div class="col-lg-4 col-md-6 portfolio-item filter-bateau">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/_DSC2691.JPG" class="img-fluid" alt="Découverte de la brousse équatoriale"></div>
            <div class="portfolio-info">
              <h4>Découverte de la brousse équatoriale</h4>
              <p>Nyonié - Gabon</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/_DSC2691.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Découverte de la brousse équatoriale"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-bateau">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/1447416383867.jpg" class="img-fluid" alt="Kayak au collège"></div>
            <div class="portfolio-info">
              <h4>Kayak au collège</h4>
              <p>Yvelines - France</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/1447416383867.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Kayak au collège"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-bateau">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/IMG_4179.jpg" class="img-fluid" alt="Mangroove à Nyonié, restauration d'une mangrove"></div>
            <div class="portfolio-info">
              <h4>"Mangroove à Nyonié", restauration d'une mangrove abîmée</h4>
              <p>Nyonié - Gabon</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/IMG_4179.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Mangroove à Nyonié, restauration d'une mangrove"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-bateau">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/_DSC2570.JPG" class="img-fluid" alt="Croquis du paysage"></div>
            <div class="portfolio-info">
              <h4>Croquis du paysage</h4>
              <p>Nyonié - Gabon</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/_DSC2570.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Croquis du paysage"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
        <div class="col-lg-4 col-md-6 portfolio-item filter-bateau">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/_DSC2638.JPG" class="img-fluid" alt="Ramassage d'ordures sur les plages au Gabon"></div>
            <div class="portfolio-info">
              <h4>Ramassage d'ordures</h4>
              <p>plages au Gabon</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/_DSC2638.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Ramassage d'ordures"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-bateau">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/Une-vie-en-foret.jpg" class="img-fluid" alt="Tournage avec Francis Hallé"></div>
            <div class="portfolio-info">
              <h4>Tournage avec Francis Hallé</h4>
              <p>Gabon</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/Une-vie-en-foret.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Tournage avec Francis Hallé"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-bateau">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/_DSC2573.JPG" class="img-fluid" alt="Exploration de l'environnement, savane et jungle"></div>
            <div class="portfolio-info">
              <h4>Exploration de l'environnement</h4>
              <p>Savane et Jungle - Gabon</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dehors/_DSC2573.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Exploration de l'environnement"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-brousse">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/DSC_0096.JPG" class="img-fluid" alt="Interview production minisérie SAS"></div>
            <div class="portfolio-info">
              <h4>Interview concernant la production d'une minisérie (SAS)</h4>
              <p>Yvelines - France</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/DSC_0096.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Interview production minisérie SAS"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-brousse">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/DSC04815.JPG" class="img-fluid" alt="SAS, dispositif contre le décrochage scolaire"></div>
            <div class="portfolio-info">
              <h4>SAS - dispositif de lutte contre le décrochage scolaire</h4>
              <p>Yvelines - France</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/DSC04815.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="SAS, dispositif contre le décrochage scolaire"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
                    <div class="col-lg-4 col-md-6 portfolio-item filter-brousse">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/DSC_0078.JPG" class="img-fluid" alt="SEGPA horticulture"></div>
            <div class="portfolio-info">
              <h4>SEGPA horticulture</h4>
              <p>Yvelines - France</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/DSC_0078.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="SEGPA horticulture"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-brousse">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/test epnc5.jpg" class="img-fluid" alt="Concours photos"></div>
            <div class="portfolio-info">
              <h4>Concours photos</h4>
              <p>Yvelines - France</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/test epnc5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Concours photos"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-brousse">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/20181107_091551.jpg" class="img-fluid" alt="Maquette du système solaire"></div>
            <div class="portfolio-info">
              <h4>Construction d'une maquette du système solaire</h4>
              <p>Libreville - Gabon</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/20181107_091551.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Maquette du système solaire"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-brousse">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/DSC04897.JPG" class="img-fluid" alt="Oeil observé à la loupe à main"></div>
            <div class="portfolio-info">
              <h4>Oeil, observé à la loupe à main</h4>
              <p>Yvelines - France</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/DSC04897.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Oeil observé à la loupe à main"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-brousse">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/20180411_111457.jpg" class="img-fluid" alt="Opération plante ton palétuvier"></div>
            <div class="portfolio-info">
              <h4>Opération "plante ton palétuvier"</h4>
              <p>Libreville - Gabon</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/20180411_111457.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Opération plante ton palétuvier"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-brousse">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/DSC_0329.JPG" class="img-fluid" alt="Dispositif Ecocollège"></div>
            <div class="portfolio-info">
              <h4>Dispositif Ecocollège</h4>
              <p>Yvelines - France</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/dedans/DSC_0329.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Dispositif Ecocollège"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-urbain">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/IMG_20220922_124635_565.jpg" class="img-fluid" alt="n3, salle de cours innovante"></div>
            <div class="portfolio-info">
              <h4>n3, une salle de cours innovante</h4>
              <p>Casablanca - Maroc</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/IMG_20220922_124635_565.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="n3, salle de cours innovante"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-urbain">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/IMG_20220925_185523_261.jpg" class="img-fluid" alt="Farmflow Prototype 3, aquaponie à l'école"></div>
            <div class="portfolio-info">
              <h4>Farmflow Prototype 3, l'aquaponie à l'école</h4>
              <p>Casablanca - Maroc</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/IMG_20220925_185523_261.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Farmflow Prototype 3, aquaponie à l'école"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-urbain">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/phasmes.jpg" class="img-fluid" alt="Phasmopolis, élevage d'insectes"></div>
            <div class="portfolio-info">
              <h4>Phasmopolis, un élevage d'insectes</h4>
              <p>Casablanca - Maroc</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/phasmes.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Phasmopolis, élevage d'insectes"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-urbain">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/DSC03966.JPG" class="img-fluid" alt="Le club Bio"></div>
            <div class="portfolio-info">
              <h4>Le club Bio</h4>
              <p>Yvelines - France</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/DSC03966.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Le club Bio"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-urbain">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/IMG_20220912_102755_859.jpg" class="img-fluid" alt="Le tiny garden, potager urbain"></div>
            <div class="portfolio-info">
              <h4>Le tiny garden, un potager urbain</h4>
              <p>Casablanca - Maroc</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/IMG_20220912_102755_859.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Le tiny garden, potager urbain"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-urbain">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/DSC06352.JPG" class="img-fluid" alt="Culture de pleurotes"></div>
            <div class="portfolio-info">
              <h4>Culture de pleurotes</h4>
              <p>Yvelines - France</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/urbain/DSC06352.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Culture de pleurotes"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          

          <div class="col-lg-4 col-md-6 portfolio-item filter-fictions">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/jeux/20210528_182706.jpg" class="img-fluid" alt="Jouons ! Cartes Sciences et Technologies"></div>
            <div class="portfolio-info">
              <h4>"Jouons !", des cartes à jouer en Sciences et Technologies</h4>
              <p>Casablanca - Maroc</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/jeux/20210528_182706.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Jouons ! Cartes Sciences et Technologies"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-fictions">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/jeux/2022-05-28.png" class="img-fluid" alt="Scape New Order, jeu de rôle Genialy"></div>
            <div class="portfolio-info">
              <h4>"Scape New Order", un jeu de rôle Genialy pour le confinement</h4>
              <p>Casablanca - Maroc</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/jeux/2022-05-28.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Scape New Order, jeu de rôle Genialy"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-fictions">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/jeux/IMG-4684.jpg" class="img-fluid" alt="Les chroniques de tonton du bled, Imilchil"></div>
            <div class="portfolio-info">
              <h4>"Les chroniques de tonton du bled", une histoire à Imilchil</h4>
              <p>Casablanca - Maroc</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/jeux/IMG-4684.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Les chroniques de tonton du bled"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-fictions">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/jeux/IMG_20220202_125503_1.jpg" class="img-fluid" alt="PSE Game, Prévention Santé Environnement"></div>
            <div class="portfolio-info">
              <h4>"PSE Game", une autre manière d'aborder la Prévention Santé Environnement</h4>
              <p>Casablanca - Maroc</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/jeux/IMG_20220202_125503_1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="PSE Game, Prévention Santé Environnement"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-fictions">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/jeux/_DSC5126.JPG" class="img-fluid" alt="Noël sous l'équateur"></div>
            <div class="portfolio-info">
              <h4>Noël sous l'équateur</h4>
              <p>Libreville - Gabon</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/jeux/_DSC5126.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Noël sous l'équateur"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-prototypage">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/tech/2022-05-28 (1) (2).png" class="img-fluid" alt="Farmflow, start-up d'avenir"></div>
            <div class="portfolio-info">
              <h4>Farmflow, une start-up d'avenir</h4>
              <p>Casablanca - Maroc</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/tech/2022-05-28 (1) (2).png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Farmflow, start-up d'avenir"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-prototypage">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/tech/IMG_20220706_141504_5.jpg" class="img-fluid" alt="L'aquaponie connectée"></div>
            <div class="portfolio-info">
              <h4>L'aquaponie connectée</h4>
              <p>Casablanca - Maroc</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/tech/IMG_20220706_141504_5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="L'aquaponie connectée"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-prototypage">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/tech/IMG_20190130_075846_0.jpg" class="img-fluid" alt="La grande forêt de l'équateur, expo physique et numérique"></div>
            <div class="portfolio-info">
              <h4>La grande forêt de l'équateur, une expo physique et numérique</h4>
              <p>Libreville - Gabon</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/tech/IMG_20190130_075846_0.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="La grande forêt de l'équateur, expo physique et numérique"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-prototypage">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/tech/Diapositive3.JPG" class="img-fluid" alt="Serious Game SVT, club WebGeek"></div>
            <div class="portfolio-info">
              <h4>Les Serious Game SVT, proposé par le "club WebGeek"</h4>
              <p>Yvelines - France</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/tech/Diapositive3.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Serious Game SVT, club WebGeek"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-prototypage">
            <div class="portfolio-img"><img src="<?php echo $assets_base_safe; ?>assets/img/portfolio/tech/IMG-20220704-WA0015.jpg" class="img-fluid" alt="Farmflow au salon BPI"></div>
            <div class="portfolio-info">
              <h4>Farmflow au salon de la Banque Publique d'Investissements</h4>
              <p>Casablanca - Maroc</p>
              <a href="<?php echo $assets_base_safe; ?>assets/img/portfolio/tech/IMG-20220704-WA0015.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Farmflow au salon BPI"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
        </div>

      </div>

    </section><!-- End My Portfolio Section -->

 <!-- ======= My Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <span>Sites en lien</span>
          <h2>Sites en lien</h2>
          <p>Différents sites permettent de partager les projets en ligne. Olution est supporté par l'association Marout.</p>
        </div>

        <div class="row justify-content-center row-cols-1 row-cols-md-2 row-cols-lg-5 g-4">
          <div class="col d-flex align-items-stretch">
            <div class="icon-box">
              <img src="<?php echo $assets_base_safe; ?>assets/img/logo-n3.png" class="img-fluid" width="35%" alt="La salle aérée n³">
              <h4 class="title"><a href="https://n3.olution.info/" rel="noopener noreferrer" target="_blank">La salle aérée n³</a></h4>
              <p class="description">Une salle de cours extérieure et bien plus au lycée français de Casablanca.</p>
            </div>
          </div>

          <div class="col d-flex align-items-stretch">
            <div class="icon-box">
              <img src="<?php echo $assets_base_safe; ?>assets/img/olutionff.png" class="img-fluid" width="35%" alt="IOT olution">
              
              <h4 class="title"><a href="https://iot.olution.info" rel="noopener noreferrer" target="_blank">IOT olution</a></h4>
              <p class="description">Les datas des différents objets connectés... Projet en cours de construction.</p>
            </div>
          </div>

          <div class="col d-flex align-items-stretch">
            <div class="icon-box">
              <img src="<?php echo $assets_base_safe; ?>assets/img/logo-gnomes-licornes.png" class="img-fluid" width="35%" alt="Gnomes&amp;Licornes">
              <h4 class="title"><a href="https://gl.olution.info/" rel="noopener noreferrer" target="_blank">Gnomes&amp;Licornes</a></h4>
              <p class="description">Un jeu sur l'année en Sciences et Technologie.</p>
            </div>
          </div>

          <div class="col d-flex align-items-stretch">
            <div class="icon-box">
              <img src="<?php echo $assets_base_safe; ?>assets/img/logoff.png" class="img-fluid" width="25%" alt="Farmflow">
              <h4 class="title"><a href="https://farmflow.marout.org" rel="noopener noreferrer" target="_blank">Farmflow</a></h4>
              <p class="description">Projet d'aquaponie connecté porté par des élèves de seconde.</p>
            </div>
          </div>

          <div class="col d-flex align-items-stretch">
            <div class="icon-box">
              <img src="<?php echo $assets_base_safe; ?>assets/img/logomarout.png" class="img-fluid" width="35%" alt="Marout">
              <h4 class="title"><a href="https://marout.org" rel="noopener noreferrer" target="_blank">Marout</a></h4>
              <p class="description">Mutualisation, partage, conseil sont les mots-clés qui définissent cette association.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End My Services Section -->





       <!-- ======= Testimonials Section ======= -->
    <div id="testi" class="section-title">
      <span>Me concernant</span>
      <h2>Me concernant</h2>
      <p>Quelques traits</p>
    </div>

    <section id="testimonials" class="testimonials">

      <div class="container position-relative">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?php echo $assets_base_safe; ?>assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="Accompagner">
                <h3>Accompagner</h3>
                <h4>Du plus petit à l'âge au temps de la sagesse</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enseignant depuis de nombreuses années, mais aussi guide, encadrant dans de nombreux contextes. Partager et aider les autres à parcourir leur propre chemin charpente mon parcours.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?php echo $assets_base_safe; ?>assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="Nature">
                <h3>Nature</h3>
                <h4>Vivre dehors fait partie de mon ADN</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Chance m'a été donnée de découvrir des endroits variés. Du pôle nord à l'équateur, à pied, en ski, ou en mer. En contexte professionnel ou personnel.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?php echo $assets_base_safe; ?>assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="Culture">
                <h3>Culture</h3>
                <h4>Etre acteur dans son environnement</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  A siégé et siège dans de nombreuses instances associatives et institutionnelles. Qu'ils s'agissent d'art, de restauration, de commerce, ou de pilotage de projets.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?php echo $assets_base_safe; ?>assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="Tech">
                <h3>Tech</h3>
                <h4>Faire quelque-chose de ses mains</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Geek, touche à tout. Créer là où il n'existe rien est un leitmotiv. Et si l'on sait pas comment faire, on apprend. IRL ou virtuel.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
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

        <div class="section-title">
          <span>Contact</span>
          <h2>Contact</h2>
          <p>Un besoin, une question, une remarque, une suggestion... C'est ici !</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Contact</h3>
                  <p>olution@olution.info</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Formulaire contact désactivé
          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              ...
            </form>
          </div>
          -->
        </div>
      </div>
    </section><!-- End Contact Me Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>olution</h3>
      <p>échanger créer apprendre</p>
      <div class="copyright">
        &copy; Un projet proposé par l'association <strong><span>Marout</span></strong>. Tous droits réservés — v<?php echo htmlspecialchars($version); ?>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS (CDN — pas besoin de assets/vendor/) -->
  <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.2.1/dist/purecounter_vanilla.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox@3.2.0/dist/js/glightbox.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/waypoints@4.0.1/lib/noframework.waypoints.min.js"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo $assets_base_safe; ?>assets/js/main.js"></script>
</body>
</html>

