<?php
    require_once('Student.php');

    $jane = new Student(007, 'Jane Doe', 'jane@madisoncollege.edu');
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