<?php
include("database/connection.php");

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
                if (isset($_SESSION['login']) || isset($_SESSION['password'])) {
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
    if (isset($_SESSION['login']) || isset($_SESSION['password'])) {
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
            </form>
        </td>
    </tr>
    <?php
    $objPdo = connect();

    $objPdo->query('SET NAMES utf8');

    if (isset($_POST["date"])){
        $result = $objPdo->query("select * from news, theme where news.idtheme = theme.idtheme order by datenews desc");
    }
    elseif (isset($_POST["theme"])){
        $result = $objPdo->query("select * from news, theme where news.idtheme = theme.idtheme order by theme.description");
    }
    else{
        $result = $objPdo->query("select * from news, theme where news.idtheme = theme.idtheme order by datenews desc");
    }

    foreach ($result as $row ) {
        echo "<tr>
                    <td>
                        <h3>" . $row ['titrenews'] . "</h3>
                    </td>
                </tr>";

        echo "<tr>
                    <td>
                        <p class='date'>" . $row ['datenews'] . " - " . $row['description'] . "</p>
                        <p>" . $row ['textenews'] . "</p>
                    </td>
                </tr>";


        echo "<tr class=\"separator\"></tr>";
    }
    ?>
</table>

<br/>
<!--footer-->
<footer>
    </br>
    <h4>&copy; 2020, HOUVER SING Irma & CADET Gauthier</h4>
</footer>
</body>
</html>