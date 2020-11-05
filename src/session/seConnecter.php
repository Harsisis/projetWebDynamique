<?php
session_start();
include("../database/connection.php");
$objPdo = connect();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Se Connecter</title>
</head>
<body>

<div class="container">
    <div class="wrap">
        <div class="headings">
            <a id="sign-up"><span>Se Connecter</span></a>
        </div>
        <div id="sign-in-form">
            <form  method="post">
                <label for="username">Mail</label>
                <input id="username" type="text" name="mail"/>
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="mdp"/>
                <input type="submit" class="button" name="valider" value="Valider"/>
                <div style="width: 100%; overflow: hidden;">
                    <div style="width: 49%; float: left;">
                        <input type="submit" name="create" value="Créer un compte"/>
                    </div>
                    <div style="margin-left: 51%;">
                        <input type="submit" name="accueil" value="Accueil"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST["valider"])){
    if ($_POST['mail'] != '' && $_POST['mdp'] != '' && $_POST['mail'] != 'mail') {
        $recordMail = $_POST['mail'];
        $recordMdp = $_POST['mdp'];

        $select = $objPdo->query("select * from redacteur where motdepasse = '$recordMdp' and adressemail = '$recordMail'");
        if ($select->rowCount() > 0){
            foreach ($select as $row ) {
                $_SESSION['id'] = $row['idredacteur'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['id'] = $row['idredacteur'];
            }
            $_SESSION['login'] = $recordMail;
            $_SESSION['password'] = $recordMdp;
            header("Location:../accueil.php");
        } else {
            echo "<script>alert('L\'utilisateur saisi n\'existe pas ');</script>";
        }
    }
}
else if (isset($_POST["create"])) {
    header("location:creerCompte.php");
}
else if (isset($_POST["accueil"])) {
    header("location:../accueil.php");
}
?>

</body>
</html>
