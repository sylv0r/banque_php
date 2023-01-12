<ul>
    <li><a href="/?page=home">Home</a></li>
    <li><a href="/?page=contact">contact</a></li>
<?php if ($user === false){ ?>
    <li><a href="/?page=singup">Singup</a></li>
    <li><a href="/?page=login">Login</a></li>
<?php } else { ?>
    <li><?= $user->email ?></li>
    <li><a href="/?page=bank_account">Bank Account</a></li>
    <li><a href="/?page=transfer">Transfer</a></li>
    <li><a href="/actions/logout.php">Logout</a></li>
    <li><a href="/?page=admin_contact">admin_contact</a></li>
    <li><a href="/?page=admin_user">admin_user</a></li>
</ul> <?php } 