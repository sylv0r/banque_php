<?php
ob_start();
$page_title = "Gestion devises - monsite.com";
include('./../src/db.php');
$users = $userManager -> getAllUsersExcept();
$role = 1000;
show_error();
?>

<h1>Gestion devises</h1>

<?php 
    include_once __DIR__ . '/../partials/admin_menu.php';
?>
<form style="width: 30%; margin: 20px" action="/actions/send_currency.php" method="post">
    <label for="currency_name">Entrer le nom de la monnaire (en 3 lettres majuscules)</label>
    <input required name="currency_name" type="text" maxlength="3" id="currency_name" class="form-control" placeholder="Ex : USD pour dollars" aria-label="Username" aria-describedby="basic-addon1"/>

    <label for="currency_value">Entrer la valeur de la monnaie pour 1 dollars</label>
    <input type="number" required min="0" step="0.000001" name="currency_value" id="currency_value" class="form-control" placeholder="Montant" aria-label="Username" aria-describedby="basic-addon1" />

    <button class="btn btn-primary" type="submit">Créer nouvelle devise</button>
</form>
<?php
$page_content = ob_get_clean();