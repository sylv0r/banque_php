<?php
ob_start();
$page_title = "Admin contact ";
$trans = $getDepot -> take_transaction();
$role = 200;
?>

<h1 class="h1admindepot">Admin transaction</h1>

<?php show_error(); ?>
<div>
<table class="tab">
    <thead class="the">
        <tr >
            <th>id</th>
            <th>amount</th>
            <th>id createur</th>
            <th>email</th>
            <th>created_at</th>
            <th>recipient</th>
            <th>from_currency</th>
            <th>to_currency</th>
            <th>transaction_type</th>
            <th> approved</th>
            <th> approved_date</th>
            <th> approved_by</th>
        </tr>
    </thead>
   <tbody class="tab">
    <?php
        foreach ($trans as $cform){ 
    ?>
    <tr class="tab">
        <td><?= $cform -> idd?></td>
        <td><?= $cform -> amount?></td>
        <td><?= $cform -> created_by?></td>
        <td><?= $cform -> email?></td>
        <td><?= $cform -> cre?></td>
        <td><?= $cform -> u1?></td>
        <td><?= $cform -> currency_name?></td>
        <td><?= $cform -> c1?></td>
        <td><?= $cform -> transaction_type?></td>
        <td><?= $cform -> approved?></td>
        <th><?= $cform -> approved_date?></th>
        <th><?= $cform -> ap?></th>

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