
<?php
$error = "";
echo $error; ?>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="avatar" required >
            <button type="submit" value="Envoyer le fichier" class="btn btn-outline-secondary btn-sm">Envoyer le fichier</button>
        </form>
<?php
if (isset($_FILES['avatar']) AND $_FILES['avatar']['error'] == 0)
        {
            if ($_FILES['avatar']['size'] <= 1000000)
        {

            $infosfichier = pathinfo($_FILES['avatar']['name']);
            $_FILES['avatar']['name'] = $_SESSION['user_id'].".".$infosfichier['extension'];
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'svg');
            if (in_array($extension_upload,
            $extensions_autorisees))
                {

                    for ($i = 0; $i < count($extensions_autorisees); ++$i){
                        try{
                            @unlink("images/avatar/".$_SESSION['user_id'].".".$extensions_autorisees[$i]);
                        }
                        catch(Throwable $e){
                            null;
                        }
                    }
                    move_uploaded_file($_FILES['avatar']['tmp_name'], 'images/avatar/' .basename($_FILES['avatar']['name']));
                    echo "L'envoi a bien été effectué !";
                    $co = connexionBdd();
                    $ava = '<img class="avatar" src="images/avatar/'.$_FILES["avatar"]["name"].'" alt="avatar">';
                    $query = $co->prepare("UPDATE utilisateurs SET UserAva = :avatar WHERE  UserId = :id ");
                    $query->bindParam(":avatar", $ava);
                    $query->bindParam(":id", $_SESSION['user_id']);
                    $query->execute();
                    $_SESSION['avatar'] = $ava;
                    header('location: user.php');
                }else{
                    $error = "le fichier n'est pas une image";
                }
        }
    }
?>