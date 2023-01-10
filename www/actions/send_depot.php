<?php

require_once __DIR__ . "/../../src/init.php";
$depot = $_POST['depot'];
if(isset($_POST)) {
    if(is_numeric($depot)) {
        // La valeur est un nombre, vous pouvez continuer avec le traitement de la transaction
    } else {
        
        error_die('Erreur de depot, la valeur doit etre un nombre.', '/?page=depot');
    }
}

if ($depot<0){
    error_die('Erreur de depot, la valeur doit etre positive.', '/?page=depot');
}
if ($depot>10000000) {
    error_die('Erreur de depot, la valeur doit etre inferieure a 10 000 000.', '/?page=depot');
}



/* Prochaines etapes:
- Sanitize la donnee
- 2. Gerer les erreurs/success sur la page
- 3. Transformer l'enregistrement de message + header + die en une fonction*/


$getDepot->save_depot_form($_POST['depot'],$_SESSION['user_id'], $_POST['idCur']);


$_SESSION['success_message'] = 'Dépot en attente de confirmation!';
header('Location: /?page=depot');
