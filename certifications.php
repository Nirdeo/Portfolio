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
<section class="container-fluid">
    <div><h2 style="margin-top: 10%;">Certifications complémentaires</h2></div>
    <div class="row">
        <?php
        require_once("admin/connexion.php");
        $co = connexionBdd();
        $statement = $co->query('SELECT * FROM certifications');
        foreach ($statement as $item) {
            ?>
            <div class="col-md-3">
                <div class="card mb-3">
                    <h3 class="card-header"><?php echo $item['titre_cert']; ?></h3>
                    <img src="<?php echo 'img/' . $item['illustration_cert']; ?>"
                         alt="image représentant la certification">
                    <div class="card-body">
                        <h4 class="card-title">#<?php echo $item['id_cert']; ?></h4>
                        <h5 class="card-subtitle mb-2 text-muted"><?php echo $item['titre_cert']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $item['technologie_cert']; ?></h6>
                        <small class="text-muted"><?php echo $item['date_cert']; ?></small>
                        <p class="card-text"><?php echo $item['description_cert']; ?></p>
                        <div class="btn-group">
                            <a href="<?php echo $item['lien_cert']; ?>" class="btn btn-sm btn-outline-secondary"
                               aria-label="Links of certifications"><i class="fa-solid fa-link"></i> Lien de la
                                formation</a>
                            <?php
                            if (($item['fichier_cert']) !== null) {
                                $filename = 'docs/' . $item['fichier_cert'];
                                $filesize = filesize($filename);
                                $size = round($filesize / 1024);
                                echo '<a href="../docs/' . $item['fichier_cert'] . '" download="Certification" class="btn btn-sm btn-outline-secondary" target="_blank"><i class="fas fa-download"></i> Télécharger la certification (<i class="fas fa-file-pdf"></i> ' . $size . ' KB)</a>';
                            } else {
                                echo '<a href="#" class="btn btn-sm btn-outline-secondary disabled"><i class="fas fa-download"></i> Télécharger la certification</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        $statement->closeCursor();
        $co = null;
        ?>
    </div>
</section>
<!-- Copyright-->
<?php
include("includes/footer.php");
?>
</body>

</html>