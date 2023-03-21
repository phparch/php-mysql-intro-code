<?php
    require_once('Student.php');

    $jane = new Student(1007, 'Jane Doe', 'jane@example.com');
?>
<table>
  <tr>
    <th>Name:</th>
    <td><?= $jane->getName() ?></td>
  </tr>
  <tr>
    <th>ID:</th>
    <td><?= $jane->getId() ?></td>
  </tr>
  <tr>
    <th>Email:</th>
    <td><?= $jane->getEmail() ?></td>
  </tr>
</table>