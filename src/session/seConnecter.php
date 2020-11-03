<?php
session_start();
include("../database/connection.php");
$objPdo = connect();
    if (isset($_POST["valider"])){
            if ($_POST['mail'] != '' && $_POST['mdp'] != '' && $_POST['mail'] != 'mail') {
                $recordMail = $_POST['mail'];
                $recordMdp = $_POST['mdp'];
                $result = $objPdo->query("select * from redacteur where motdepasse = '$recordMdp' and adressemail = '$recordMail'");
                foreach ($result as $row ) {
                    echo $row['adressemail'];
                    $_SESSION['nom'] = $row['nom'];
                    $_SESSION['prenom'] = $row['prenom'];
                    $_SESSION['id'] = $row['idredacteur'];
                }
                if ($result != null){
                    $_SESSION['login'] = $recordMail;
                    $_SESSION['password'] = $recordMdp;
                    header("Location:../accueil.php");
                }
                else{
                    header("Location:seConnecter.php");
                }
            }
    }
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
                <input id="username" type="text" name="mail" />
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="mdp" />
                <input type="submit" class="button" name="valider" value="Valider"/>
            </form>
        </div>
    </div>
</div>

</body>
</html>
