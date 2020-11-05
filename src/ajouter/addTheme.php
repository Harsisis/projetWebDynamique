<?php
include("../database/connection.php");
$objPdo = connect();
if (isset($_POST["valider"])){
    if ($_POST['theme'] != ""){// check if already exist
        $theme = $_POST['theme'];

        $select = $objPdo->query("select * from theme where description = '$theme'");
        if ($select->rowCount() > 0){
            echo "erreur thème déjà créé";
        } else {
            $result = $objPdo->query("insert into theme(description) values ('$theme')");
            header("Location:../accueil.php");
        }
    }
}
else if (isset($_POST["accueil"])){
    header("Location:../accueil.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/styleTheme.css">
    <title>Ajouter un thème</title>
</head>
<body>

<div class="container">
    <div class="wrap">
        <div class="headings">
            <a id="sign-up"><span>Ajouter un Thème</span></a>
        </div>
        <div id="sign-in-form">
            <form  method="post">
                <label for="username">Nom</label>
                <input id="username" type="text" name="theme" />
                <input type="submit" class="button" name="valider" value="Valider"/>
                <input type="submit" name="accueil" value="Accueil"/>
            </form>
        </div>
    </div>
</div>

</body>
</html>



