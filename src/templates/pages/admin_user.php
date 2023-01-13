<?php
ob_start();
$page_title = "Manager user - monsite.com";
include('./../src/db.php');
$requete = $userManager -> take_users();
$role = 200;




show_error();
?>

<h1>Manager user</h1>

<?php if (count($requete) > 0) { ?>
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
      ?>
              <tr>
                  <td><?= $row->id ?></td>
                  <td><?= $row->email ?></td>
                  <td>
                  <form action="/actions/update_admin_user.php" method="post" >
                      <select name="role">
                          <option>-- attribuez un rôle --</option>
                          <option value="10">vérifié</option>
                          <option value="0">banni</option>
                      </select>
                  </td>
                  <td><?= $row->created_at ?></td>
                  <td><?= $row->last_ip ?></td>
                  <td>
                  <?php if ($role >= 200) { ?>
                      <input type="hidden" name="user_id" value="<?= $row->id ?>">
                      <input type="hidden" name="direction" value="admin_user">
                      <button type="submit" class="btn btn-success btn-sm">Valider</button>
                  <?php } else
                    echo "Vous n'avez pas les droits"; ?>
                  </form>
              </td>
              </tr>
          <?php
    } ?>
      
    </tbody>
  </table>
<?php
} else {
  echo "Aucune demande en attente";
}
$page_content = ob_get_clean();