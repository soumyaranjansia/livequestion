
<?php
if (isset($_POST['submit'])){
    $co = connexionBdd();
    if(isset($_POST['RepText'])){

        $questId = $_POST['IdQuest'];
        $RepText = $_POST['RepText'];
        $userId = $_SESSION['user_id'];

        $query = $co->prepare("INSERT into reponse(RepUserId, RepQuestId, RepQuest) VALUES (:userId, :questId, :RepText)");

        $query->bindParam(':userId', $userId);
        $query->bindParam(':questId', $questId);
        $query->bindParam(':RepText', $RepText);

        $query->execute();
        $query->closeCursor();
        echo("<meta http-equiv='refresh' content='0.5'>");
    }
}
?>