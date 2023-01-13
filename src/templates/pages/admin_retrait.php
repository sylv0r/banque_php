<?php
ob_start();
$page_title = "Admin contact ";
$trans = $getRetrait -> take_retrait();
$role = 200;
?>

<h1 class="h1admindepot">Admin Retrait</h1>

<?php show_error(); ?>
<div>
<table class="table">
    <thead class="thead-dark">
        <tr >
            <th scope="col">id</th>
            <th scope="col">amount</th>
            <th scope="col">created_by</th>
            <th scope="col">created_at</th>
            <th scope="col">currency</th>
            <th scope="col"> Acceptation</th>
        </tr>
    </thead>
   <tbody>
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
            <form action="/actions/update_transaction_retrait.php" method="post">
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
$page_content = ob_get_clean();
?>