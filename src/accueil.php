<?php
include("database/connection.php");

session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Accueil</title>
</head>
<body>

<header>
    <div class="row">
        <h1>YuGo News ⚡</h1>
    </div>
    <div class="row">
        <nav>
            <ul>
                <li>
                    <a class="menuB" href="">bouton1</a>
                </li>
                <li>
                    <a class="menuB" href="">bouton2</a>
                </li>
                <li>
                    <a class="menuB" href="">bouton3</a>
                </li>
                <li>
                    <a class="menuB" href="">bouton4</a>
                </li>
            </ul>
        </nav>
    </div>
    <?php
    if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
        echo "<div class=\"row right\">
        <nav>
            <ul>
                <li>
                    <a href=\"session/seConnecter.php\">Sign in</a>
                </li>
                <li>
                    <a href=\"session/creerCompte.php\">Sign up</a>
                </li>
            </ul>
        </nav>
    </div>";
    }
    else{
        echo "<div class=\"row right\">
        <nav>
            <ul>
                <li>
                    <a href=\"session/seDeconnecter.php\">Sign out</a>
                </li>
            </ul>
        </nav>
    </div>";
    }
    ?>

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
        $result = $objPdo->query("select * from news order by datenews desc");
    }
    elseif (isset($_POST["theme"])){
        $result = $objPdo->query("select * from news, theme where news.idtheme = theme.idtheme order by theme.description");
    }
    else{
        $result = $objPdo->query("select * from news");
    }

        foreach ($result as $row ) {
            echo "<tr>
                    <td>
                        <h3>" . $row ['titrenews'] . "</h3>
                    </td>
                </tr>";

            echo "<tr>
                    <td>
                        <p class='date'>" . $row ['datenews'] . "</p>
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