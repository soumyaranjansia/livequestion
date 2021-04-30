<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?php echo $_POST['pseudo_user'];?></title>
    <?php
    include 'css/CSS_package.php';
    include 'JS/JS_package.php';
    ?>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Other user</a>
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
    <div class="black"><p>poupidou</p></div>
<?php
include('connexion.php');
$co = connexionBdd();
?>

<table>
    <?php
    $co = connexionBdd();
    $userid = $_POST['id_user'];
    $Quest = $co->query("SELECT * FROM question LEFT JOIN utilisateurs ON question.QuestAutorId = utilisateurs.UserId LEFT JOIN categorie ON question.QuestCatId = categorie.CatId WHERE QuestAutorId= '$userid' ORDER BY QuestCreaDate DESC");
    while ($listeQuest = $Quest->fetch())
    {
        $QId = $listeQuest['QuestId'];
        $Rep = $co->query("SELECT * FROM reponse LEFT JOIN utilisateurs ON reponse.RepUserId = utilisateurs.UserId WHERE RepQuestId= '$QId'");
        $Rep->execute();
        $count = $Rep->rowCount();
        ?>
        <table>
            <tr>
                <td><?php echo $listeQuest['UserAva'];?></td>
                <td><?php echo $listeQuest['UserName'];?></td>
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
        <?php


    }
    $Rep = $co->query("SELECT * FROM reponse LEFT JOIN utilisateurs ON reponse.RepUserId = utilisateurs.UserId WHERE RepUserId= '$userid'");
    $Rep->execute();
    while ($listeRep = $Rep->fetch())
    {
        $RepquestId =$listeRep['RepQuestId'];
        $QuestR = $co->query("SELECT * FROM question LEFT JOIN utilisateurs ON question.QuestAutorId = utilisateurs.UserId LEFT JOIN categorie ON question.QuestCatId = categorie.CatId WHERE QuestId= '$RepquestId'");
        $QuestRep=$QuestR ->fetch();
        ?>
        <table>
        <tr>
            <td><?php echo $listeRep['UserAva']?></td>
            <td><?php echo $listeRep['UserName'];?></td>
        </tr>
        <tr>
            <td><?php echo $listeRep['RepQuest'];?></td>
            <td><?php echo $listeRep['RepDate'];?></td>
            <td><button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalRep<?php echo $listeRep['RepQuestId']; ?>">Voir la question <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 1.5 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                    </svg></button></td>
        </tr>
    </table>

    <div class="modal fade" id="modalRep<?php echo $listeRep['RepQuestId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">

                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <table>
                            <tr>
                                <td> La question : </td>
                            </tr>
                            <tr>
                                <td><?php echo $QuestRep['QuestTitle'].' | ' ,$QuestRep['QuestText'];?></td>
                            </tr>
                            <tr>
                                <td>Posé par : <?php echo $QuestRep['UserAva'].' ' ,$QuestRep['UserName']; ?></td>
                            </tr>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
        <?php
    }
    $Rep->closeCursor();
    $Quest->closeCursor();
    ?>
</body>
</html>