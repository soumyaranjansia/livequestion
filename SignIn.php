<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>SignIn</title>
    <?php
    include 'css/CSS_package.php';
    include 'JS/JS_package.php';
    ?>
    <link rel="stylesheet" type="text/css" href="css/log-in.css">
</head>
<body>
<div class="box">
<h2>
    SignIn
</h2>
    <form action="SignIn.php" method="post">

        <p>
            Veuillez saisir vos données d'inscription :
        </p>
        <p>
            Vous êtes ?
        </p>
        <label for="H"><input type="radio" name="sexe" value="H">Un homme</label>
        <label for="F"><input type="radio" name="sexe" value="F">Une femme</label><br><br>

        <label><input class="form-element" type="text" name="username" placeholder="Pseudo"></label>
        <label><input class="form-element" type="text" name="email" placeholder="Email"></label>
        <label><input class="form-element" type="password" name="pswd" minlength="8" placeholder="Mot de passe"></label>
        <label><input class="form-element" type="password" name="pswdVerif" minlength="8" placeholder="Confirmation Mdp"></label><br><br>


        <button type="submit" name="submit">S'inscrire</button>
    </form>
    <p>Vous avez un compte ? <a href="Log-in.php">Connectez-vous</a></p>
<?php
require('connexion.php');
if (isset($_POST['submit'])){
    $co = connexionBdd();
if(isset($_POST['sexe'], $_POST['username'], $_POST['email'], $_POST['pswd'], $_POST['pswdVerif'])) {

    $sexe = $_POST['sexe'];
    $username = $_POST['username'];
    $email = $_POST['email'];


    $emailStmt = $co->prepare("SELECT * FROM utilisateurs WHERE UserMail='$email'");
    $emailStmt->execute();
    $emailVerif = $emailStmt->fetch();
    if ($emailVerif) {
        echo 'cet email est deja utilisé.';
    } else {
        $emailUnique = $_POST['email'];
    }

    $pseudoStmt = $co->prepare("SELECT * FROM utilisateurs WHERE UserName='$username'");
    $pseudoStmt->execute();
    $usernameVerif = $pseudoStmt->fetch();
    if ($usernameVerif) {
        echo 'ce pseudo est deja utilisé.';
    } else {
        $pseudoUnique = $_POST['username'];
    }

    if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}#', $_POST['pswd'])) {
        if($_POST['pswd'] == $_POST['pswdVerif'])
        {
            $pswd = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
        }
        else
        {
            echo '<p>les mots de passe ne sont pas identiques.</p>';
        }
    } else {
        echo 'Mot de passe non conforme, minimum 8 caractères et les caractères suivant sont attendus :<ul><li>- au moins une lettre minuscule</li><li>- au moins une lettre majuscule</li><li>- au moins un chiffre</li><li>- au moins un de ces caractères spéciaux: $ @ % * + - _ !</li><ul>';
    }
}
    if(isset($sexe,  $pseudoUnique, $emailUnique, $pswd)) {
        if($sexe == "H"){
            $ava = '<img class="avatar" src="images/avatar/avatarH.png" alt="avatar">';
        }else{
            $ava = '<img class="avatar" src="images/avatar/avatarF.png" alt="avatar">';
        }

        $roles = 'M';

        $query = $co->prepare("INSERT into utilisateurs(UserName, UserMail, UserPass, UserAva, UserGender, UserRole) VALUES (:username, :email, :pswd, :avatar, :sexe, :roles)");

        $query->bindParam(':sexe', $sexe);
        $query->bindParam(':username', $pseudoUnique);
        $query->bindParam(':email', $emailUnique);
        $query->bindParam(':pswd', $pswd);
        $query->bindParam(':avatar', $ava);
        $query->bindParam(':roles', $roles);

        $query->execute();
        echo "Votre compte a bien été enregistrer !";
        sleep(2);
        header('location:Log-in.php');
    }
}
?>
</div>
</body>
</html>

