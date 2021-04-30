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
            <td>
                <form action="question.php" method="post">
                <button type="submit" class="btn btn-outline-secondary btn-sm" name="suppr<?php echo $listeQuest['QuestId']; ?>">Supprimer <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 1.5 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg></button></form></td>

            <?php
                if (isset($_POST['suppr'.$listeQuest['QuestId'].''])) {
                    $co->prepare("DELETE  ");
                }
            ?>

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
                        while ($listeRep = $Rep->fetch())
                        {
                            ?>
                            <tr>
                                <td><?php echo $listeRep['UserAva']?></td>
                                <td><?php echo $listeRep['UserName'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $listeRep['RepQuest'];?></td>
                                <td><?php echo $listeRep['RepDate'];?></td>
                                <td>
                                    <form action="question.php" method="post">
                                        <button type="submit" class="btn btn-outline-secondary btn-sm" name="suppr<?php echo $listeRep['RepQuestId']; ?>">Supprimer <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 1.5 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg></button></form></td>
                            </tr>
                            <?php
                        }
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
    $Rep->closeCursor();
}
$Quest->closeCursor();
?>