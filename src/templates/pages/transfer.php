<?php
$page_title = "Virement";

ob_start();
show_error();
$users = $userManager->getAllUsersExcept($_SESSION['user_id']);

?>
<h1>Faire un virement :</h1>

<form style="width: 20%; margin: 20px" action="/actions/send_transfer.php" method="post">
    <label for="amount">Montant du virement :</label>
    <input type="number" step="0.01" min="0" name="amount" id="amount" class="form-control" placeholder="Montant" aria-label="Username" aria-describedby="basic-addon1">

    <label for="recipient">A quel utilisateur :</label>
    <select class="custom-select" name="recipient" id="recipient">
        <option selected value="">--- Choose an user ---</option>
        <?php
        
        foreach($users as $_user) {
            ?>
                <option value=<?= $_user->id ?>><?= $_user->email?></option>
            <?php
        }
        ?>
    </select>
    
    <label for="currency_from">Depuis quelle compte :</label>
    <select class="custom-select" name="currency_from" id="currency_from">
        <option selected value="">--- Choose a currency ---</option>
        <?php
        
        foreach($bankAccount as $currency) {
            ?>
                <option value=<?= $currency->currency ?>><?= $currency->amount . " " . $currency->currency_name ?></option>
            <?php
        }
        ?>
    </select>

    <label for="currency_to">Vers quelle devise :</label>
    <select class="custom-select" name="currency_to" id="currency_to">
        <option selected value="">--- Choose a currency ---</option>
        <?php 
        foreach($currencies as $currency) {
            ?>
                <option value=<?= $currency->id ?>><?= $currency->currency_name . " (" . $currency->currency_value . " USD)"?></option>
            <?php
        }
        ?>
    </select>

    <button class="btn btn-primary" type="submit">Confirmer le virement</button>
</form>

<?php

$page_content = ob_get_clean();