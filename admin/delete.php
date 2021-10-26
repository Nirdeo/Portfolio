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

if (!empty($_POST)) {
    $id = checkInput($_POST["id"]);
    $co = connexionBdd();
    $statement1 = $co->prepare("DELETE FROM lien_technos WHERE fk_id_projet = ?");
    $statement1->execute(array($id));
    $statement2 = $co->prepare("DELETE FROM projets WHERE id_projet = ?");
    $statement2->execute(array($id));
    $co = null;
    header("Location: index.php");
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
    <h2>Supprimer un projet</h2>
    <br><br>
    <form class="form" role="form" action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <p class="alert alert-warning">Voulez-vous vraiment supprimer ce projet ?</p>
        <button type="submit" class="btn btn-warning"> Oui</button>
        <a class="btn btn-secondary" href="index.php"> Non</a>
    </form>
</div>
</body>

</html>