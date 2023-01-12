<ul>
    <li><a href="/?page=home">Home</a></li>
    <li><a href="/?page=contact">Contact</a></li>
<?php if ($user === false){ ?>
    <li><a href="/?page=singup">Signup</a></li>
    <li><a href="/?page=login">Login</a></li>
<?php } else { ?>
    <li><?= $user->email ?></li>
    <li><a href="/?page=bank_account">Bank Account</a></li>
    <li><a href="/?page=transfer">Transfer</a></li>
    <?php if ($user->role >= 200) { ?>
    <li><a href="/?page=admin_contact">Admin contact</a></li>
    <li><a href="/?page=admin_user">Manage accounts</a></li>
    <?php if ($user->role >= 1000) { ?>
        <li><a href="/?page=admin">Admin panel</a></li>
    <?php }}} ?>
    <li><a href="/actions/logout.php">Logout</a></li>
</ul> 