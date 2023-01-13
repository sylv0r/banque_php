<?php

require_once __DIR__ . "/../../src/init.php";
$retrait = $_POST['amount'];



if(isset($_POST)) {
    if(is_numeric($retrait)) {
        // La valeur est un nombre, vous pouvez continuer avec le traitement de la transaction
    } else {
        error_die('Erreur de retrait, la valeur doit etre un nombre.', '/?page=retrait');
    }
}

$areFoundsEnough = $bankAccountManager->areFoundsEnough($bankAccount, $_POST['idCur'], $_POST['amount']);
if ($areFoundsEnough === false) {
    error_die("Fonds insuffisants", "/?page=retrait");
}


if ($retrait<0){
    error_die('Erreur de retrait, la valeur doit etre positive.', '/?page=retrait');
}



/* Prochaines etapes:
- Sanitize la donnee
- 2. Gerer les erreurs/success sur la page
- 3. Transformer l'enregistrement de message + header + die en une fonction*/


$getRetrait->save_retrait_form($_POST['amount'],$_SESSION['user_id'], $_POST['idCur']);


$_SESSION['success_message'] = 'Dépot en attente de confirmation!';
header('Location: /?page=retrait');
