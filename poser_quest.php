<p>
    Poser vôtre question :
</p>
<form action="question.php" method="post">
    <select class="btn btn-outline-secondary btn-sm" name="catId">

        <?php
        $co = connexionBdd();
        $selected = $co->query("SELECT * FROM categorie");
        while ($liste = $selected->fetch())
        {
            echo '<option value="'.$liste['CatId'].'">'.$liste['CatName'].'</option>';
        }
        $selected->closeCursor();
        ?>

    </select>
    <label><input type="text" name="titreQuest" placeholder="Titre de vôtre question" required></label>
    <label><input type="text" name="quest" placeholder="Vôtre question" required></label>
    <button type="submit" class="btn btn-outline-secondary btn-sm" name="submit">Soumettre</button><br><br>
</form>

<?php
if (isset($_POST['submit'])){
    $co = connexionBdd();
    if(isset($_POST['titreQuest'], $_POST['quest'])){
        $titreQuest = $_POST['titreQuest'];
        $quest = $_POST['quest'];
        $catId = $_POST['catId'];
        $userId = $_SESSION['user_id'];

        $query = $co->prepare("INSERT into question(QuestTitle, QuestText, QuestCatId, QuestAutorId) VALUES (:titreQuest, :quest, :catId, :autorId)");

        $query->bindParam(':titreQuest', $titreQuest);
        $query->bindParam(':quest', $quest);
        $query->bindParam(':catId', $catId);
        $query->bindParam(':autorId', $userId);

        $query->execute();
    }
}
