<?php
ob_start();
$page_title = "Admin contact";
$trans = $getDepot -> take_depot();
$role = 200;
?>

<h1 class="h1admindepot">Admin Depot</h1>

<?php show_error(); ?>
<div>
<?php if (count($trans) > 0) { ?>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">amount</th>
            <th scope="col">created_by</th>
            <th scope="col">created_at</th>
            <th scope="col">currency</th>
            <th scope="col">Acceptation</th>
        </tr>
    </thead>
   <tbody >
    <?php
        foreach ($trans as $cform){ 
    ?>
    <tr>
        <td><?= $cform -> idd ?></td>
        <td><?= $cform -> amount?></td>
        <td><?= $cform -> email?></td>
        <td><?= $cform -> created_at?></td>
        <td><?= $cform -> currency_name?></td>
        
        
    
        <td>
            <form action="/actions/update_transaction.php" method="post">
                <input type="hidden" name="transaction_id" value="<?= $cform->idd ?>">
                <input type="hidden" name="created_by" value="<?= $cform -> created_by?>">
                <input type="hidden" name="to_currency" value="<?= $cform -> to_currency?>">
                <input type="hidden" name="amount" value="<?= $cform -> amount?>">
                <button class="btn btn-outline-success" type="submit" name="action" value="approve">Valider</button>
                <button class="btn btn-outline-danger" type="submit" name="action" value="reject">Refuser</button>
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
    } else {
    echo "Il n'y a pas de demande de dépôt en attente";
    }
$page_content = ob_get_clean();
?>