<?php
session_start();
include("../database/connection.php");
$objPdo = connect();
if (isset($_POST["valider"])){
    if ($_POST['mail'] != '' && $_POST['mdp'] != '' && $_POST['nom'] != '' && $_POST['prenom'] != '') {
        $nom = $_SESSION['nom'] = strtoupper($_POST['nom']);
        $prenom =$_SESSION['prenom'] = $_POST['prenom'];
        $mail = $_SESSION['login'] = $_POST['mail'];
        $mdp = $_SESSION['password'] = $_POST['mdp'];

        $result = $objPdo->query("insert into redacteur(nom, prenom, adressemail, motdepasse) values ('$nom', '$prenom', '$mail', '$mdp')");
        $result = $objPdo->query("select * from redacteur where adressemail = '$mail' and motdepasse = '$mdp'");
        foreach ($result as $row ) {
            $_SESSION['id'] = $row['idredacteur'];
        }
        header("Location:../accueil.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/login2.css">
    <title>Créer un compte</title>
</head>
<body>

<div class="container">
    <div class="wrap">
        <div class="headings">
            <a id="sign-in"><span>Créer un compte</span></a>
        </div>
        <div id="sign-in-form">
            <form  method="post">
                <label for="name">Nom</label>
                <input id="nom" type="text" name="nom" />
                <label for="name">Prénom</label>
                <input id="nom" type="text" name="prenom" />
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
