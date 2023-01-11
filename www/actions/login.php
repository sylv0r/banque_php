
<?php

require_once __DIR__ . "/../../src/init.php";

if (!isset($_POST['email'],$_POST['password'])){
    error_die('Champs incomplets', '/?page=login');
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL ) === false){
    error_die('Email invalide', '/?page=login');
}

$user = $userManager->getByEmail($_POST['email']);
if ($user === false){
    error_die('Pas de user', '/?page=login');
}

if (!$user -> verifyPassword($_POST['password'])){
    error_die('mdp incorect', '/?page=login');
}

<<<<<<<<< Temporary merge branch 1
$_SESSION['user_id'] = $user->id;
=========
$_SESSION['user_id'] = $user -> id;
>>>>>>>>> Temporary merge branch 2

header('Location: /?page=home');