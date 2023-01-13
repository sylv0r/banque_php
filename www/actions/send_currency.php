<?php

require_once __DIR__ . "/../../src/init.php";

var_dump($_POST);

if ($user->role >= 1000) {
    $_POST['currency_name'] = trim(htmlspecialchars($_POST['currency_name']));
    $_POST['currency_value'] = strtoupper(trim(htmlspecialchars($_POST['currency_value'])));

    if (empty($_POST['currency_name']) || empty($_POST['currency_value'])) {
        error_die("Champs invalides", "/?page=admin_currency");
    }

    if (strlen($_POST['currency_name']) !== 3) {
        error_die("Veuillez entrer une taille de 3", "/?page=admin_currency");
    }

    $alreadyCurrency = $currencyManager->get_currency_by_name($_POST['currency_name']);
    if ($alreadyCurrency !== false) {
        error_die("Cette devise existe déjà", "/?page=admin_currency");
    }

    $currency = Currency::create($_POST['currency_name'], $_POST['currency_value']);
    $currencyManager->insert($currency);

    header('Location: /?page=admin_currency');
} else {
    error_die("Vous n'avez les droits", "/?page=admin_currency");
}   