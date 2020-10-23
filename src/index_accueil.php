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
        <!--        <img class="icon" src="images/logo.png">-->
        <h1>Titre site</h1>
    </div>
    <div class="row">
        <nav>
            <ul>
                <li>
                    <a href="">bouton1</a>
                </li>
                <li>
                    <a href="">bouton2</a>
                </li>
                <li>
                    <a href="">bouton3</a>
                </li>
                <li>
                    <a href="">bouton4</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row right">
        <nav>
            <ul>
                <li>
                    <a href="seConnecter.php">Sign in</a>
                </li>
                <li>
                    <a href="seConnecter.php">Sign up</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<br/>

<!--slideshow to see the latest news-->
<div id="slideshow">
    <div class="slide-wrapper">
        <div class="slide"><h2 class="slide-title">news1</h2></div>
        <div class="slide"><h1 class="slide-title">news2</h1></div>
        <div class="slide"><h1 class="slide-title">news3</h1></div>
        <div class="slide"><h1 class="slide-title">news4</h1></div>
        <div class="slide"><h1 class="slide-title">news5</h1></div>
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
                <input type="submit" name="theme" value="Thème">
                <input type="submit" name="date" value="Date">
            </form>
        </td>
    </tr>
    <?php

    try {
        $objPdo = new PDO ('mysql:host=devbdd.iutmetz.univ-lorraine.fr;port=3306;dbname=cadet25u_projetPHP', 'cadet25u_appli', 'Gauthier541609' );
    }
    catch( Exception $exception ) {
        die($exception->getMessage());
    }
        $objPdo->query('SET NAMES utf8');
        $result = $objPdo->query("select * from news order by datenews");
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
<div class="footer">
    <article class="bottom left">
        <h3>Projet</h3>
        <ul>
            <a class="foot" href="Projet_mangas_accueil.html">
                <li class="foot">
                    Accueil Mangas
                </li>
            </a>
            <a class="foot" href="Projet_jeuxvideos_accueil.html">
                <li class="foot">
                    Accueil Jeux Vidéos
                </li>
            </a>
            <a class="foot" href="Projet_musique_accueil.html">
                <li class="foot">
                    Accueil Musiques
                </li>
            </a>
            <a class="foot" href="Projet_sport_accueil.html">
                <li class="foot">
                    Accueil Sport
                </li>
            </a>
        </ul>
    </article>
    <article class="bottom middle">
        <h3>Contact</h3>
        <ul>
            <a class="foot" href="Projet_mangas_accueil.html">
                <li class="foot">
                    Accueil Mangas
                </li>
            </a>
            <a class="foot" href="Projet_jeuxvideos_accueil.html">
                <li class="foot">
                    Accueil Jeux Vidéos
                </li>
            </a>
            <a class="foot" href="Projet_musique_accueil.html">
                <li class="foot">
                    Accueil Musiques
                </li>
            </a>
            <a class="foot" href="Projet_sport_accueil.html">
                <li class="foot">
                    Accueil Sport
                </li>
            </a>
        </ul>
    </article>
    <article class="bottom right">
        <h3>Autres</h3>
        <ul>
            <a class="foot" href="Projet_mangas_accueil.html">
                <li class="foot">
                    Accueil Mangas
                </li>
            </a>
            <a class="foot" href="Projet_jeuxvideos_accueil.html">
                <li class="foot">
                    Accueil Jeux Vidéos
                </li>
            </a>
            <a class="foot" href="Projet_musique_accueil.html">
                <li class="foot">
                    Accueil Musiques
                </li>
            </a>
            <a class="foot" href="Projet_sport_accueil.html">
                <li class="foot">
                    Accueil Sport
                </li>
            </a>
        </ul>
    </article>
</div>
</body>
</html>