<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Victor De Domenico</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/vd2.ico" type="image/x-icon">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.1/morph/bootstrap.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.bundle.min.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic"
          rel="stylesheet"/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
    <script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
    <script>
        Weglot.initialize({
            api_key: 'wg_fbc39964ead27c5747a6a5c63214a84c5'
        });
    </script>
    <link rel="stylesheet" type="text/css" href="css/navbarstyle.css">
    <link rel="stylesheet" type="text/css" href="css/footerstyle.css">
    <link rel="stylesheet" type="text/css" href="css/contactstyle.css">
    <script async src="https://unpkg.com/typer-dot-js@0.1.0/typer.js"></script><!-- CDN Typer.js-->
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="0">
<!-- Menu principal -->
<?php
include("includes/navbar.html");
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
            Développeur <span class="typer" id="main" data-words="web,full-stack,front-end,back-end" data-delay="100"
                              data-deleteDelay="1000"></span>
            <span class="cursor" data-owner="main"></span> <!-- Typer.js-->
        </h2>
        <br>
        <h3>Bienvenue sur mon Portfolio version 1<span class="blue">.</span>5 !</h3>
    </div>
    <!-- Changelog -->
    <div class="container col-md-4 accordion" id="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                    <h3>Cliquez ici pour connaître les nouveautés de cette version</h3>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                 data-parent="#accordion">
                <div class="accordion-body">
                    <strong>- Changement de version de Bootstrap V4 -> V5</strong><br>
                    <strong>- Ajout de nouveaux projets</strong>
                </div>
            </div>
        </div>
    </div>
    <br>
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
            Je suis actuellement en seconde année de BTS SIO option
            SLAM au <a href="https://enseignement-superieur.lycee-stvincent.fr/" target="_blank">Lycée Saint-Vincent
                à Senlis.</a>
        </p>
        <?php
        $filename = "docs/Mon_CV.pdf";
        $filesize1 = filesize($filename);
        echo '<a href="docs/Mon_CV.pdf" download="Mon_CV" class="btn btn-info" target="_blank"><i class="fas fa-download"></i> Télécharger mon CV (<i class="fas fa-file-pdf"></i> ' . filesize($filename) / 1024 . ' KB)</a>';
        ?>
</section>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets6.lottiefiles.com/packages/lf20_uzamaojr.json" background="transparent" speed="1"
               style="height: 300px;" loop autoplay></lottie-player>
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
        <div id="mesprojets" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel -->
            <div class="carousel-indicators">
                <?php
                require('admin/connexion.php');
                echo '';
                $co = connexionBdd();
                $statement = $co->query('SELECT * FROM projets');
                $projets = $statement->fetchAll();
                foreach ($projets as $projet) {
                    $previous = $projet['id_projet'] - 1;
                    if ($projet['id_projet'] == 1) {
                        echo '<button type="button" data-bs-target="#mesprojets" data-bs-slide-to="' . $previous . '" class="active" aria-current="true" aria-label="Slide ' . $projet['id_projet'] . '"></button>';
                    } else {
                        echo '<button type="button" data-bs-target="#mesprojets" data-bs-slide-to="' . $previous . '" aria-label="Slide ' . $projet['id_projet'] . '"></button>';
                    }
                }
                echo '</div>
            <div class="carousel-inner">';
                foreach ($projets as $projet) {
                    if ($projet['id_projet'] == 1) {
                        echo '<div class="carousel-item active">
                        <a target="_blank" href="view.php?id=' . $projet['id_projet'] . '"><img src="img/' . $projet['image1_projet'] . '" class="d-block w-100"></a>
                        <div class="carousel-caption d-none d-md-block colorw">
                        <a target="_blank" href="view.php?id=' . $projet['id_projet'] . '"><h5>' . $projet['titre_projet'] . '</h5></a>
                        </div>
                     </div>';
                    } else {
                        echo '<div class="carousel-item">
                        <a target="_blank" href="view.php?id=' . $projet['id_projet'] . '"><img src="img/' . $projet['image1_projet'] . '" class="d-block w-100"></a>
                        <div class="carousel-caption d-none d-md-block colorw">
                        <a target="_blank" href="view.php?id=' . $projet['id_projet'] . '"><h5>' . $projet['titre_projet'] . '</h5></a>
                        </div>
                     </div>';
                    }
                }
                echo '</div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#mesprojets" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mesprojets" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
               </div>
            </div>';
                $co = null;
                ?>
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
                            <p>BOOTSTRAP est un framework CSS permettant de réaliser des sites responsives</p>
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
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-html5.png" alt="logo HTML5"
                                                                          class="icon1"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-css3.png" alt="logo CSS3"
                                                                          class="icon1"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-bootstrap4.png"
                                                                          alt="logo BOOTSTRAP4" class="icon1"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-jquery.png" alt="logo JQUERY"
                                                                          class="icon1"></div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-wordpress.png"
                                                                          alt="logo WORDPRESS" class="icon1"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/logo-python.png" alt="logo PYTHON"
                                                                          class="icon1"></div>
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
                <p class="text-primary">Vous pouvez également me contacter par mail ou téléphone ou sur l'un de mes
                    réseaux sociaux en cliquant
                    ci-dessous:
                </p>
                <br>
                <a href="mailto:victor.dedomenico@lyceestvincent.fr" target="_blank"><i class="fas fa-envelope"></i></a>
                <a href="tel:+33786381537" target="_blank"><i class="fas fa-phone-square-alt"></i></a>
                <a href="https://www.github.com/Nirdeo" target="_blank"><i class="fab fa-github"></i></a>
                <a href="https://www.linkedin.com/in/victor-de-domenico-755656202/" target="_blank"><i
                            class="fab fa-linkedin"></i></a>
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