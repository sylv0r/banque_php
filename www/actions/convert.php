<?php

require_once __DIR__ . "/../../src/init.php";

$_POST['currency_from'] = htmlspecialchars($_POST['currency_from']);
$_POST['currency_to'] = htmlspecialchars($_POST['currency_to']);
$_POST['amount'] = htmlspecialchars($_POST['amount']);

if (empty($_POST['currency_from']) || empty($_POST['currency_to']) || empty($_POST['amount'])) {
    error_die("Veuillez rentrer une valeur", "/?page=bank_account");
}

if (!is_numeric($_POST['currency_from']) || !is_numeric($_POST['currency_to'])) {
    error_die("ID invalides", "/?page=bank_account");
}

$areFoundsEnough = $bankAccountManager->areFoundsEnough($bankAccount, $_POST['currency_from'], $_POST['amount']);
if ($areFoundsEnough === false) {
    error_die("Fonds insuffisants", "/?page=bank_account");
}

$currency_value_from = $currencyManager->get_currency_value_by_id($_POST['currency_from']);
$currency_value_to = $currencyManager->get_currency_value_by_id($_POST['currency_to']);

$transaction = Transaction::create($_POST['amount'], $_SESSION['user_id'], $_POST['currency_from'], $_POST['currency_to'], "convert", $_SESSION['user_id']);
$transactionManager->insert($transaction, $currency_value_from, $currency_value_to);

$_SESSION['success_message'] = "Conversion faite";

var_dump($_POST);
header('Location: /?page=bank_account');