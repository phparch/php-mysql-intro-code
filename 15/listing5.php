<tbody>
<?php
    while($row = mysqli_fetch_assoc($result)):
?>
            <tr>
               <td><?= $row['title'] ?></td>
            </tr>
<?php
    endwhile;
?>