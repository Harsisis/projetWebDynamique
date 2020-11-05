<?php
session_start();
include("../database/connection.php");
$objPdo = connect();
?>
<!DOCTYPE html>
<html lang="fr">
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
                <div style="width: 100%; overflow: hidden;">
                    <div style="width: 49%; float: left;">
                        <input type="submit" name="connect" value="Se Connecter"/>
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
    if ($_POST['mail'] != '' && $_POST['mdp'] != '' && $_POST['nom'] != '' && $_POST['prenom'] != '') {
        $nom = strtoupper($_POST['nom']);
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];

        $select = $objPdo->query("select * from redacteur where adressemail = '$mail'");
        if ($select->rowCount() > 0){
            echo "<script>alert('Désolé, mais ce mail est déjà utilisé');</script>";
        } else {
            $result = $objPdo->query("insert into redacteur(nom, prenom, adressemail, motdepasse) values ('$nom', '$prenom', '$mail', '$mdp')");
            $result = $objPdo->query("select * from redacteur where adressemail = '$mail' and motdepasse = '$mdp'");
            foreach ($result as $row ) {
                $_SESSION['id'] = $row['idredacteur'];
            }
            $_SESSION['password'] = $mdp;
            $_SESSION['login'] = $mail;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['nom'] = $nom;
            header("Location:../accueil.php");
        }
    }
}
else if (isset($_POST["connect"])){
    header("Location:seConnecter.php");
}
else if (isset($_POST["accueil"])){
    header("Location:../accueil.php");
}
?>

</body>
</html>
