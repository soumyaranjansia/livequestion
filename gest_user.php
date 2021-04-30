<?php
include('connexion.php');
$co = connexionBdd();
$reponse = $co->query("SELECT * FROM utilisateurs");

?>
<h2>Users</h2>
<table class="tab">
    <tr>
        <td class="titre">Avatar</td>
        <td class="titre">ID</td>
        <td class="titre">Pseudo</td>
        <td class="titre">Email</td>
        <td class="titre">Genre</td>
        <td class="titre">Date d'inscription</td>
        <td class="titre">Role</td>

    </tr>
    <?php
    while ($result = $reponse->fetch()){
    ?>
    <tr>
        <td><?php echo $result['UserAva'] ?></td>
        <td><?php echo $result['UserId'] ?></td>
        <td><?php echo $result['UserName'] ?></td>
        <td><?php echo $result['UserMail'] ?></td>
        <td><?php if($result['UserGender'] == 'H'){ echo 'Homme';} else { echo 'Femme';}  ?></td>
        <td><?php echo $result['UserInscriDate'] ?></td>
        <td><?php if($result['UserRole'] == 'A'){ echo 'Admin';} else { echo 'Membre';}  ?></td>
    </tr>
    <?php
    }
        ?>
</table>
<table class="modif">
    <tr>
        <td class="titre">User a modifié :</td>
        <td class="titre">Modifier le role</td>
        <td class="titre">Gerer le compte</td>
    </tr>
    <tr>
        <td><form action="admin.php" method="POST"><input type="text" name="UserId" placeholder="ID"></td>
        <td><select class="btn btn-outline-secondary btn-sm" name="option" id="selectRole"><option value="A">Admin</option><option value="M">Membre</option></select><button type="submit" class="btn btn-outline-secondary btn-sm" name="update" value="update">Update</button></td>
        <td><button type="submit" class="btn btn-outline-secondary btn-sm" name="suppr" value="suppr">Supprimer <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 1.5 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg></button></form></td>
    </tr>
</table>
<?php
if (isset($_POST['update'])){
    if ($_POST['option'] == "A"){
        $query = $co->prepare("UPDATE utilisateurs SET UserRole = 'A' WHERE UserId = :UserId ");
        $query->bindParam(':UserId', $_POST['UserId']);
        $query->execute();
        header("Refresh:0");
    } elseif ($_POST['option'] == "M"){
        $query = $co->prepare("UPDATE utilisateurs SET UserRole = 'M' WHERE UserId = :UserId ");
        $query->bindParam(':UserId', $_POST['UserId']);
        $query->execute();
        echo("<meta http-equiv='refresh' content='0.5'>");
    }
}
if (isset($_POST['suppr'])){
    $query = $co->prepare("DELETE FROM utilisateurs WHERE UserId = :UserId ");
    $query->bindParam(':UserId', $_POST['UserId']);
    $query->execute();
    echo("<meta http-equiv='refresh' content='0.5'>");
}
?>



