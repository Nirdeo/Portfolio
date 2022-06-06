<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
require_once("connexion.php");

if (!empty($_GET["id"])) {
    $id = checkInput($_GET["id"]);
}

$co = connexionBdd();
$statement = $co->prepare('SELECT * FROM projets WHERE id_projet = ?');
$statement->execute(array($id));
$item = $statement->fetch();
$co = null;


function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Victor De Domenico</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/vd2.ico" type="image/x-icon">
    <?php
    include("includes/cdn.html");
    ?>
    <link type="text/css" rel="stylesheet" href="../css/adminstyle.css">
    <script src="../script.js"></script>

</head>
<body>
<div class="container admin">
<h1>Voir un projet</h1>
    <br><br>
    <div class="accordion" id="accordionProjet">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Numéro du projet
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse hide" aria-labelledby="headingOne" data-bs-parent="#accordionProjet">
      <div class="accordion-body">
        <strong><?php echo ' ' . $item['id_projet']; ?></strong>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      Titre
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse hide" aria-labelledby="headingTwo" data-bs-parent="#accordionProjet">
      <div class="accordion-body">
        <strong><?php echo ' ' . $item['titre_projet']; ?></strong>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
      Date
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse hide" aria-labelledby="headingThree" data-bs-parent="#accordionProjet">
      <div class="accordion-body">
        <strong><?php echo ' ' . $item['date_projet']; ?></strong>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
      Contexte
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse hide" aria-labelledby="headingFour" data-bs-parent="#accordionProjet">
      <div class="accordion-body">
        <strong><?php echo ' ' . $item['contexte_projet']; ?></strong>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFive">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
      Bilan
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse hide" aria-labelledby="headingFive" data-bs-parent="#accordionProjet">
      <div class="accordion-body">
        <strong><?php echo ' ' . $item['bilan_projet']; ?></strong>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingSix">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
      Technologies utilisées
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse hide" aria-labelledby="headingSix" data-bs-parent="#accordionProjet">
      <div class="accordion-body">
        <strong><?php
            $co = connexionBdd();
            $statementx = $co->prepare('SELECT libelle_techno FROM technologies, lien_technos WHERE technologies.id_techno = lien_technos.fk_id_techno AND fk_id_projet = ?');
            $statementx->execute(array($id));
            while ($ith = $statementx->fetch()) {
                echo '<p> -' . $ith['libelle_techno'] . '</p>';
            }
            $statementx->closeCursor();
            $co = null;
            ?></strong>
      </div>
    </div>
    </div>
            <?php
            $filename = '../docs/' . $item['document1_projet'];
            $filesize = filesize($filename);
            $size = round($filesize/ 1024);
            if ($item['document1_projet'] != null)
            {
                echo '<label>Documentation:</label><br>';
                echo '<a href="../docs/' . $item['document1_projet'] . '" download="Document1" class="btn btn-dark" target="_blank"><i class="fas fa-download"></i> ' . $item['document1_projet'] . ' (<i class="fas fa-file-pdf"></i> ' . $size . ' KB)</a>';
            }
            $filename = '../docs/' . $item['document2_projet'];
            $filesize = filesize($filename);
            $size = round($filesize/ 1024);
            if ($item['document2_projet'] != null)
            {
                echo '<a href="../docs/' . $item['document2_projet'] . '" download="Document2" class="btn btn-dark" target="_blank"><i class="fas fa-download"></i> ' . $item['document2_projet'] . ' (<i class="fas fa-file-pdf"></i> ' . $size . ' KB)</a>';
            }
            ?>
        </div>
    <br>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo '../img/' . $item['image1_projet']; ?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo '../img/' . $item['image2_projet']; ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo '../img/' . $item['image3_projet']; ?>" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo '../img/' . $item['image4_projet']; ?>" alt="Fourth slide">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="form-actions">
        <a class="btn btn-primary" href="index.php"><i class="fas fa-arrow-left"></i> Retour</a>
    </div>
</div>
</body>

</html>