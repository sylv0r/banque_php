<?php
$page_title = "Compte Banquaire - monsite.com";

ob_start();
show_error();
?>

<?php show_error(); ?>
<h1>Votre compte banquaire :</h1>

<div>
    <?php 
    foreach($bankAccount as $row) {
        ?><p><?= $row->amount . " " . $row->currency_name ?></p><?php
    }
    ?>
</div>

<?php

$page_content = ob_get_clean();