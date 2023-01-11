<?php

require_once __DIR__ . "/../../src/init.php";

if (empty($_POST['currency_from']) || empty($_POST['currency_to']) || empty($_POST['amount'])) {
    error_die("Veuillez rentrer une valeur", "/?page=transfer");
}

if (!is_numeric($_POST['currency_from']) || !is_numeric($_POST['currency_to'])) {
    error_die("ID invalides", "/?page=transfer");
}

$areFoundsEnough = $bankAccountManager->areFoundsEnough($bankAccount, $_POST['currency_from'], $_POST['amount']);
echo "response :" . $areFoundsEnough;

//$transaction = Transaction::create($_POST['email'], $_POST['password'], $_SERVER['REMOTE_ADDR'], 1);
//$user_id = $userManager->insert($user);

var_dump($_POST);