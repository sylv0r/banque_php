<?php
ob_start();
$page_title = "Admin contact - monsite.com";
$trans = $getDepot -> take_my_transaction($_SESSION['user_id']);
$role = 1;
?>

<h1 class="h1admindepot">Mes transaction</h1>

<?php show_error(); ?>
<div>
<table class="tab">
    <thead class="tab">
        <tr class="tab">
        
            <th>montant</th>
            <th>created_by</th>
            <th>created_at</th>
            <th>recipient</th>
            <th>from_currency</th>
            <th>to_currency</th>
            <th>transaction_type</th>
    
        </tr>
    </thead>
   <tbody class="tab">
    <?php
        foreach ($trans as $cform){ 
    ?>
    <tr class="tab">
       
        <td><?= $cform -> amount?></td>
        <td><?= $cform -> email?></td>
        <td><?= $cform -> cre?></td>
        <td><?= $cform -> u1?></td>
        <td><?= $cform -> currency_name?></td>
        <td><?= $cform -> c1?></td>
        <td><?= $cform -> transaction_type?></td>

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