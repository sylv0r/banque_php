<?php
ob_start();
$page_title = "Manager user - monsite.com";
include('./../src/db.php');

$users = $db->query('SELECT DISTINCT * FROM users WHERE role = 1');
$requete = $users->fetchAll();

$_verif = 'vérifié';
$verif = 10;

$_ban = 'banni';
$ban = 0;

show_error();
?>

<h1>Manager user</h1>

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
                <form action="/actions/update_admin_user.php" method="post" >
                    <select name="role">
                        <option>-- attribuez un rôle --</option>
                        <option value=<?= $verif ?>><?= $_verif ;?></option>
                        <option value=<?= $ban ?>><?= $_ban ;?></option>
                    </select>
            </td>
            <td><?=$row['created_at']?></td>
            <td><?=$row['last_ip']?></td>
            <td>
                    <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                    <button type="submit" class="btn btn-success btn-sm">Valider</button>
                </form>
            </td>
        </tr><?php
    }?>
    
  </tbody>
</table>

<?php
$page_content = ob_get_clean();