<?php
include("database/connection.php");
$objPdo = connect();
$objPdo->query('SET NAMES utf8');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/accueil.css">
    <title>Accueil</title>
</head>
<body>

<header>
    <div class="row">
        <h1>Gyoza News ⚡</h1>
    </div>
    <div class="row">
        <nav>
            <ul>
                <?php
                if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                    echo "<li>
                            <a class=\"menuB\" href=\"ajouter/addArticle.php\">écrire un article</a>
                            </li>
                            <li>
                            <a class=\"menuB\" href=\"ajouter/addTheme.php\">ajouter un thème</a>
                            </li>";
                }
                ?>
            </ul>
        </nav>
    </div>
    <div class="row right">
        <nav>
            <ul>
                <?php
                if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
                    echo "<li>
                    <a href=\"session/seConnecter.php\">Sign in</a>
                </li>
                <li>
                    <a href=\"session/creerCompte.php\">Sign up</a>
                </li>";
                }
                else{
                    echo "<li>
                    <a href=\"javascript:void(0);\" onclick='deco();'>Sign out</a>
                    <script type='text/javascript' src='popupDeco.js'></script>
                </li>";
                }
                ?>
            </ul>
        </nav>
    </div>

</header>

<br/>
<p align="center">
    <?php
    echo "Nous sommes le ".date("d/m/Y");

    if (isset($_SESSION['login']) || isset($_SESSION['password'])) {
        echo " - ";
        echo "Bienvenue " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . " !";
    }
    ?>
</p>
<!--slideshow to see the latest news-->
<div id="slideshow">
    <div class="slide-wrapper">
        <div class="slide"><h2 class="slide-title">Cadet Gauthier</h2></div>
        <div class="slide"><h1 class="slide-title">Houver Sing Irma</h1></div>
        <div class="slide"><h1 class="slide-title">Projet PHP</h1></div>
    </div>
</div>
<br/>

<!-- the latest news need to be in a table sorted by date-->

<table align="center">
    <thead align="center">
    <td>
        <h2>Les articles du plus récent au plus ancien</h2>
    </td>
    </thead>
    <tr align="center">
        <td>
            <form method="post">
                <input class="submitB" type="submit" name="theme" value="Thème">
                <input class="submitB" type="submit" name="date" value="Date">
                <input class="submitB" type="submit" name="dateTheme" value="Date et Thème">
                <br/> <br/>
                <input type="text" name="txtSearch" placeholder="Ex : Jeux Vidéos" style="background: transparent; width: 150px; height: 30px;">
                <input type="submit" name="search" value="Rechercher" style="color: #F6F8F2; background: linear-gradient(90deg, #212120 0%, #333533 100%); border: none; width: 150px; height: 35px;">
            </form>
        </td>
    </tr>

    <?php
    if (isset($_POST["date"])){
        $res = "select * from news, theme where news.idtheme = theme.idtheme order by datenews desc";
    }
    elseif (isset($_POST["theme"])){
        $res = "select * from news, theme where news.idtheme = theme.idtheme order by theme.description";
    }
    elseif (isset($_POST["dateTheme"])){
        $res = "select * from news, theme where news.idtheme = theme.idtheme order by theme.description, datenews desc";
    }
    else if (isset($_POST['search'])){
        if ($_POST["txtSearch"] != ""){
            $txt = $_POST["txtSearch"];
            $res = "select distinct * from news, theme where titrenews like '%" . $txt . "%'
                            or textenews like '%" . $txt . "%'
                            or description like '%" . $txt . "%'
                            and news.idtheme = theme.idtheme order by theme.description, datenews desc";

//            $res = "select distinct * from news where titrenews like '%" . $txt . "%' or textenews like '%" . $txt . "%'
//                            order by datenews desc";
//            work but theme is missing --> errors finding row description
        }
    }
    else{
        $res = "select * from news, theme where news.idtheme = theme.idtheme order by datenews desc";
    }

    $result = $objPdo->query($res);

    foreach ($result as $row ) {
        echo "<tr class=\"article\">
                <td>
                    <h3>⪧ " . $row ['titrenews'] . "</h3>
                    <p class=\"date\">" . $row ['datenews'] . " - " . $row['description'] . "</p>
                    <p>" . $row ['textenews'] . "</p>
                </td>
              </tr>";
    }
    ?>
</table>
<br/>
<!--footer-->
<footer>
    <br/>
    <h4>&copy; 2020, HOUVER SING Irma & CADET Gauthier</h4>
</footer>
</body>
</html>