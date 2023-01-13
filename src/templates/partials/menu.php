<ul class="nav nav-tabs mb-4">
    <li class="nav-item"><a href="/?page=home" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="/?page=contact" class="nav-link">Contact</a></li>
<?php if ($user === false){ ?>
    <li class="nav-item"><a href="/?page=singup" class="nav-link">Signup</a></li>
    <li class="nav-item"><a href="/?page=login" class="nav-link">Login</a></li>
<?php } else { ?>
    <li><?= $user->email ?></li>
    <li><a href="/?page=bank_account" class="nav-link">Bank Account</a></li>
    <li><a href="/?page=transfer" class="nav-link">Transfer</a></li>
    <?php if ($user->role >= 200) { ?>
    <li><a href="/?page=admin_contact" class="nav-link">Admin contact</a></li>
    <li><a href="/?page=admin_user" class="nav-link">Manage accounts</a></li>
    <?php if ($user->role >= 1000) { ?>
        <li><a href="/?page=admin" class="nav-link">Admin panel</a></li>
    <?php }}} ?>
    <li><a href="/actions/logout.php" class="nav-link">Logout</a></li>
</ul> 