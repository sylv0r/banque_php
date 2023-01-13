<?php

var_dump($_POST);

require_once __DIR__ . "/../../src/init.php";

if (($_POST["direction"] === "admin_roles" && $user->role >= 1000) || ($_POST["direction"] === "admin_user" && $user->role >= 200)) {
    if (!isset($_POST['role'])) {
        error_die("Veuillez sélectionner un role", "/?page=" . $_POST["direction"]);
    }

    $userManager->update_role($_POST['user_id'], $_POST['role']);

    header("Location: /?page=" . $_POST["direction"]);
} else {
    error_die("Vous n'avez pas les droits", "/?page=" . $_POST["direction"]);
}