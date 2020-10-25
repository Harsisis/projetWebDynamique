<?php
session_start();
include("../database/connection.php");
$objPdo = connect();
    if (isset($_POST["valider"])){
            if ($_POST['mail'] != '' && $_POST['mdp'] != '') {
                $recordMail = $_POST['mail'];
                $recordMdp = $_POST['mdp'];
                $result = $objPdo->query("select * from redacteur where motdepasse = '$recordMdp' and adressemail = '$recordMail'");
                foreach ($result as $row ) {
                    echo $row['adressemail'];
                }
                if (!empty($result)){
                    $_SESSION['login'] = $recordMail;
                    $_SESSION['password'] = $recordMdp;
                    header("Location:sessiontest.php");
                }
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/signIn.css">
    <title>Se Connecter</title>
</head>
<body>
<div align="center">
    <div id="champs" align="center">
        <h2>Se Connecter</h2>

        <form method="post">
            <table>
                <tr>
                    <td align="center">
                        <input type="text" name="mail" value="mail" onfocus=this.value=''>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="password" name="mdp" value="mot de passe" onfocus=this.value=''>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit" value="Valider" name="valider">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

</body>
</html>
