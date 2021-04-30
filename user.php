<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['pseudo']?></title>
    <?php
    include 'css/CSS_package.php';
    include 'JS/JS_package.php';
    ?>
    <link rel="stylesheet" type="text/css" href="css/log-in.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">User</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="question.php"><button class="btn btn-outline-secondary btn-sm">Page Question <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        </svg></button></a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if($_SESSION['role'] == 'A'){
                        echo '<a href="admin.php"><button class="btn btn-outline-secondary btn-sm">Page Admin <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 1 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                        </svg></button></a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php include 'LogOut.php'; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php
include('connexion.php');
$co = connexionBdd();
$id = $_SESSION['user_id'];
$query = $co->prepare("SELECT * FROM utilisateurs WHERE UserId=:id");
$query->bindParam("id", $id, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
?>
<div class="white">
    <table>
        <tr>
            <td>
                Pseudo actuel : <?php echo $_SESSION['avatar'],' ' ,$result['UserName'] ?>
            </td>
            <td>
                Email actuel : <?php echo $result['UserMail'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <form action="user.php" method="post">
                    <label><input class="form-element" type="text" name="username" placeholder="Modifier pseudo"></label>
                    <button type="submit" class="btn btn-outline-secondary btn-sm" name="user">Modifier</button>
                </form>
                <form action="user.php" method="post">
                    <label><input class="form-element" type="text" name="email" placeholder="Modifier email"></label>
                    <button type="submit" class="btn btn-outline-secondary btn-sm" name="mail">Modifier</button>
                </form>
                <form action="user.php" method="post">
                    <label><input class="form-element" type="password" name="pswd" minlength="8" placeholder="Modifier mot de passe"></label><br>
                    <label><input class="form-element" type="password" name="pswdVerif" minlength="8" placeholder="Confirmation Mdp"></label>
                    <button type="submit" class="btn btn-outline-secondary btn-sm" name="pass">Modifier</button>
                </form>
            </td>
        </tr>
    </table><br>
    <?php


    if (isset($_POST['mail'])){
        if(isset($_POST['email'])) {
            $email = $_POST['email'];
            $emailStmt = $co->prepare("SELECT * FROM utilisateurs WHERE UserMail='$email'");
            $emailStmt->execute();
            $emailVerif = $emailStmt->fetch();
            if ($emailVerif) {
                echo 'cet email est deja utilisé.';
            } else {
                $emailUnique = $_POST['email'];
            }

        }
    }
    if (isset($_POST['user'])){
        if(isset($_POST['username'])) {
            $username = $_POST['username'];
            $pseudoStmt = $co->prepare("SELECT * FROM utilisateurs WHERE UserName='$username'");
            $pseudoStmt->execute();
            $usernameVerif = $pseudoStmt->fetch();
            if ($usernameVerif) {
                echo 'ce pseudo est deja utilisé.';
            } else {
                $pseudoUnique = $_POST['username'];
            }

        }
    }

    if (isset($_POST['pass'])) {
        if (isset($_POST['pswd'])) {
            if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}#', $_POST['pswd'])) {
                if ($_POST['pswd'] == $_POST['pswdVerif']) {
                    $pswd = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
                } else {
                    echo '<p>les mots de passe ne sont pas identiques.</p>';
                }
            } else {
                echo 'Mot de passe non conforme, minimum 8 caractères et les caractères suivant sont attendus :<ul><li>- au moins une lettre minuscule</li><li>- au moins une lettre majuscule</li><li>- au moins un chiffre</li><li>- au moins un de ces caractères spéciaux: $ @ % * + - _ !</li><ul>';
            }
        }
    }

    if(isset($pseudoUnique)) {

        $query = $co->prepare("UPDATE utilisateurs SET UserName = :username WHERE UserId = :userid");
        $query->bindParam(':username', $pseudoUnique);
        $query->bindParam(':userid', $_SESSION['user_id']);

        $query->execute();
        echo("<meta http-equiv='refresh' content='0.5'>");
    }
    if(isset($emailUnique)) {

        $query = $co->prepare("UPDATE utilisateurs SET UserMail = :email WHERE UserId = :userid");
        $query->bindParam(':email', $emailUnique);
        $query->bindParam(':userid', $_SESSION['user_id']);

        $query->execute();
        echo("<meta http-equiv='refresh' content='0.5'>");
    }
    if(isset($pswd)) {

        $query = $co->prepare("UPDATE utilisateurs SET UserPass = :pswd WHERE UserId = :userid");
        $query->bindParam(':pswd', $pswd);
        $query->bindParam(':userid', $_SESSION['user_id']);

        $query->execute();
        echo("<meta http-equiv='refresh' content='0.5'>");
    }
    include 'avatar.php';
    ?>
    <br>
    <p>
        <button class="btn btn-outline-secondary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#supprUser" aria-expanded="false" aria-controls="collapseExample">
            Supprimer définitivement mon compte <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 1.5 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
        </button>
    </p>
    <div class="collapse" id="supprUser">
        <div class="card card-body">
            <h5>Etes vous sure de vouloir supprimer définitivement votre compte ?</h5>
            <form action="user.php" method="post">
                <button type="submit" class="btn btn-danger btn-sm" name="SupprUserOui">Oui</button>
                <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#supprUser" aria-expanded="false" aria-controls="collapseExample">
                    Non
                </button>
            </form>
        </div>
    </div>


    <?php
    if(isset($_POST['SupprUserOui'])){

            $query = $co->prepare("DELETE FROM reponse WHERE RepUserId = :UserId ");
            $query->bindParam(':UserId', $_SESSION['user_id']);
            $query->execute();

            $query = $co->prepare("DELETE FROM question WHERE QuestAutorId = :UserId ");
            $query->bindParam(':UserId', $_SESSION['user_id']);
            $query->execute();

            $query = $co->prepare("DELETE FROM utilisateurs WHERE UserId = :UserId ");
            $query->bindParam(':UserId', $_SESSION['user_id']);
            $query->execute();


        $_SESSION = array();
        session_destroy();

        echo("<meta http-equiv='refresh' content='0.5; url=index.php'>");

    }


    ?>
</div>
</body>
</html>