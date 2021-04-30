<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Question</title>
    <?php
    include 'css/CSS_package.php';
    include 'JS/JS_package.php';
    ?>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Question</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php
                        echo'<a href="User.php"><button class="btn btn-outline-secondary btn-sm">Mon Profil '.$_SESSION['avatar'].'</button></a>';
                        ?>
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
                </ul>
            </div>
        </div>
    </nav>
    <div class="black"><p>poupidou</p></div>
<?php
require ("connexion.php");
include 'poser_quest.php';
?>

<table>
<?php
$co = connexionBdd();
$Quest = $co->query("SELECT * FROM question LEFT JOIN utilisateurs ON question.QuestAutorId = utilisateurs.UserId LEFT JOIN categorie ON question.QuestCatId = categorie.CatId ORDER BY QuestCreaDate DESC");
while ($listeQuest = $Quest->fetch())
{
    $IdQuest = $listeQuest['QuestId'];
    $Rep = $co->query("SELECT * FROM reponse LEFT JOIN utilisateurs ON reponse.RepUserId = utilisateurs.UserId WHERE RepQuestId='$IdQuest' ");
    $Rep->execute();
    $count = $Rep->rowCount();
    ?>
    <table>
    <tr>
        <td><form method="post" action="vueUser.php"><input type="hidden" name="pseudo_user" value="<?php echo $listeQuest['UserName'];?>"><input type="hidden" name="id_user" value="<?php echo $listeQuest['UserId'];?>"><button class="btn btn-outline-secondary btn-sm"><?php echo $listeQuest['UserAva'];?>
        <?php echo $listeQuest['UserName'];?></button></form></td>
        <td><?php echo $listeQuest['CatName'];?></td>
        <td>Nombre de reponses : <?php echo $count;?></td>
    </tr>
    <tr>
        <td><?php echo $listeQuest['QuestTitle'];?></td>
        <td><?php echo $listeQuest['QuestText'];?></td>
        <td><?php echo $listeQuest['QuestCreaDate'];?></td>
        <td><button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalRepQ<?php echo $listeQuest['QuestId']; ?>">Voir les reponses <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 1.5 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg></button></td>
        <td><button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalRepondreQ<?php echo $listeQuest['QuestId']; ?>">Répondre a la question <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply" viewBox="0 1.5 16 16">
                    <path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z"/>
                </svg></button></td>

    </tr>
    </table>

    <div class="modal fade" id="modalRepQ<?php echo $listeQuest['QuestId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <table>
                            <tr>
                                <td>Reponses a la question : </td>
                            </tr>
                            <tr>
                                <td><?php echo $listeQuest['QuestTitle'].' | ' ,$listeQuest['QuestText'];?></td>
                            </tr>
                            <tr>
                                <td>Posé par : <?php echo $listeQuest['UserAva'].' ' ,$listeQuest['UserName']; ?></td>
                            </tr>
                        </table>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <?php
                        include "reponse.php";
                        ?>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRepondreQ<?php echo $listeQuest['QuestId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <table>
                            <tr>
                                <td>Repondre a la question : </td>
                            </tr>
                            <tr>
                                <td><?php echo $listeQuest['QuestTitle'].' | ' ,$listeQuest['QuestText'];?></td>
                            </tr>
                            <tr>
                                <td>Posé par : <?php echo $listeQuest['UserAva'].' ' ,$listeQuest['UserName']; ?></td>
                            </tr>
                        </table>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td><form action="question.php" method="post"><label><input type="text" name="RepText" placeholder="Vôtre reponse" required></label><input type="hidden" name="IdQuest" value="<?php echo $listeQuest['QuestId']; ?>" ></td>
                            <td><button type="submit" class="btn btn-outline-secondary btn-sm" name="submit">Soumettre</button></form></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<?php
    $Rep->closeCursor();
}
include "repondre.php";
$Quest->closeCursor();
?>

</body>
</html>
