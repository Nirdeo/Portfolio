<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Victor De Domenico</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/vd2.ico" type="image/x-icon">
    <?php
    include("includes/cdn.html");
    ?>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/navbarstyle.css">
    <link rel="stylesheet" type="text/css" href="css/footerstyle.css">
    <link rel="stylesheet" type="text/css" href="css/contactstyle.css">
    <script src="script.js"></script>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="0" tabindex="0">
<!-- Menu principal -->
<?php
include("includes/navbar.html");
?>
<!-- Introduction -->
<section id="introduction" class="container-fluid">
    <div class="col-xs-8 col-md-4 profile-picture"><img src="img/pdp.png" class="rounded-circle" alt="ma photo"></div>
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
        <h3>Bienvenue sur mon Portfolio version 1<span class="blue">.</span>6 !</h3>
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
            SLAM au <a href="https://enseignement-superieur.lycee-stvincent.fr/" target="_blank">Lycée Saint-Vincent à
                Senlis.</a>
        </p>
        <?php
        $filename = "docs/Mon_CV.pdf";
        $filesize = filesize($filename);
        $size = round($filesize / 1024);
        echo '<a href="docs/Mon_CV.pdf" download="Mon_CV" class="btn btn-info" target="_blank"><i class="fas fa-download"></i> Télécharger mon CV (<i class="fas fa-file-pdf"></i> ' . $size . ' KB)</a>';
        ?>
    </div>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_jtbfg2nb.json" background="transparent" speed="1"
                   style="height: 300px;" loop autoplay></lottie-player>
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
                <div class="timeline-badge"><i class="fas fa-briefcase"></i></div>
                <div class="timeline-panel-container-inverted">
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h3>Symfony <i class="fab fa-symfony"></i></h3>
                            <h4 class="">Apprentissage de Symfony</h4>
                            <p class="text-mute"><small><i class="far fa-clock"></i> Octobre 2021</small></p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge"><i class="fas fa-briefcase purplephp"></i></div>
                <div class="timeline-panel-container">
                    <div class="timeline-panel pp">
                        <div class="timeline-heading">
                            <h3>PHP <i class="fab fa-php purplephp"></i></h3>
                            <h4 class="purplephp">Apprentissage de PHP</h4>
                            <p class="text-mute"><small><i class="far fa-clock"></i> Décembre 2020</small></p>
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
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge"><i class="fas fa-briefcase purplebootstrap"></i></div>
                <div class="timeline-panel-container">
                    <div class="timeline-panel pb">
                        <div class="timeline-heading">
                            <h3>Bootstrap <i class="fab fa-bootstrap purplebootstrap"></i></h3>
                            <h4 class="purplebootstrap">Apprentissage de BOOTSTRAP</h4>
                            <p class="text-mute"><small><i class="far fa-clock"></i> Octobre 2020</small></p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge"><i class="fas fa-briefcase"></i></div>
                <div class="timeline-panel-container-inverted">
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h3>WordPress <i class="fab fa-wordpress"></i></h3>
                            <h4 class="bluejquery">Apprentissage de WordPress</h4>
                            <p class="text-mute"><small><i class="far fa-clock"></i> Novembre 2020</small></p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge"><i class="fas fa-briefcase"></i></div>
                <div class="timeline-panel-container">
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h3><i class="fab fa-cuttlefish"></i><i class="fas fa-hashtag"></i></h3>
                            <h4 class="bluecss">Apprentissage de C#</h4>
                            <p class="text-mute"><small><i class="far fa-clock"></i> Septembre 2020</small></p>
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
                    </div>
                </div>
            </li>
        </ul>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/html5.png" class="icon1"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/css3.png" class="icon1"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/bootstrap.png" class="icon1"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/jquery.png" class="icon1"></div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/csharp.png" class="icon1"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/php.png" class="icon1"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/symfony.png" class="icon1"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><img src="img/sql.png" class="icon1"></div>
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
                <div class="row">
                    <div class="col-md-3"><a href="mailto:victordedomenico.du60@gmail.com"><img class="icon2"
                                                                                                src="img/ios-mail-application.png"></a>
                    </div>
                    <div class="col-md-3"><a href="tel:+33786381537"><img class="icon2" src="img/whatsapp.png"></a>
                    </div>
                    <div class="col-md-3"><a href="https://www.github.com/Nirdeo/"><img class="icon2"
                                                                                        src="img/github.png"></a></div>
                    <div class="col-md-3"><a href="https://www.linkedin.com/in/victor-de-domenico-755656202/"><img
                                    class="icon2" src="img/linkedin.png"></a></div>
                </div>
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