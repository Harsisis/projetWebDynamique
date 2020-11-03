<?php
session_start();
include("../database/connection.php");

$objPdo = connect();
$objPdo->query('SET NAMES utf8');

if (isset($_POST["valider"])){
    if ($_POST['titre'] != "" || $_POST['contenu'] != ""){
        $theme = $_POST['theme'];
        $titre = $_POST['titre'];
        $date = date("Y-m-d H:i:s");
        $texte = $_POST['texte'];
        $redac = $_SESSION['id'];
        $resTheme = $objPdo->query("select idtheme from theme where description = '$theme'");
        foreach ($resTheme as $row ) {
            $idTheme = $row['idtheme'];
        }
        $result = $objPdo->query("insert into news(idtheme, titrenews, datenews, textenews, idredacteur) values ('$idTheme', '$titre', '$date', '$texte', '$redac')");
        header("Location:../accueil.php");
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/styleArticle.css">
    <title>Écrire un article</title>
</head>
<body>

<div class="container">
    <div class="wrap">
        <div class="headings">
            <a id="sign-up"><span>Écrire un Article</span></a>
        </div>
        <div id="sign-in-form">
            <form  method="post">
                <label for="username">Titre</label>
                <input id="username" type="text" name="titre" />
                <label for="content">Contenu de l'article</label>
                <textarea id="contenu" placeholder="contenu de l'article" name="texte"></textarea>
                <label for="theme">Thème</label>
                <select name="theme" id="theme">
                    <?php
                    $result = $objPdo->query("select * from theme");

                    foreach ($result as $row ) {
                        echo "<option>" . $row['description'] . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" class="button" name="valider" value="Valider"/>
            </form>
        </div>
    </div>
</div>

</body>
</html>
