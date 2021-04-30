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
    </tr>
    <?php
}
?>
