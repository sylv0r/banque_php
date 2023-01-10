<?php
$page_title = "Login - monsite.com";

ob_start();
show_error();
?>

<?php show_error(); ?>
<h1>Login</h1>

<form action="/actions/login.php" method="post">
    <div>
        <label for="email">Email</label>
        <input type="`text`" id="email" name="email">
    </div>
    <div>
        <label for="password">mot de passe</label>
        <input type="password" id="password" name="password">
    </div>
    <button type="submit">Login</button>

</form>

<?php

$page_content = ob_get_clean();