<?php

$page_title = "Accueil";

// $niceData = htmlspecialchars("Bonjour je tente une piraterie <script>alert('hacked')</script>");
// $badData = "FAILLE XSS <script>alert('hacked')</script>";

// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();
?>
<h1>Titre de la page d'accueil</h1>
<div>
    <h2>Bienvenu sur notre site de banque en ligne</h2>
    <p>Vous pouvez convertir votre argent dans une autre devise, faire des virements, des retraits et des dépôts.</p>
    <p>Lorsque vous créez votre compte, vous devrez patienter en attendant qu'un manager approuve votre inscription.</p>
    <h3>Bonne journée !</h3>
</div>
<?php
// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
$page_content = ob_get_clean();

// Script de la page home
ob_start();
?>
<script>
</script>
<?php
$page_scripts = ob_get_clean();
