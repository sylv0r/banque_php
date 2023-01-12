<?php
$page_title = "Compte Banquaire - monsite.com";
$role = 10;

ob_start();
show_error();
?>

<h1>Votre compte banquaire :</h1>

<div>
    <?php
    if (!empty($bankAccount)) {
        foreach ($bankAccount as $row) {
            ?><p><?= $row->amount . " " . $row->currency_name ?></p><?php
        }
    } else {
        ?><p>Vous êtes à sec</p><?php
    }
    ?>
    <form style="width: 20%; margin: 20px" action="/actions/convert.php" method="post">
        <label for="amount">Montant de la conversion :</label>
        <input type="number" step="0.01" min=0 name="amount" id="amount" class="form-control" placeholder="Montant" aria-label="Username" aria-describedby="basic-addon1">
        
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

        <button class="btn btn-primary" type="submit">Confirmer la conversion</button>
    </form>
</div>

<?php

$page_content = ob_get_clean();