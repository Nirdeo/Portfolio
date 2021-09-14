<?php
session_start();
if(!isset($_SESSION["username"])){
   header("Location: login.php");
   exit();
}
require_once("connexion.php");

$idError = $titreError = $periodeError = $contexteError = $bilanError =  $imageError1 = $imageError2 = $imageError3 = $imageError4 = $titre = $periode = $contexte = $bilan = $id = $checkbox = $image1 = $image2 = $image3 = $image4 = "";

if(!empty($_POST))
{
    $titre = checkInput($_POST['titre']);
    $periode = checkInput($_POST['periode']);
    $contexte = checkInput($_POST['contexte']);
    $bilan = checkInput($_POST['bilan']);
    $id = checkInput($_POST['id']);
    $image1 = checkInput($_FILES['image1']['name']);
    $image2 = checkInput($_FILES['image2']['name']);
    $image3 = checkInput($_FILES['image3']['name']);
    $image4 = checkInput($_FILES['image4']['name']);
    $imagePath1 = '../img/' . basename($image1);
    $imagePath2 = '../img/' . basename($image2);
    $imagePath3 = '../img/' . basename($image3);
    $imagePath4 = '../img/' . basename($image4);
    $imageExtension1 = pathinfo($imagePath1, PATHINFO_EXTENSION);
    $imageExtension2 = pathinfo($imagePath2, PATHINFO_EXTENSION);
    $imageExtension3 = pathinfo($imagePath3, PATHINFO_EXTENSION);
    $imageExtension4 = pathinfo($imagePath4, PATHINFO_EXTENSION);
    $isSuccess = true;
    $isUploadSuccess = false;


    if(empty($id))
    {
        $idError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($titre))
    {
        $titreError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if(empty($periode))
    {
        $periodeError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if(empty($contexte))
    {
        $contexteError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if(empty($bilan))
    {
        $bilanError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if(empty($image1))
    {
        $imageError1 = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if(empty($image2))
    {
        $imageError2 = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if(empty($image3))
    {
        $imageError3 = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if(empty($image4))
    {
        $imageError4 = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    else
    {
        $isUploadSuccess = true;
        if($imageExtension1 != "jpg" && $imageExtension1 != "png" && $imageExtension1 != "jpeg" && $imageExtension1 != "gif")
        {
            $imageError1  = "Les fichiers autorisés sont: .jpg, .jpeg .png, .gif";
            $isUploadSuccess = false;
        }
        if($_FILES["image1"]["size"] > 5000000)
        {
            $imageError1 = "Le fichier ne doit pas dépasser les 5000KB";
            $isUploadSuccess = false;
        }
        if($isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["image1"]["tmp_name"], $imagePath1))
            {
                $imageError1 = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }

        if($imageExtension2 != "jpg" && $imageExtension2 != "png" && $imageExtension2 != "jpeg" && $imageExtension2 != "gif")
        {
            $imageError2  = "Les fichiers autorisés sont: .jpg, .jpeg .png, .gif";
            $isUploadSuccess = false;
        }
        if($_FILES["image2"]["size"] > 5000000)
        {
            $imageError2 = "Le fichier ne doit pas dépasser les 5000KB";
            $isUploadSuccess = false;
        }
        if($isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["image2"]["tmp_name"], $imagePath2))
            {
                $imageError2 = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }

        if($imageExtension3 != "jpg" && $imageExtension3 != "png" && $imageExtension3 != "jpeg" && $imageExtension3 != "gif")
        {
            $imageError3  = "Les fichiers autorisés sont: .jpg, .jpeg .png, .gif";
            $isUploadSuccess = false;
        }
        if($_FILES["image3"]["size"] > 5000000)
        {
            $imageError3 = "Le fichier ne doit pas dépasser les 5000KB";
            $isUploadSuccess = false;
        }
        if($isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["image3"]["tmp_name"], $imagePath3))
            {
                $imageError3 = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }

        if($imageExtension4 != "jpg" && $imageExtension4 != "png" && $imageExtension4 != "jpeg" && $imageExtension4 != "gif")
        {
            $imageError4  = "Les fichiers autorisés sont: .jpg, .jpeg .png, .gif";
            $isUploadSuccess = false;
        }
        if($_FILES["image4"]["size"] > 5000000)
        {
            $imageError4 = "Le fichier ne doit pas dépasser les 5000KB";
            $isUploadSuccess = false;
        }
        if($isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["image4"]["tmp_name"], $imagePath4))
            {
                $imageError4 = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }
    }

    if($isSuccess && $isUploadSuccess)
    {
        $co = connexionBdd();
        $checkbox = $_POST['checkbox'];
        $statement = $co->prepare("INSERT INTO projets (id_projet, titre_projet, date_projet, contexte_projet, bilan_projet, image1_projet, image2_projet, image3_projet, image4_projet) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute(array($id, $titre,$periode,$contexte,$bilan, $image1, $image2, $image3, $image4));
        for($i=0; $i<sizeof ($checkbox);$i++)
        {
            $req = $co->prepare("INSERT INTO lien_technos (fk_id_projet, fk_id_techno) VALUES (?,?)");
            $req->execute(array($id, $checkbox[$i]));
        }
        $co = null;
        header("Location: index.php");

    }

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
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.6.0/lumen/bootstrap.min.css'/>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js'></script>
      <link href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic" rel="stylesheet"/>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'/>
      <link type="text/css" rel="stylesheet" href="../css/adminstyle.css">
      <script src="script.js"></script>
   </head>
   <body>
      <div class="container admin">
         <h1>Back Office</h1>
         <h2>Ajouter un projet</h2>
         <br><br>
         <form class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
            <label for="id">ID du projet:</label><br>
            <input type="text" id="id" name="id" placeholder="ID" value="<?php echo $id; ?>">
            <span class="help-inline"><?php echo $idError; ?></span><br>
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
               echo "<p>Technologies utilisées:</p>";
               $co = connexionBdd();
               $query = $co->prepare("SELECT * FROM technologies");
               $query->execute();
               while ($donnees = $query->fetch()) {
                   echo '<div class="form-check form-check-inline">';
                   echo '<input class="form-check-input" type="checkbox" id="checkbox" name="checkbox[]" value="' . $donnees["id_techno"] . '">';
                   echo '<label class="form-check-label" for="checkbox">' . $donnees["libelle_techno"] . "</label>";
                   echo "</div>";
               }
               $query->closeCursor();
               ?>
            <br>
            <label for="image1">Sélectionner une première image:</label><br>
            <input type="file" id="image1" name="image1">
            <span class="help-inline"><?php echo $imageError1; ?></span>
            <br>
            <label for="image2">Sélectionner une seconde image:</label><br>
            <input type="file" id="image2" name="image2">
            <span class="help-inline"><?php echo $imageError2; ?></span>
            <br>
            <label for="image3">Sélectionner une troisième image:</label><br>
            <input type="file" id="image3" name="image3">
            <span class="help-inline"><?php echo $imageError3; ?></span>
            <br>
            <label for="image4">Sélectionner une quatrième image:</label><br>
            <input type="file" id="image4" name="image4">
            <span class="help-inline"><?php echo $imageError4; ?></span>
            <br>
            <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i> Ajouter</button>
            <a class="btn btn-primary" href="index.php"><i class="far fa-arrow-alt-circle-left"></i> Retour</a>
         </form>
      </div>
   </body>
</html>