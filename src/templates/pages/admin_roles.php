<?php
ob_start();
$page_title = "Gestion rôles - monsite.com";
include('./../src/db.php');
$users = $userManager -> getAllUsersExcept();
$role = 1000;
show_error();
?>

<h1>Admin rôles</h1>

<?php 
    include_once __DIR__ . '/../partials/admin_menu.php';
?>
<?php
$page_content = ob_get_clean();