<?php
ob_start();
$page_title = "Admin user - monsite.com";
include('./../src/db.php');

$users = $db->query('SELECT DISTINCT * FROM users');
$requete = $users->fetchAll();


?>

<h1>Admin user</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Created_At</th>
      <th scope="col">Last_IP</th>
    </tr>
  </thead>
  <tbody><?php
    foreach ($requete as $row) {
        ?><tr>
            <td><?=$row['id']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['role']?></td>
            <td><?=$row['created_at']?></td>
        </tr><?php
    }?>
    
  </tbody>
</table>

<?php
$page_content = ob_get_clean();