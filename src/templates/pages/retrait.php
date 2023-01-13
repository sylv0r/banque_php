<?php

$page_title = "Dépot ";


$totalcompte = $getRetrait -> getAmount($_SESSION['user_id']);
$currencies = $getDepot -> getCurencyName();



// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();
?>
<h1 class="h1depot">Retrait</h1>

<?php show_error(); ?>

<h2>Vous avez sur votre compte :</h2>
<?php
foreach($bankAccount as $currency) {
                ?>
                    <option value=<?= $currency->currency ?>><?= $currency->amount . " " . $currency->currency_name ?></option>
                <?php
            }
            ?>
<form action="/actions/send_retrait.php" method="post">
<div class="input-group">
  <input type="text" name="amount" id="depot" class="form-control">
  <div class="input-group-append">
  
  <label class="input-group-text" for="currency">Devise:</label>
  <select id="idCur" name="idCur">

    <?php
      foreach ($currencies as $gcurrencies){ ?>
    <div>
        <option  value=<?= $gcurrencies -> id ?>><?= $gcurrencies -> currency_name ?></option>
    </div>


    <?php
    }
    ?>
 


    <br>
  </select>
  </div>
</div>
    <button class="buttondepot" type="submit"> Retirer</button>

</form>

<br><br><br><br><br><br>

<?php
// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable


$page_content = ob_get_clean();
