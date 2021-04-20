<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>LogIn</title>
</head>
<body>
<h2>
    Pour vous connecter :
</h2>
<form method="post" action="" name="LogIn-form">
    <div class="form-element">
        <label><input type="text" name="username" placeholder="Pseudo"></label>
    </div>
    <div class="form-element">
        <label><input type="password" name="pswd" minlength="8" placeholder="Mot de passe"></label>
    </div>
    <button type="submit" name="login" value="login">Se connecter</button>
</form>
<?php
session_start();
include('connexion.php');
if (isset($_POST['login'])) {
    $co = connexionBdd();
    $username = $_POST['username'];
    $password = $_POST['pswd'];
    $query = $co->prepare("SELECT * FROM utilisateurs WHERE UserName=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Pseudo ou mot de passe invalide.</p>';
    } else {
        if (password_verify($password, $result['UserPass'])) {
            $_SESSION['user_id'] = $result['UserId'];
            echo '<p class="success">Vous etes connecté !</p>';
        } else {
            echo '<p class="error">Pseudo ou mot de passe invalide.</p>';
        }
    }
}
?>