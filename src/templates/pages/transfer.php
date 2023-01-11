<?php
$page_title = "Virement - monsite.com";

ob_start();
show_error();

?>
<h1>Faire un virement :</h1>

<form style="width: 20%; margin: 20px" action="/actions/send_transfer.php" method="post">
    <label for="amount">Montant du virement :</label>
    <input type="number" name="amount" id="amount" class="form-control" placeholder="Montant" aria-label="Username" aria-describedby="basic-addon1">

    <label for="currency_from">Depuis quelle compte :</label>
    <select class="custom-select" name="currency_from" id="currency_from">
        <option selected value="">--- Chosse a currency ---</option>
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
        <option selected value="">--- Chosse a currency ---</option>
        <?php 
        foreach($currencies as $currency) {
            ?>
                <option value=<?= $currency->id ?>><?= "1.00 " . $currency->currency_name . " = " . $currency->currency_value . " USD"?></option>
            <?php
        }
        ?>
    </select>

    <button class="btn btn-primary" type="submit">Button</button>
</form>

<?php

$page_content = ob_get_clean();