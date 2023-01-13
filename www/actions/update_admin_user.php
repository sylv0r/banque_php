<?php

var_dump($_POST);

require_once __DIR__ . "/../../src/init.php";

if (!isset($_POST['role'])) {
    error_die("Veuillez sélectionner un role", "/?page=admin_user");
}

$userManager->update_role($_POST['user_id'], $_POST['role']);

header("Location: /?page=".$_POST["direction"]);
