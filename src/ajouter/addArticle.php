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
    <link rel="stylesheet" type="text/css" href="../css/addArticle.css">
    <title>Ajouter un article</title>
</head>
<body>
<div align="center">
    <div id="champs" align="center">
        <h2>Ajouter un article</h2>

        <form method="post">
            <table>
                <tr>
                    <td align="center">
                        <input type="text" name="titre" placeholder="titre">
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <textarea id="contenu" placeholder="contenu de l'article"></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type=text list=theme >
                        <datalist id=browsers >
                            <?php
                            $result = $objPdo->query("select * from theme");

                            foreach ($result as $row ) {
                                echo "<option>" . $row['description'] . "/</option>";
                            }
                            ?>
                        </datalist>
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
