<!DOCTYPE html>
<html lang="fr">
   <head>
      <title>Victor De Domenico</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lumen/bootstrap.min.css">
      <!--  CDN Thème pour Bootstrap-->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
      <link type="text/css" rel="stylesheet" href="style.css">
      <script src="script.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
      <script async src="https://unpkg.com/typer-dot-js@0.1.0/typer.js"></script> <!-- CDN Typer.js-->
      <link rel="shortcut icon" href="img/vd2.ico" type="image/x-icon">
   </head>
   <body data-spy="scroll" data-target=".navbar" data-offset="60">

      <!-- Menu principal -->
      <?php
         include("includes/navbar.php");
         ?>

      <!-- Introduction -->
      <section id="introduction" class="container-fluid">
         <div class="col-xs-8 col-md-4 profile-picture"><img src="img/pdp.png" class="rounded-circle" alt="ma photo">
         </div>
         <div class="heading">
            <h1>
               <strong>Victor De Domenico</strong>
            </h1>
            <br>
            <h2>
               Développeur <span class="typer" id="main" data-words="web,full-stack,front-end,back-end"
                  data-delay="100" data-deleteDelay="1000"></span>
               <span class="cursor" data-owner="main"></span> <!-- Typer.js-->
            </h2>
            <br>
            <h3>Bienvenue sur mon Portfolio version 1<span class="blue">.</span>3 !</h3>
         </div>
      </section>

      <hr class="little">

      <!-- Présentation personnelle -->
      <section id="about" class="container-fluid">
         <div class="heading">
            <h2>À propos de moi</h2>
            <div class="divider"></div>
            <p>
               Je m'appelle Victor De Domenico, j'ai 20 ans et je suis diplômé d'un Bac S option ISN obtenu à <a
                  href="https://www.saint-dominique-mortefontaine-60.fr/" target="_blank">
               L'Institut Saint-Dominique à Mortefontaine.</a><br>
               Je suis actuellement en première année de BTS SIO option
               SLAM au <a href="https://enseignement-superieur.lycee-stvincent.fr/" target="_blank">Lycée Saint-Vincent
               à Senlis.</a>
            </p>
            <a href="docs/Mon_CV.pdf" download="Mon_CV" class="btn btn-info" target="_blank"><i
               class="fas fa-download"></i> Télécharger Mon CV</a>
         </div>
      </section>

      <!-- Mes projets-->
      <section id="projets">
         <div class="container">
            <div class="heading">
               <h2>Mes projets</h2>
               <div class="divider"></div>
               <p>Voici les projets réalisés durant ma scolarité<br>
                  Cliquez sur le carrousel pour en savoir plus !
               </p>
            </div>
            <div id="mesprojets" class="carousel slide" data-ride="carousel">
               <!-- Carousel -->
               <ol class="carousel-indicators">
                  <li data-target="#mesprojets" data-slide-to="0" class="active"></li>
                  <li data-target="#mesprojets" data-slide-to="1"></li>
                  <li data-target="#mesprojets" data-slide-to="2"></li>
                  <li data-target="#mesprojets" data-slide-to="3"></li>
                  <li data-target="#mesprojets" data-slide-to="4"></li>
                  <li data-target="#mesprojets" data-slide-to="5"></li>
                  <li data-target="#mesprojets" data-slide-to="6"></li>
                  <li data-target="#mesprojets" data-slide-to="7"></li>
               </ol>
               <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active" data-toggle="modal" data-target="#modalOne">
                     <img src="img/arduinom.png" class="d-block w-100" alt="Radar Pédagogique">
                     <div class="carousel-caption d-none d-md-block colorw">
                        <h5>Projet ARDUINO</h5>
                        <p>Réalisation d'un radar pédagogique</p>
                     </div>
                  </div>
                  <div class="carousel-item" data-toggle="modal" data-target="#modalTwo">
                     <img src="img/pfcm.png" class="d-block w-100" alt="Pierres-Feuilles-Ciseaux">
                     <div class="carousel-caption d-none d-md-block colorw">
                        <h5>Projet HTML CSS</h5>
                        <p>Réalisation d'un Pierres-Feuilles-Ciseaux</p>
                     </div>
                  </div>
                  <div class="carousel-item" data-toggle="modal" data-target="#modalThree">
                     <img src="img/roulettem.png" class="d-block w-100" alt="Roulette Russe">
                     <div class="carousel-caption d-none d-md-block colorw">
                        <h5>Projet PYTHON</h5>
                        <p>Réalisation d'une Roulette Russe</p>
                     </div>
                  </div>
                  <div class="carousel-item" data-toggle="modal" data-target="#modalFour">
                     <img src="img/edtm.png" class="d-block w-100" alt="Espace de travail">
                     <div class="carousel-caption d-none d-md-block colorw">
                        <h5>Projet HTML CSS JAVASCRIPT PHP</h5>
                        <p>Réalisation d'un Espace de travail</p>
                     </div>
                  </div>
                  <div class="carousel-item" data-toggle="modal" data-target="#modalFive">
                     <img src="img/cvm.png" class="d-block w-100" alt="CV Piscine">
                     <div class="carousel-caption d-none d-md-block colorb">
                        <h5>Projet HTML CSS</h5>
                        <p>Réalisation d'un CV en piscine</p>
                     </div>
                  </div>
                  <div class="carousel-item" data-toggle="modal" data-target="#modalSix">
                     <img src="img/wordpressm.png" class="d-block w-100" alt="Boutique de jeux de sociétés">
                     <div class="carousel-caption d-none d-md-block colorb">
                        <h5>Site Catalogue de jeux de sociétés</h5>
                        <p>Réalisation d'une boutique de jeux de sociétés</p>
                     </div>
                  </div>
                  <div class="carousel-item" data-toggle="modal" data-target="#modalSeven">
                     <img src="img/agencem.png" class="d-block w-100" alt="Agence de Voyage">
                     <div class="carousel-caption d-none d-md-block colorb">
                        <h5>Projet HTML CSS</h5>
                        <p>Réalisation d'une agence de voyage</p>
                     </div>
                  </div>
                  <div class="carousel-item" data-toggle="modal" data-target="#modalEight">
                     <img src="img/portfoliom.png" class="d-block w-100" alt="Portfolio 1v1">
                     <div class="carousel-caption d-none d-md-block colorw sp">
                        <h5>Site personnel V1.1</h5>
                        <p>Réalisation d'un portfolio professionnel</p>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#mesprojets" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#mesprojets" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
         <div class="modal fade" id="modalOne" tabindex="-1" aria-labelledby="modalOneLabel" aria-hidden="true">
            <!-- Modal -->
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="modalOneLabel">Radar Pédagogique</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p><span class="underline">Période de réalisation :</span> Octobre 2019.<br>
                        <span class="underline">Contexte du projet :</span> Projet réalisé suite à une initiation au
                        ARDUINO afin de réaliser un radar pédagogique pour le
                        lycée.<br>
                        <span class="underline">Technologies utilisées :</span> ARDUINO.<br>
                        <span class="underline">Bilan :</span> Ce projet m'a permis de découvrir davantage l'ARDUINO
                        et les cartes LIDAR et la construction d'appareil
                        électronique.<br>
                     </p>
                     <a href="img/arduino1.png" target="_blank"><img src="img/arduino1.png"
                        alt="image arduino1"></a>
                     <a href="img/arduino2.png" target="_blank"><img src="img/arduino2.png"
                        alt="image arduino2"></a>
                     <a href="img/arduino3.png" target="_blank"><img src="img/arduino3.png"
                        alt="image arduino3"></a>
                     <a href="img/arduino4.png" target="_blank"><img src="img/arduino4.png"
                        alt="image arduino4"></a>
                     <p>Cliquez sur les img pour les agrandir !</p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="modalTwo" tabindex="-1" aria-labelledby="modalTwoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="modalTwoLabel">Pierre-Feuille-Ciseaux</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p><span class="underline">Période de réalisation :</span> Février 2020.<br>
                        <span class="underline">Contexte du projet :</span> Projet réalisé suite à une initiation au
                        HTML CSS afin de réaliser un site de pierre-feuille-ciseaux.<br>
                        <span class="underline">Technologies utilisées :</span> HTML CSS.<br>
                        <span class="underline">Bilan :</span> Ce projet m'a permis de découvrir davantage la
                        construction de site web et les différents langages utilisés.<br>
                     </p>
                     <a href="img/pfc1.png" target="_blank"><img src="img/pfc1.png" alt="image pfc1"></a>
                     <p>Cliquez sur les img pour les agrandir !</p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="modalThree" tabindex="-1" aria-labelledby="modalThreeLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="modalThreeLabel">Roulette Russe</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p><span class="underline">Période de réalisation :</span> Novembre 2019.<br>
                        <span class="underline">Contexte du projet :</span> Projet réalisé suite à une initiation au
                        PYTHON afin de créer un jeu.<br>
                        <span class="underline">Technologies utilisées :</span> PYTHON.<br>
                        <span class="underline">Bilan :</span> Ce projet m'a permis de découvrir davantage PYTHON et
                        les algorithmes.<br>
                     </p>
                     <a href="img/roulette1.png" target="_blank"><img src="img/roulette1.png"
                        alt="image roulette1"></a>
                     <p>Cliquez sur les img pour les agrandir !</p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="modalFour" tabindex="-1" aria-labelledby="modalFourLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="modalFourLabel">Espace de Travail</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p><span class="underline">Période de réalisation :</span> Mai-Juin 2020.<br>
                        <span class="underline">Contexte du projet :</span> Projet final de l'année réalisé pour
                        faire un bilan des langages étudiés au cours de l'année.<br>
                        <span class="underline">Technologies utilisées :</span> HTML CSS JAVASCRIPT PHP.<br>
                        <span class="underline">Bilan :</span> Ce projet m'a permis de mettre en oeuvre mes
                        connaissances de langages déja vu et de créer un projet concret.<br>
                     </p>
                     <a href="img/edt1.PNG" target="_blank"><img src="img/edt1.PNG" alt="image edt1"></a>
                     <a href="img/edt2.PNG" target="_blank"><img src="img/edt2.PNG" alt="image edt2"></a>
                     <a href="img/edt3.PNG" target="_blank"><img src="img/edt3.PNG" alt="image edt3"></a>
                     <a href="img/edt4.PNG" target="_blank"><img src="img/edt4.PNG" alt="image edt4"></a>
                     <p>Cliquez sur les img pour les agrandir !</p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="modalFive" tabindex="-1" aria-labelledby="modalFiveLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="modalFiveLabel">CV Piscine</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p><span class="underline">Période de réalisation :</span> Septembre 2020.<br>
                        <span class="underline">Contexte du projet :</span> Projet réalisé en début d'année dans le
                        cadre d'une immersion à la programmation.<br>
                        <span class="underline">Technologies utilisées :</span> HTML CSS.<br>
                        <span class="underline">Bilan :</span> Ce projet m'a permis d'apprendre le travail en groupe
                        en temps limité et de voir le codage avec des professionnels.<br>
                     </p>
                     <a href="img/cv1.png" target="_blank"><img src="img/cv1.png" alt="image cv1"></a>
                     <p>Cliquez sur les img pour les agrandir !</p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="modalSix" tabindex="-1" aria-labelledby="modalSixLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="modalSixLabel">Boutique de jeux de sociétés</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p><span class="underline">Période de réalisation :</span> Octobre-Novembre 2020.<br>
                        <span class="underline">Contexte du projet :</span> Projet réalisé en début d'année dans le
                        cadre d'un apprentissage de WordPress et des bonnes pratiques<br>
                        <span class="underline">Technologies utilisées :</span> WordPress(CMS).<br>
                        <span class="underline">Bilan :</span> Ce projet m’a aidé à comprendre le fonctionnement des
                        CMS et de WORDPRESS qui très présent sur les sites internet. wordpress.org<br>
                     </p>
                     <a href="img/wordpress1.png" target="_blank"><img src="img/wordpress1.png"
                        alt="image wordpress1"></a>
                     <a href="img/wordpress2.png" target="_blank"><img src="img/wordpress2.png"
                        alt="image wordpress2"></a>
                     <a href="img/wordpress3.png" target="_blank"><img src="img/wordpress3.png"
                        alt="image wordpress3"></a>
                     <p>Cliquez sur les img pour les agrandir !</p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="modalSeven" tabindex="-1" aria-labelledby="modalSevenLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="modalSevenLabel">Agence de voyage</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p><span class="underline">Période de réalisation :</span> Octobre 2020.<br>
                        <span class="underline">Contexte du projet :</span> Projet réalisé en début d'année dans le
                        cadre de l'apprentissage du HTML et CSS.<br>
                        <span class="underline">Technologies utilisées :</span> HTML CSS.<br>
                        <span class="underline">Bilan :</span> Ce projet m'a permis de construire mon premier site
                        web guidé par un professionnel et d'apprendre les deux langages.<br>
                     </p>
                     <a href="img/agence1.png" target="_blank"><img src="img/agence1.png"
                        alt="image agence1"></a>
                     <a href="img/agence2.png" target="_blank"><img src="img/agence2.png"
                        alt="image agence2"></a>
                     <p>Cliquez sur les img pour les agrandir !</p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="modalEight" tabindex="-1" aria-labelledby="modalEightLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="modalEightLabel">Portfolio 1v1</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p><span class="underline">Période de réalisation :</span> Septembre-Novembre 2020.<br>
                        <span class="underline">Contexte du projet :</span> Projet réalisé afin de construite mon
                        site personnel témoin de mon apprentissage et de ma montée en compétences.<br>
                        <span class="underline">Technologies utilisées :</span> HTML CSS.<br>
                        <span class="underline">Bilan :</span> Ce projet m'a permis de mettre en valeur mes
                        compétences en les appliquant sur un site personnel et de témoigner de
                        toutes mes réalisations.<br>
                     </p>
                     <a href="img/portfolio1.png" target="_blank"><img src="img/portfolio1.png"
                        alt="image portfolio1"></a>
                     <a href="img/portfolio2.png" target="_blank"><img src="img/portfolio2.png"
                        alt="image portfolio2"></a>
                     <p>Cliquez sur les img pour les agrandir !</p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <hr class="little">

      <!-- Mes compétences-->
      <section id="competences">
         <div class="container">
            <div class="heading">
               <h2>Mes Compétences</h2>
               <div class="divider"></div>
            </div>
            <ul class="timeline">
               <!-- Timeline-->
               <li>
                  <div class="timeline-badge"><i class="fas fa-briefcase purplephp"></i></div>
                  <div class="timeline-panel-container">
                     <div class="timeline-panel pp">
                        <div class="timeline-heading">
                           <h3>PHP <i class="fab fa-php purplephp"></i></h3>
                           <h4 class="purplephp">Apprentissage de PHP</h4>
                           <p class="text-mute"><small><i class="far fa-clock"></i> Décembre 2020</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>Apprentissage de PHP</p>
                        </div>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="timeline-badge"><i class="fas fa-briefcase bluejquery"></i></div>
                  <div class="timeline-panel-container-inverted">
                     <div class="timeline-panel bj">
                        <div class="timeline-heading">
                           <h3>jQuery <i class="fas fa-water bluejquery"></i></h3>
                           <h4 class="bluejquery">Apprentissage de jQuery</h4>
                           <p class="text-mute"><small><i class="far fa-clock"></i> Novembre 2020</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>jQuery est un framework JavaScript permettant de réaliser des effets et des
                              animations
                           </p>
                        </div>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="timeline-badge"><i class="fas fa-briefcase purplebootstrap"></i></div>
                  <div class="timeline-panel-container">
                     <div class="timeline-panel pb">
                        <div class="timeline-heading">
                           <h3>BOOTSTRAP <i class="fab fa-bootstrap purplebootstrap"></i></h3>
                           <h4 class="purplebootstrap">Apprentissage de BOOTSTRAP</h4>
                           <p class="text-mute"><small><i class="far fa-clock"></i> Octobre 2020</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>BOOTSTRAP est un framework CSS permettant de réaliser des sites responsive</p>
                        </div>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="timeline-badge"><i class="fas fa-briefcase bluecss"></i></div>
                  <div class="timeline-panel-container-inverted">
                     <div class="timeline-panel bc">
                        <div class="timeline-heading">
                           <h3>CSS <i class="fab fa-css3-alt bluecss"></i></h3>
                           <h4 class="bluecss">Apprentissage de CSS</h4>
                           <p class="text-mute"><small><i class="far fa-clock"></i> Septembre 2020</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>CSS permet de donner du style aux sites internets</p>
                        </div>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="timeline-badge"><i class="fas fa-briefcase orangehtml"></i></div>
                  <div class="timeline-panel-container">
                     <div class="timeline-panel oh">
                        <div class="timeline-heading">
                           <h3>HTML <i class="fab fa-html5 orangehtml"></i></h3>
                           <h4 class="orangehtml">Apprentissage de HTML</h4>
                           <p class="text-mute"><small><i class="far fa-clock"></i> Septembre 2020</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>HTML permet de créer des sites internets</p>
                        </div>
                     </div>
                  </div>
               </li>
            </ul>
            <div class="row">
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-html5.png"
                  alt="logo HTML5" class="icon1"></div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-css3.png" alt="logo CSS3"
                  class="icon1"></div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-bootstrap4.png"
                  alt="logo BOOTSTRAP4" class="icon1"></div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-jquery.png"
                  alt="logo JQUERY" class="icon1"></div>
            </div>
            <div class="row">
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-wordpress.png"
                  alt="logo WORDPRESS" class="icon1"></div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-python.png"
                  alt="logo PYTHON" class="icon1"></div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-C.png" alt="logo C#"
                  class="icon1"></div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-javascript.png"
                  alt="logo JAVASCRIPT" class="icon1"></div>
            </div>
         </div>
      </section>

      <div class="bas">

         <section id="contact">
            <div class="container">
               <div class="heading">
                  <h2>Contact</h2>
                  <div class="divider"></div>
                  <!-- Formulaire de contact-->
                  <?php
                     include("includes/contact.php");
                     ?>
                  <br>
                  <p class="text-primary">Vous pouvez également me contacter par mail ou téléphone ou sur l'un de mes réseaux sociaux en cliquant
                     ci-dessous:
                  </p>
                  <br>
                  <a href="mailto:victor.dedomenico@lyceestvincent.fr" target="_blank"><i class="fas fa-envelope"></i></a>
                  <a href="tel:+33786381537" target="_blank"><i class="fas fa-phone-square-alt"></i></a>
                  <a href="https://www.github.com/Nirdeo" target="_blank"><i class="fab fa-github"></i></a>
                  <a href="https://www.linkedin.com/in/victor-de-domenico-755656202/" target="_blank"><i class="fab fa-linkedin"></i></a>
               </div>
            </div>
         </section>

         <hr class="little">
         
         <!-- Copyright-->
         <?php
            include("includes/footer.php");
            ?>

      </div>
   </body>
</html>