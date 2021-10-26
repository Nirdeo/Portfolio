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

$titreError = $periodeError = $contexteError = $bilanError = $imageError1 = $imageError2 = $imageError3 = $imageError4 = $documentError1 = $documentError2 = $titre = $periode = $contexte = $bilan = $checkbox = $image1 = $image2 = $image3 = $image4 = $document1 = $document2 = "";

if (!empty($_POST)) {
    $titre = checkInput($_POST['titre']);
    $periode = checkInput($_POST['periode']);
    $contexte = checkInput($_POST['contexte']);
    $bilan = checkInput($_POST['bilan']);
    $image1 = checkInput($_FILES['image1']['name']);
    $image2 = checkInput($_FILES['image2']['name']);
    $image3 = checkInput($_FILES['image3']['name']);
    $image4 = checkInput($_FILES['image4']['name']);
    $documentPath1 = '../docs/' . basename($document1);
    $documentPath2 = '../docs/' . basename($document2);
    $imagePath1 = '../img/' . basename($image1);
    $imagePath2 = '../img/' . basename($image2);
    $imagePath3 = '../img/' . basename($image3);
    $imagePath4 = '../img/' . basename($image4);
    $documentExtension1 = pathinfo($document1, PATHINFO_EXTENSION);
    $documentExtension2 = pathinfo($document2, PATHINFO_EXTENSION);
    $imageExtension1 = pathinfo($imagePath1, PATHINFO_EXTENSION);
    $imageExtension2 = pathinfo($imagePath2, PATHINFO_EXTENSION);
    $imageExtension3 = pathinfo($imagePath3, PATHINFO_EXTENSION);
    $imageExtension4 = pathinfo($imagePath4, PATHINFO_EXTENSION);
    $isSuccess = true;

    if (empty($titre)) {
        $titreError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if (empty($periode)) {
        $periodeError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if (empty($contexte)) {
        $contexteError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if (empty($bilan)) {
        $bilanError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if (empty($document1)) {
        $isRessourceUpdated = false;
    }

    if (empty($document2)) {
        $isRessourceUpdated = false;
    }

    if (empty($image1)) {
        $isRessourceUpdated = false;
    }

    if (empty($image2)) {
        $isRessourceUpdated = false;
    }

    if (empty($image3)) {
        $isRessourceUpdated = false;
    }

    if (empty($image4)) {
        $isRessourceUpdated = false;
    } else {
        $isRessourceUpdated = true;
        $isUploadSuccess = true;

        if ($imageExtension1 != "jpg" && $imageExtension1 != "png" && $imageExtension1 != "jpeg" && $imageExtension1 != "gif") {
            $imageError1 = "Les fichiers autorisés sont: .jpg, .jpeg .png, .gif";
            $isUploadSuccess = false;
        }
        if ($_FILES["image1"]["size"] > 5000000) {
            $imageError1 = "Le fichier ne doit pas dépasser les 5000KB";
            $isUploadSuccess = false;
        }
        if ($isUploadSuccess) {
            if (!move_uploaded_file($_FILES["image1"]["tmp_name"], $imagePath1)) {
                $imageError1 = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }

        if ($imageExtension2 != "jpg" && $imageExtension2 != "png" && $imageExtension2 != "jpeg" && $imageExtension2 != "gif") {
            $imageError2 = "Les fichiers autorisés sont: .jpg, .jpeg .png, .gif";
            $isUploadSuccess = false;
        }
        if ($_FILES["image2"]["size"] > 5000000) {
            $imageError2 = "Le fichier ne doit pas dépasser les 5000KB";
            $isUploadSuccess = false;
        }
        if ($isUploadSuccess) {
            if (!move_uploaded_file($_FILES["image2"]["tmp_name"], $imagePath2)) {
                $imageError2 = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }

        if ($imageExtension3 != "jpg" && $imageExtension3 != "png" && $imageExtension3 != "jpeg" && $imageExtension3 != "gif") {
            $imageError3 = "Les fichiers autorisés sont: .jpg, .jpeg .png, .gif";
            $isUploadSuccess = false;
        }
        if ($_FILES["image3"]["size"] > 5000000) {
            $imageError3 = "Le fichier ne doit pas dépasser les 5000KB";
            $isUploadSuccess = false;
        }
        if ($isUploadSuccess) {
            if (!move_uploaded_file($_FILES["image3"]["tmp_name"], $imagePath3)) {
                $imageError3 = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }

        if ($imageExtension4 != "jpg" && $imageExtension4 != "png" && $imageExtension4 != "jpeg" && $imageExtension4 != "gif") {
            $imageError4 = "Les fichiers autorisés sont: .jpg, .jpeg .png, .gif";
            $isUploadSuccess = false;
        }
        if ($_FILES["image4"]["size"] > 5000000) {
            $imageError4 = "Le fichier ne doit pas dépasser les 5000KB";
            $isUploadSuccess = false;
        }
        if ($isUploadSuccess) {
            if (!move_uploaded_file($_FILES["image4"]["tmp_name"], $imagePath4)) {
                $imageError4 = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }
    }

    if (($isSuccess && $isRessourceUpdated && $isUploadSuccess) || ($isSuccess && !$isRessourceUpdated)) {
        $co = connexionBdd();
        $checkbox = $_POST['checkbox'];
        if ($isRessourceUpdated) {
            $statement = $co->prepare("UPDATE projets SET titre_projet = ?, date_projet = ?, contexte_projet = ?, bilan_projet = ?, image1_projet = ?, image2_projet = ?, image3_projet = ?, image4_projet = ?, document1_projet = ?, document2_projet = ? WHERE id_projet = ?");
            $statement->execute(array($titre, $periode, $contexte, $bilan, $image1, $image2, $image3, $image4, $document1, $document2, $id));
            // Delete + Insert Into à la place de UPDATE car sinon Duplicate entry for key Primary
            $statement2 = $co->prepare("DELETE FROM lien_technos WHERE fk_id_projet = ?");
            $statement2->execute(array($id));
            for ($i = 0; $i < sizeof($checkbox); $i++) {
                $req = $co->prepare("INSERT INTO lien_technos (fk_id_projet, fk_id_techno) VALUES (?,?)");
                $req->execute(array($id, $checkbox[$i]));
            }
        } else {
            $statement = $co->prepare("UPDATE projets SET titre_projet = ?, date_projet = ?, contexte_projet = ?, bilan_projet = ? WHERE id_projet = ?");
            $statement->execute(array($titre, $periode, $contexte, $bilan, $id));
            // Delete + Insert Into à la place de UPDATE car sinon Duplicate entry for key Primary
            $statement2 = $co->prepare("DELETE FROM lien_technos WHERE fk_id_projet = ?");
            $statement2->execute(array($id));
            for ($i = 0; $i < sizeof($checkbox); $i++) {
                $req = $co->prepare("INSERT INTO lien_technos (fk_id_projet, fk_id_techno) VALUES (?,?)");
                $req->execute(array($id, $checkbox[$i]));
            }
        }
        $co = null;
        header("Location: index.php");
    } else if ($isRessourceUpdated && !$isUploadSuccess) {
        $co = connexionBdd();
        $statement = $co->prepare("SELECT image1_projet, image2_projet, image3_projet, image4_projet, document1_projet, document2_projet FROM projets WHERE id_projet = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $image1 = $item['image1_projet'];
        $image2 = $item['image2_projet'];
        $image3 = $item['image3_projet'];
        $image4 = $item['image4_projet'];
        $document1 = $item['document1_projet'];
        $document2 = $item['document2_projet'];
        $co = null;
    }
} else {
    $co = connexionBdd();
    $statement = $co->prepare("SELECT * FROM projets WHERE id_projet = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    $titre = $item['titre_projet'];
    $periode = $item['date_projet'];
    $contexte = $item['contexte_projet'];
    $bilan = $item['bilan_projet'];
    $image1 = $item['image1_projet'];
    $image2 = $item['image2_projet'];
    $image3 = $item['image3_projet'];
    $image4 = $item['image4_projet'];
    $document1 = $item['document1_projet'];
    $document2 = $item['document2_projet'];
    $co = null;
}

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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lumen/bootstrap.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic"
          rel="stylesheet"/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
    <link type="text/css" rel="stylesheet" href="../css/adminstyle.css">
    <script src="script.js"></script>
    <script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
    <script>
        Weglot.initialize({
            api_key: 'wg_fbc39964ead27c5747a6a5c63214a84c5'
        });
    </script>
</head>

<body>
<div class="container admin">
    <h1>Back Office</h1>
    <h2>Modifier un projet</h2>
    <br><br>
    <form class="form" role="form" action="<?php echo 'update.php?id=' . $id; ?>" method="post"
          enctype="multipart/form-data">
        <label for="titre">Titre du projet:</label><br>
        <input type="text" id="titre" name="titre" placeholder="Titre" value="<?php echo $titre; ?>">
        <span class="help-inline"><?php echo $titreError; ?></span><br>
        <label for="periode">Période de réalisation:</label><br>
        <input type="text" id="periode" name="periode" placeholder="Période" value="<?php echo $periode; ?>">
        <span class="help-inline"><?php echo $periodeError; ?></span><br>
        <label for="contexte">Contexte du projet:</label><br>
        <input type="text" id="contexte" name="contexte" placeholder="Contexte" value="<?php echo $contexte; ?>">
        <span class="help-inline"><?php echo $contexteError; ?></span><br>
        <label for="bilan">Bilan:</label><br>
        <input type="text" id="bilan" name="bilan" placeholder="Bilan" value="<?php echo $bilan; ?>">
        <span class="help-inline"><?php echo $bilanError; ?></span><br>
        <?php
        echo '<p>Technologies utilisées:</p>';
        $co = connexionBdd();
        $statementx = $co->prepare('SELECT libelle_techno FROM technologies, lien_technos WHERE technologies.id_techno = lien_technos.fk_id_techno AND fk_id_projet = ?');
        $statementx->execute(array($id));
        while ($ith = $statementx->fetch()) {
            echo '<p> -' . $ith['libelle_techno'] . '</p>';
        }
        $statementx->closeCursor();
        $query = $co->prepare('SELECT * FROM technologies');
        $query->execute();
        while ($donnees = $query->fetch()) {
            echo '<div class="form-check form-check-inline">';
            echo '<input class="form-check-input" type="checkbox" id="checkbox" name="checkbox[]" value="' . $donnees['id_techno'] . '">';
            echo '<label class="form-check-label" for="checkbox">' . $donnees['libelle_techno'] . '</label>';
            echo '</div>';
        }
        $query->closeCursor();
        ?>
        <br><br>
        <label>Image:</label>
        <p><?php echo $image1; ?></p>
        <label for="image1">Sélectionner une première image:</label><br>
        <input type="file" id="image1" name="image1">
        <span class="help-inline"><?php echo $imageError1; ?></span>
        <br><br>
        <label>Image:</label>
        <p><?php echo $image2; ?></p>
        <label for="image2">Sélectionner une seconde image:</label><br>
        <input type="file" id="image2" name="image2">
        <span class="help-inline"><?php echo $imageError2; ?></span>
        <br><br>
        <label>Image:</label>
        <p><?php echo $image3; ?></p>
        <label for="image3">Sélectionner une troisième image:</label><br>
        <input type="file" id="image3" name="image3">
        <span class="help-inline"><?php echo $imageError3; ?></span>
        <br><br>
        <label>Image:</label>
        <p><?php echo $image4; ?></p>
        <label for="image4">Sélectionner une quatrième image:</label><br>
        <input type="file" id="image4" name="image4">
        <span class="help-inline"><?php echo $imageError4; ?></span>
        <br><br>
        <label>Document:</label>
        <p><?php echo $document1; ?></p>
        <label for="document1">Sélectionner un premier document:</label><br>
        <input type="file" id="document1" name="document1">
        <span class="help-inline"><?php echo $documentError1; ?></span>
        <br><br>
        <label>Document:</label>
        <p><?php echo $document2; ?></p>
        <label for="document2">Sélectionner un second document:</label><br>
        <input type="file" id="document2" name="document2">
        <span class="help-inline"><?php echo $documentError2; ?></span>
        <br><br>
    </form>
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
                <img class="d-block w-100" src="<?php echo '../img/' . $image1; ?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo '../img/' . $image2; ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo '../img/' . $image3; ?>" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo '../img/' . $image4; ?>" alt="Fourth slide">
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
        <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i> Modifier</button>
        <a class="btn btn-primary" href="index.php"><i class="far fa-arrow-alt-circle-left"></i> Retour</a>
    </div>
</div>
</body>

</html>