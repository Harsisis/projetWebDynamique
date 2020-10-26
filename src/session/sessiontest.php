<?php
session_start();
// démarre une nouvelle session ou reprend une session existante

if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
    header("Location:seConnecter.php") ;
// redirection vers la page d'authentification
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Titre de ma page</title>
</head>
<body>
<p>
    nom utilisateur <?php echo $_SESSION['login']; ?> <br />
    mot de passe <?php echo $_SESSION['password']; ?>
</p>

<a href="../accueil.php">accueil</a>
</body>
</html>