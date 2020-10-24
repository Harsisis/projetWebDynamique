<?php
session_start();
    if (isset($_POST["valider"])){
        $_SESSION['login'] = $_POST['nu'];
        $_SESSION['password'] = $_POST['mdp'];
        echo $_SESSION['login'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Se Connecter</title>
</head>
<body>

<div>
    <h2>Se Connecter</h2>

    <form method="post">
        <table>
            <tr>
                <td>
                    <input type="text" name="nu" value="nom d'utilisateur">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="mdp" value="mot de passe">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Valider" name="valider">
                </td>
            </tr>
        </table>
    </form>

    <a href="sessiontest.php">espace</a>
</div>

</body>
</html>
