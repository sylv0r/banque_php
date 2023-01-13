<?php
$page_title = "Admin signup - monsite.com";
$role = 1;

ob_start();
show_error();

$users_number = count($userManager->getAllUsersExcept());

if ($users_number === 0) {
    ?>
<h1>Admin</h1>
<form action="/actions/signup_admin.php" method="post">
    <div>
        <label for="email">Email</label>
        <input type="`text`" id="email" name="email">
    </div>
    <div>
        <label for="password">mot de passe</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <label for="cpassword">confirmez mdp</label>
        <input type="password" id="cpassword" name="cpassword">
    <button type="submit">Singup</button>
    </div>

</form>

<?php
} else {
    echo "Le site à déjà été initialisé";
}
$page_content = ob_get_clean();
