<?php
$co = connexionBdd();
$ReponseCateg = $co->query("SELECT * FROM categorie");

?>

    <table class="tab">
        <tr>
            <td class="titre">ID Categorie</td>
            <td class="titre">Nom de la Categorie</td>
        </tr>
        <?php
        while ($ResultCateg = $ReponseCateg->fetch()){
            ?>
            <tr>
                <td><?php echo $ResultCateg['CatId'] ?></td>
                <td><?php echo $ResultCateg['CatName'] ?></td>
            </tr>
            <?php
        }
        $ReponseCateg->closeCursor();
        ?>
    </table>
    <table>
        <tr>
            <td class="titre">Categorie a ajouter :</td>
        </tr>
        <tr>
            <td><form action="admin.php" method="POST"><input type="text" name="Categ" placeholder="Nom de la categorie"></td>
            <td><button type="submit" class="btn btn-outline-secondary btn-sm" name="AddCateg" value="AddCateg">Ajouter</button></form></td>
        </tr>
    </table>
<?php
if (isset($_POST['AddCateg'])){
        $query = $co->prepare("INSERT into categorie(CatName) VALUES (:Categ)");
        $query->bindParam(':Categ', $_POST['Categ']);
        $query->execute();
    echo("<meta http-equiv='refresh' content='0.5'>");
}
?>

