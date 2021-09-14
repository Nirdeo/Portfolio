<?php
require_once("admin/connexion.php");

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
      <link rel="shortcut icon" href="img/vd2.ico" type="image/x-icon">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.6.0/lumen/bootstrap.min.css'/>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js'></script>
      <link href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic" rel="stylesheet"/>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'/>
      <link type="text/css" rel="stylesheet" href="css/adminstyle.css">
      <script src="script.js"></script>
   </head>
   <body>
      <div class="container admin">
         <h1>Back Office</h1>
         <h2>Voir un projet</h2>
         <br><br>
         <form>
            <div class="form-group">
               <label>Numéro du projet:</label><?php echo ' ' . $item['id_projet']; ?>
            </div>
            <div class="form-group">
               <label>Titre:</label><?php echo ' ' . $item['titre_projet']; ?>
            </div>
            <div class="form-group">
               <label>Date:</label><?php echo ' ' . $item['date_projet']; ?>
            </div>
            <div class="form-group">
               <label>Contexte:</label><?php echo ' ' . $item['contexte_projet']; ?>
            </div>
            <div class="form-group">
               <label>Bilan:</label><?php echo ' ' . $item['bilan_projet']; ?>
            </div>
            <div class="form-group">
               <label>Libellé technologies:</label>
               <?php
                  $co = connexionBdd();
                  $statementx = $co->prepare('SELECT libelle_techno FROM technologies, lien_technos WHERE technologies.id_techno = lien_technos.fk_id_techno AND fk_id_projet = ?');
                  $statementx->execute(array($id));
                  while($ith = $statementx->fetch())
                  {
                     echo '<p> -' . $ith['libelle_techno'] . '</p>';
                  }
                  $statementx->closeCursor();
                  $co = null;
                  ?>
            </div>
            <div class="form-group">
               <label>Image1:</label><?php echo ' ' . $item['image1_projet']; ?>
            </div>
            <div class="form-group">
               <label>Image2:</label><?php echo ' ' . $item['image2_projet']; ?>
            </div>
            <div class="form-group">
               <label>Image3:</label><?php echo ' ' . $item['image3_projet']; ?>
            </div>
            <div class="form-group">
               <label>Image4:</label><?php echo ' ' . $item['image4_projet']; ?>
            </div>
         </form>
         <div class="form-actions">
            <a class="btn btn-primary" href="index.php"><i class="fas fa-arrow-left"></i> Retour</a>
         </div>
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="d-block w-100" src="<?php echo 'img/' . $item['image1_projet'] ; ?>" alt="First slide">
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="<?php echo 'img/' . $item['image2_projet'] ; ?>" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="<?php echo 'img/' . $item['image3_projet'] ; ?>" alt="Third slide">
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="<?php echo 'img/' . $item['image4_projet'] ; ?>" alt="Quatrième slide">
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </div>
   </body>
</html>