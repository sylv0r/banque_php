<?php

$page_title = "Dépot";


$currencies = $getDepot -> getCurencyName();



// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();
?>
<h1 class="h1depot">Dépot</h1>

<?php show_error(); ?>

<form action="/actions/send_depot.php" method="post">
<div class="input-group">
  <input type="text" name="depot" id="depot" class="form-control">
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
    <button class="buttondepot" type="submit"> Déposer</button>

</form>

<br><br><br><br><br><br>

<?php
// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable


$page_content = ob_get_clean();
