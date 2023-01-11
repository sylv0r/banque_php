<?php
ob_start();
$page_title = "Admin user - monsite.com";
include('./../src/db.php');

$users = $db->query('SELECT DISTINCT * FROM users WHERE role = 1');
$requete = $users->fetchAll();

$admin = 'admin';
$_admin = 1000;

$manager = 'manager';
$_manager = 200;

$verif = 'vérifié';
$_verif = 10;

$ban = 'banni';
$_ban = 0;


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
      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody><?php
    foreach ($requete as $row) {
        ?><tr>
            <td><?=$row['id']?></td>
            <td><?=$row['email']?></td>
            <td>
                <select>
                    <option>attribuez un rôle</option>
                    <option><?= $verif ;?></option>
                    <option><?= $manager ;?></option>
                    <option><?= $admin ;?></option>
                    <option><?= $ban ;?></option>
                </select>
            </td>
            <td><?=$row['created_at']?></td>
            <td><?=$row['last_ip']?></td>
            <td>
                <button type="button" class="btn btn-success btn-sm"><a href="update.php" style="color: white">Valider</a></button>
                <button type="button" class="btn btn-danger btn-sm"><a href="delete.php" style="color: white">Refuser</a></button>
            </td>
        </tr><?php
    }?>
    
  </tbody>
</table>

<?php
$page_content = ob_get_clean();