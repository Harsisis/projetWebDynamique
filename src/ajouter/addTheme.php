<?php
include("../database/connection.php");
$objPdo = connect();
if (isset($_POST["valider"])){
    if ($_POST['theme'] != ""){// check if already exist
        $theme = $_POST['theme'];
        $result = $objPdo->query("insert into theme(description) values ('$theme')");
        header("Location:../accueil.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/addtheme.css">
    <title>Ajouter un thème</title>
</head>
<body>
<div align="center">
    <div id="champs" align="center">
        <h2>Ajouter un thème</h2>

        <form method="post">
            <table>
                <tr>
                    <td align="center">
                        <input type="text" name="theme" value="nom du thème" onfocus=this.value=''>
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
