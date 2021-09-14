<!DOCTYPE html>
<html lang="fr">
   <head>
      <title>Victor De Domenico</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="../img/vd2.ico" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic" rel="stylesheet"/>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'/>
      <link type="text/css" rel="stylesheet" href="../css/normalize.css">
      <link type="text/css" rel="stylesheet" href="../css/loginstyle.css">
      <script src="script.js"></script>
   </head>
   <body>
      <?php
         require_once("connexion.php");
         
         session_start();
         
         $co = connexionBdd();
         
         if (isset($_POST["submit"])) {
             $username = $_POST["username"];
             $password = hash("sha256", $_POST["password"]);
         
             $query = $co->prepare("SELECT * FROM utilisateurs WHERE name_ut=:user AND pass_ut=:pass");
         
             $query->bindParam(":user", $username);
             $query->bindParam(":pass", $password);
         
             $query->execute();
         
             $result = $query->fetchall();
         
             $rows = $query->rowCount();
         
             if ($rows == 1) {
         
                 $_SESSION["username"] = $username;
         
                 header("Location: index.php");
             } else {
         
                 $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
             }
         }
         
         
            ?>
      <div class="container">
         <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
            <a href="../index.php">Retour à l'accueil</a><br>
            <p>ACCES AU BACK-OFFICE</p>
            <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
            <input type="password" name="password" placeholder="Mot de passe" required><br>
            <input type="submit" value="Connexion" name="submit" required><br>
            <?php if (!empty($message)){ ?>
            <p><?php echo $message; ?></p>
            <?php } ?>
         </form>
         <div class="drop drop-1"></div>
         <div class="drop drop-2"></div>
         <div class="drop drop-3"></div>
         <div class="drop drop-4"></div>
         <div class="drop drop-5"></div>
      </div>
   </body>
</html>