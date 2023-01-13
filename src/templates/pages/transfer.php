<?php
$page_title = "Virement - monsite.com";
$role = 10;

ob_start();
show_error();
$users = $userManager->getAllUsersExcept($_SESSION['user_id']);

?>
<h1 style="text-align: center; margin: 30px">Faire un virement :</h1>

<div style="display: flex; align-items: center; flex-direction: column">
    <form style="width: 30%; margin: 20px; display: flex; align-items: center; flex-direction: column" action="/actions/send_transfer.php" method="post">
        <div style="width: 100%; margin-top: 20px">
            <label for="amount">Montant du virement :</label>
            <input type="number" step="0.01" min="0" name="amount" id="amount" class="form-control" placeholder="Montant" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div style="width: 100%; margin-top: 20px">
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
        </div>    
        
        <div style="width: 100%; margin-top: 20px">
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
        </div>

        <div style="width: 100%; margin-top: 20px">
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
        </div>

        <button style="margin: 30px" class="btn btn-primary" type="submit">Confirmer le virement</button>
    </form>
</div>

<?php

$page_content = ob_get_clean();