<?php
require_once __DIR__ . "/../../src/init.php";

if (isset($_POST['transaction_id']) && isset($_POST['action'])) {
    $transaction_id = $_POST['transaction_id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $getRetrait->approved($_POST['created_by'], $_POST['to_currency'], $_POST['amount'], $_POST['transaction_id']); 
        $_SESSION['success_message'] = 'Retrait ajouté';
    } else if ($action == 'reject') {
        $getRetrait->desapproved($_POST['transaction_id']);
        $_SESSION['success_message'] = 'Retrait refusé';

    } else {
        // action non valide, générer une erreur ou rediriger l'utilisateur
        error_die('Erreur', '/admin_retrait.php');
    }
} else {
    // Il manque des données, générer une erreur ou rediriger l'utilisateur
    error_die('Erreur', '/admin_retrait.php');
}


header("Location: /?page=admin_retrait");