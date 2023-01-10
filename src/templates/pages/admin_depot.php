<?php
ob_start();
$page_title = "Admin contact - monsite.com";
$trans = $getDepot -> take_depot();
?>

<h1 class="h1admindepot">Admin contact</h1>
<?php include_once __DIR__ . '/../partials/alert_success.php'; ?>
<?php show_error(); ?>
<div>
<table class="tab">
    <thead class="tab">
        <tr class="tab">
            <th>id</th>
            <th>amount</th>
            <th>created_by</th>
            <th>created_at</th>
            <th>from_currency</th>
            <th>to_currency</th>
            <th> Acceptation</th>
        </tr>
    </thead>
   <tbody class="tab">
    <?php
        foreach ($trans as $cform){ 
    ?>
    <tr class="tab">
        <td><?= $cform -> id?></td>
        <td><?= $cform -> amount?></td>
        <td><?= $cform -> created_by?></td>
        <td><?= $cform -> created_at?></td>
        <td><?= $cform -> from_currency?></td>
        <td><?= $cform -> to_currency?></td>
        <td>
            <form action="/actions/update_transaction.php" method="post">
                <input type="hidden" name="transaction_id" value="<?= $cform->id ?>">
                <button type="submit" name="action" value="approve">Valider</button>
                <button type="submit" name="action" value="reject">Refuser</button>
            </form> 
        </td>
    </tr>

        <?php
        }
        ?>
   </tbody>
   
</table>
</div>

<hr>


<?php
$page_content = ob_get_clean();
?>