<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
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
         <h3>Bienvenue <?php echo $_SESSION['username']; ?> !</h3>
         <h4>Ceci votre tableau de bord !</h4>
         <h1>Back Office</h1>
         <h2>Gestion de projets</h2>
         <a type="button" class="btn btn-success" href="insert.php"><i class="fas fa-plus"></i> Ajouter</a>
         <table class="table">
            <thead>
               <tr>
                  <th>Numéro du projet</th>
                  <th>Titre du projet</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  require_once("connexion.php");
                  $co = connexionBdd();
                  $statement = $co->query("SELECT * FROM projets ORDER BY id_projet DESC");
                  while ($item = $statement->fetch()) {
                      echo "<tr>";
                      echo "<th>" . $item["id_projet"] . "</th>";
                      echo "<th>" . $item["titre_projet"] . "</th>";
                      echo "<th>";
                      echo '<a class="btn btn-secondary" href="view.php?id=' . $item["id_projet"] . '"><i class="far fa-eye"></i> Voir</a>';
                      echo " ";
                      echo '<a class="btn btn-primary" href="update.php?id=' . $item["id_projet"] . '""><i class="far fa-edit"></i> Modifier</a>';
                      echo " ";
                      echo '<a class="btn btn-danger" href="delete.php?id=' . $item["id_projet"] . '"><i class="far fa-window-close"></i> Supprimer</a>';
                      echo "</th>";
                      echo "</tr>";
                  }
                  $statement->closeCursor();
                  $co = null;
                  ?>
            </tbody>
         </table>
         <a href="logout.php">Déconnexion</a>
      </div>
   </body>
</html>