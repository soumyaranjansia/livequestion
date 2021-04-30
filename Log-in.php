<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>LogIn</title>
    <?php
    include 'css/CSS_package.php';
    include 'JS/JS_package.php';
    ?>
    <link rel="stylesheet" type="text/css" href="css/log-in.css">
</head>
<body>
<div class="box">
<h2>
    LogIn
</h2>
    <form method="post" action="" name="LogIn-form">
        <div class="form-element">
            <label>
                <input type="text"  placeholder="Pseudo" name="username">
            </label>
        </div>
        <div class="form-element">
            <label>
                <input type="password" placeholder="Mot de passe" name="pswd" minlength="8">
            </label>
        </div>
        <button  class="form-element" type="submit" name="login" value="login">Se connecter</button>
    </form>
    <p>Vous n'avez pas de compte ? <a href="SignIn.php">Inscrirez-vous</a></p>

<?php
session_start();
include('connexion.php');
if(!isset($_SESSION['user_id'], $_SESSION['pseudo'],$_SESSION['role'])){
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
            $_SESSION['pseudo'] = $result['UserName'];
            $_SESSION['avatar'] = $result['UserAva'];
            $_SESSION['role'] = $result['UserRole'];
            if($_SESSION['role'] == 'A'){
                header('location:admin.php');
            } else {
                header('location:question.php');
            }
        } else {
            echo '<p class="error">Pseudo ou mot de passe invalide.</p>';
        }
    }
}
} else {
    if($_SESSION['role'] == 'A'){
        echo '<p>Vous etes deja connecté : </p>' .$_SESSION['avatar'].' '.$_SESSION['pseudo'].' <p><a href="admin.php"><button>Retour a la pages Admin <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 1 16 16">
  <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
  <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
</svg></button></a></p> ';
        include 'LogOut.php';
    } else {
        echo '<p>Vous etes deja connecté : </p>' .$_SESSION['avatar'].' '.$_SESSION['pseudo'].' <p><a href="question.php"><button>Retour aux questions</button></a></p> ';
        include 'LogOut.php';
    }
}
?>
</div>
</body>
</html>


