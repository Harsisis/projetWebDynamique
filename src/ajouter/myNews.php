<?php
include("../database/connection.php");
$objPdo = connect();
$objPdo->query('SET NAMES utf8');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/accueil.css">
    <title>Mes articles</title>
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
                            <a class=\"menuB\" href=\"../accueil.php\">accueil</a>
                            </li>
                            <li>
                            <a class=\"menuB\" href=\"addArticle.php\">écrire un article</a>
                            </li>
                            <li>
                            <a class=\"menuB\" href=\"addTheme.php\">ajouter un thème</a>
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
                ?>
            </ul>
        </nav>
    </div>

</header>

<!-- the latest news need to be in a table sorted by date-->

<table align="center">
    <thead align="center">
    <td>
        <h2>Rechercher parmis vos articles</h2>
    </td>
    </thead>
    <tr align="center">
        <td>
            <form method="post">
                <input class="submitB" type="submit" name="all" value="Afficher tout">
                <br/><br/>
                <input type="text" name="txtSearch" placeholder="Ex : Jeux Vidéos" style="background: transparent; width: 150px; height: 30px;">
                <input type="submit" name="search" value="Rechercher" style="color: #F6F8F2; background: linear-gradient(90deg, #212120 0%, #333533 100%); border: none; width: 150px; height: 35px;">
            </form>
        </td>
    </tr>

    <?php
    $idRed = $_SESSION['id'];
    $res = "";
    if (isset($_POST['all'])){
        $res = "select * from news, theme, redacteur 
                    where news.idtheme = theme.idtheme 
                    and news.idredacteur = redacteur.idredacteur 
                    and redacteur.idredacteur = " . $idRed . " 
                    order by datenews desc";
    }
    else if (isset($_POST['search'])){
        if ($_POST["txtSearch"] != ""){
            $txt = $_POST["txtSearch"];
            $res = "select distinct * from news, theme, redacteur 
                            where (titrenews like '%" . $txt . "%'
                            or textenews like '%" . $txt . "%'
                            or description like '%" . $txt . "%')
                            and news.idtheme = theme.idtheme 
                            and news.idredacteur = redacteur.idredacteur 
                            and redacteur.idredacteur = " . $idRed . "
                            order by theme.description, datenews desc";
        }
    }
    else{
        $res = "select * from news, theme, redacteur 
                    where news.idtheme = theme.idtheme 
                    and news.idredacteur = redacteur.idredacteur 
                    and redacteur.idredacteur = " . $idRed . " 
                    order by datenews desc";
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
    <h5>&copy; 2020, HOUVER SING Irma & CADET Gauthier</h5>
</footer>
</body>
</html>
