<?php
include "admin/connexion.php";
$lname = $fname = $email = $phone = $message = "";
$lnameError = $fnameError = $emailError = $phoneError = $messageError = "";
$isSuccess = false;

function isEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isPhone($phone)
{
    return preg_match("/^[0-9 ]*$/", $phone);
}
function verifyInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["envoyer"])) {
    $lname = verifyInput($_POST["lname"]);
    $fname = verifyInput($_POST["fname"]);
    $email = verifyInput($_POST["email"]);
    $phone = verifyInput($_POST["phone"]);
    $message = verifyInput($_POST["message"]);
    $isSuccess = true;
    if (empty($lname)) {
        $lnameError = "Vous devez remplir ce champ !";
        $isSuccess = false;
    }
    if (empty($fname)) {
        $fnameError = "Vous devez remplir ce champ !";
        $isSuccess = false;
    }
    if (empty($message)) {
        $messageError = "Vous devez remplir ce champ !";
        $isSuccess = false;
    }
    if (!isEmail($email)) {
        $emailError = "Vous devez remplir ce champ avec un email valide !";
        $isSuccess = false;
    }
    if (!isPhone($phone)) {
        $phoneError =
            "Vous devez remplir ce champ ! (Chiffres et espaces seulement)";
        $isSuccess = false;
    }
    if ($isSuccess) {
        $co = connexionBdd();
        $query = $co->prepare(
            "INSERT INTO utilisateurs (nom_user, prenom_user, email_user, tel_user, message_user) VALUES (:lname, :fname, :email, :phone, :msg)"
        );
        $query->bindParam(":lname", $lname);
        $query->bindParam(":fname", $fname);
        $query->bindParam(":email", $email);
        $query->bindParam(":phone", $phone);
        $query->bindParam(":msg", $message);
        $query->execute();
        $co = null;
        echo "<script>alert('Votre message a bien été envoyé. Merci beaucoup')</script>";
        $lname = $fname = $email = $phone = $message = "";
    } else {
        echo "<script>alert('Une erreur est survenue. Veuillez réessayer')</script>";
    }
}

?>
<head>
   <link rel="stylesheet" type="text/css" href="./css/contactstyle.css">
</head>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="lname">Nom <strong class="text-warning">*</strong></label>
                <input id="lname" type="text" name="lname" class="form-control" placeholder="Votre Nom"
                    value="<?php echo $lname; ?>">
                <p class="text-danger">
                    <?php echo $lnameError; ?>
                </p>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="fname">Prénom <strong class="text-warning">*</strong></label>
                <input id="fname" type="text" name="fname" class="form-control" placeholder="Votre Prénom"
                    value="<?php echo $fname; ?>">
                <p class="text-danger">
                    <?php echo $fnameError; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="email">Email <strong class="text-warning">*</strong></label>
                <input id="email" type="text" name="email" class="form-control" placeholder="Votre Email"
                    value="<?php echo $email; ?>">
                <p class="text-danger">
                    <?php echo $emailError; ?>
                </p>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input id="phone" type="tel" name="phone" class="form-control" placeholder="Votre Numéro de téléphone"
                    maxlength="10" value="<?php echo $phone; ?>">
                <p class="text-danger">
                    <?php echo $phoneError; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="message">Message <strong class="text-warning">*</strong></label>
        <textarea id="message" name="message" class="form-control" placeholder="Votre Message" rows="1"
            maxlength="255"><?php echo $message; ?></textarea>
        <p class="text-danger">
            <?php echo $messageError; ?>
        </p>
    </div>
    <p><strong class="text-warning">* Ces informations sont requises.</strong></p><br>
    <input type="submit" class="btn btn-primary" value="Envoyer" name="envoyer"><br><br>
    <h4 class="text-primary" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'; ?>">Votre message a
        bien été envoyé. Merci de m'avoir contacté !</h4>
</form>