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
    <?php
    include("includes/cdn.html");
    ?>
    <link type="text/css" rel="stylesheet" href="../css/adminstyle.css">
    <script src="../script.js"></script>
</head>
<body>
<div class="container admin">
    <h3>Bienvenue <?php echo $_SESSION['username']; ?> !</h3>
    <h4>Ceci votre tableau de bord !</h4>
    <h1>Back Office</h1>
    <h2>Gestion de projets</h2>
    <a type="button" class="btn btn-success" href="insert.php"><i class="fas fa-plus"></i> Ajouter</a>
    <table id="myTable" class="table neumorphic">
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
            echo "<td>" . $item["id_projet"] . "</td>";
            echo "<td>" . $item["titre_projet"] . "</td>";
            echo "<td>";
            echo '<a class="btn btn-secondary" href="view.php?id=' . $item["id_projet"] . '"><i class="far fa-eye"></i> Voir</a>';
            echo " ";
            echo '<a class="btn btn-primary" href="update.php?id=' . $item["id_projet"] . '""><i class="far fa-edit"></i> Modifier</a>';
            echo " ";
            echo '<a class="btn btn-danger" href="delete.php?id=' . $item["id_projet"] . '"><i class="far fa-window-close"></i> Supprimer</a>';
            echo "</td>";
            echo "</tr>";
        }
        $statement->closeCursor();
        $co = null;
        ?>
        </tbody>
    </table>
    <a class="btn btn-dark" href="logout.php">Déconnexion</a>
</div>
</body>
</html>