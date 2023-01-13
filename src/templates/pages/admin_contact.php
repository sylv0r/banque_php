<?php
ob_start();
$page_title = "Admin contact";
$role = 1000;
$forms = $contactFormManager -> take_form();
?>

<div style="text-align: center; margin: 30px">
    <h1>Admin contact</h1>
    <div>
    <?php
    if (count($forms) > 0) {
        foreach ($forms as $cform) { ?>
            <div>
                <span>Nom : <?= $cform->fullname ?></span><br>
                <span>Email : <?= $cform->email ?></span><br>
                <span>Phone : <?= $cform->phone ?></span><br>
                <span>Date : <?= $cform->getCreatedAt() ?> </span><br>
                <span>Message :</span>  <p><?= $cform->message ?></p>

            </div>
        <?php
        }
    } else {
        ?><p style="text-align: center; margin-bottom: 60px">Il n'y a pas de demande de dépôt en attente</p><?php
    }
    ?>
    </div>
</div>    

<?php
$page_content = ob_get_clean();
