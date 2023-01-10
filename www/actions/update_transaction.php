<?php
require_once __DIR__ . "/../../src/init.php";

if (isset($_POST['transaction_id']) && isset($_POST['action'])) {
    $transaction_id = $_POST['transaction_id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $getDepot->approved($_POST['transaction_id']);  
        $_SESSION['success_message'] = 'utilisateur ajouté';
    } else if ($action == 'reject') {
        $getDepot->desapproved($_POST['transaction_id']);
        $_SESSION['success_message'] = 'utilisateur refusé';

    } else {
        // action non valide, générer une erreur ou rediriger l'utilisateur
        error_die('Erreur', '/admin_depot.php');
    }
} else {
    // Il manque des données, générer une erreur ou rediriger l'utilisateur
    error_die('Erreur', '/admin_depot.php');
}


header("Location: /?page=admin_depot");