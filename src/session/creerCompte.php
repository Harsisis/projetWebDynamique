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

        header("Location:../accueil.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/signUp.css">
    <title>Créer un compte</title>
</head>
<body>
<div align="center">
    <div id="champs" align="center">
        <h2>Créer un compte</h2>

        <form method="post">
            <table>
                <tr>
                    <td align="center">
                        <input type="text" name="nom" value="nom" onfocus=this.value=''>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="text" name="prenom" value="prénom" onfocus=this.value=''>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="text" name="mail" value="mail" onfocus=this.value=''>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="password" name="mdp" value="mot de passe" onfocus=this.value=''>
                    </td>
                </tr>
                <tr>
                    <td align="center"><br/>
                        <input type="submit" value="Valider" name="valider">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

</body>
</html>
