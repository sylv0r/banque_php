<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';

// fonctions utilitaires
require_once __DIR__ . '/utils/errors.php';

// pages existantes sur notre site internet
$pages = ['home', 'contact','singup','login', 'admin_contact', "bank_account", "transfer", "admin_init", 'admin_user'];

// init variables vides pour le template
$page_content = "";
$page_scripts = "";
$head_metas = "";
$role = 1;
$role = 1;
//
require_once __DIR__ . '/class/ContactForm.php';

require_once __DIR__ . '/class/User.php';

require_once __DIR__ . '/class/BankAccount.php';

require_once __DIR__ . '/class/Currency.php';

require_once __DIR__ . '/class/Transaction.php';

//inclure les managers
require_once __DIR__ . '/class/ContactFormManager.php';

require_once __DIR__ . '/class/UserManager.php';

require_once __DIR__ . '/class/BankAccountManager.php';

require_once __DIR__ . '/class/CurrencyManager.php';

require_once __DIR__ . '/class/TransactionManager.php';


//init les managers
$contactFormManager = new ContactFormManager($db);
$userManager = new UserManager($db);
$bankAccountManager = new BankAccountManager($db);
$currencyManager = new CurrencyManager($db);
$transactionManager = new TransactionManager($db);


//session & auth
$user = false;
if (isset($_SESSION['user_id'])){
    $user = $userManager->getById($_SESSION['user_id']);
    $bankAccount = $bankAccountManager->getAccountById($_SESSION['user_id']);
    $currencies = $currencyManager->get_currencies();
}