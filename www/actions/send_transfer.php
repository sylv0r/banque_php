<?php

require_once __DIR__ . "/../../src/init.php";

if (empty($_POST['currency_from']) || empty($_POST['currency_to']) || empty($_POST['amount'])) {
    error_die("Veuillez rentrer une valeur", "/?page=transfer");
}

if (!is_numeric($_POST['currency_from']) || !is_numeric($_POST['currency_to'])) {
    error_die("ID invalides", "/?page=transfer");
}

$areFoundsEnough = $bankAccountManager->areFoundsEnough($bankAccount, $_POST['currency_from'], $_POST['amount']);
if ($areFoundsEnough === false) {
    error_die("Fonds insuffisants", "/?page=transfer");
}

$currency_value_from = $currencyManager->get_currency_value_by_id($_POST['currency_from']);
$currency_value_to = $currencyManager->get_currency_value_by_id($_POST['currency_to']);


$transaction = Transaction::create($_POST['amount'], $_SESSION['user_id'], $_POST['currency_from'], $_POST['currency_to'], "transfer", $_POST['recipient']);
$transactionManager->insert($transaction, $currency_value_from, $currency_value_to);

var_dump($_POST);
header('Location: /?page=transfer');