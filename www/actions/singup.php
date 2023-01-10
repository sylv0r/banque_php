<?php

require_once __DIR__ . "/../../src/init.php";

if (!isset($_POST['email'],$_POST['password'],$_POST['cpassword'] )){
    error_die('Erreur du fomulaire', '/?page=singup');
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL ) === false){
    error_die('Email invalide', '/?page=singup');
}

if (strlen($_POST['password'])< 4){
    error_die('mot de passe trop court', '/?page=singup');
}
if ($_POST['password'] !== $_POST['cpassword']){
    error_die('mot de passe trop court', '/?page=singup');
}
$alreadyUser = $userManager->getByEmail($_POST['email']);
if ($alreadyUser != false){
    error_die('Deja inscrit', '/?page=singup');
}

$user = User::create($_POST['email'], $_POST['password'], 1, $_SERVER['REMOTE_ADDR']);
$user_id = $userManager->insert($user);

$_SESSION['user_id'] = $user_id;

header('Location: /?page=home');