<?php
session_start();
    if (isset($_POST["valider"])){
            if (!$_POST['nu'] == '' && !$_POST['mdp'] == '') {
                $_SESSION['login'] = $_POST['nu'];
                $_SESSION['password'] = $_POST['mdp'];
                header("Location:sessiontest.php");
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/signIn.css">
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
                        <input type="text" name="nu" value="nom d'utilisateur" onfocus=this.value=''>
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
