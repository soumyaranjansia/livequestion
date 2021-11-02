//By using session , all are can't access admin panel except you , so you have to set the session as e.g-"adminxcvxvx12121iu" or as per your requirement, while login is success
//then automatically set the session to above , it will work perfectly.
<?php if(!isset($_SESSION['adminxcvxvx12121iu'])){
header("location:index.php");}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <?php
    include 'css/CSS_package.php';
    include 'JS/JS_package.php';
    ?>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php
                            session_start();
                            echo'<a href="User.php"><button class="btn btn-outline-secondary btn-sm">Mon Profil '.$_SESSION['avatar'].'</button></a>';
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php if($_SESSION['role'] == 'A'){?>
                            <form action="admin.php" method="post">
                                <button type="submit" class="btn btn-outline-secondary btn-sm" name="logout" value="logout">Se déconnecter <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 1 16 16">
                                    <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                </svg></button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a href="question.php"><button class="btn btn-outline-secondary btn-sm">Page Question <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                              <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                              <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                          </svg></button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
     </header>
    <?php
    if (isset($_POST['logout'])) {
        $_SESSION = array();
        session_destroy();
        echo 'vous etes deconnecter !';
        echo("<meta http-equiv='refresh' content='0.5; url=index.php'>");
    }
            include 'gest_user.php';
            include 'gest_quest.php';
            include 'gest_categ.php';

        } elseif($_SESSION['role'] == 'M') {

            header('location:question.php');

        } else {

            header('location:index.php');

        }
        ?>
</body>
</html>
