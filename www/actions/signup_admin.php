<?php

require_once __DIR__ . "/../../src/init.php";

if (!isset($_POST['email'],$_POST['password'],$_POST['cpassword'] )){
    error_die('Erreur du fomulaire', '/?page=admin_init');
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL ) === false){
    error_die('Email invalide', '/?page=admin_init');
}

if (strlen($_POST['password'])< 4){
    error_die('Mot de passe trop court', '/?page=admin_init');
}
if ($_POST['password'] !== $_POST['cpassword']){
    error_die('Mot de passe trop incorrect', '/?page=singup');
}
$alreadyUser = $userManager->getByEmail($_POST['email']);
if ($alreadyUser != false){
    error_die('Deja inscrit', '/?page=admin_init');
}

$user = User::create($_POST['email'], $_POST['password'], $_SERVER['REMOTE_ADDR'], 1000);
$user_id = $userManager->insert($user);

$_SESSION['user_id'] = $user_id;

header('Location: /?page=home');