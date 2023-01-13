<ul class="nav nav-tabs mb-4">
    <li class="nav-item"><a href="/?page=home" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="/?page=contact" class="nav-link">contact</a></li>
<?php if ($user === false){ ?>
    <li class="nav-item"><a href="/?page=singup" class="nav-link">Singup</a></li>
    <li class="nav-item"><a href="/?page=login" class="nav-link">Login</a></li>
<?php } else { ?>

    <li class="nav-item"><a href="/?page=depot" class="nav-link">Dépot</a></li>
    <li class="nav-item"><a href="/?page=retrait" class="nav-link">Retrait</a></li>
    

    <li class="nav-item"><a href="/?page=admin_depot" class="nav-link">admin_depot</a></li>
    <li class="nav-item"><a href="/?page=admin_retrait" class="nav-link">admin_retrait</a></li>

    <li class="nav-item"><a href="/?page=bank_account" class="nav-link">Bank Account</a></li>
    <li class="nav-item"><a href="/?page=transfer" class="nav-link">Transfer</a></li>
    <li class="nav-item"><a href="/?page=admin_contact" class="nav-link">admin_contact</a></li>
    <li class="nav-item"><a href="/?page=admin_user" class="nav-link">admin_user</a></li>
    <li class="nav-item"><a href="/?page=transaction" class="nav-link">transaction</a></li>
    <li class="nav-item"><a href="/?page=my_transaction" class="nav-link">mes transaction</a></li>
    <li class="nav-item"><a href="/actions/logout.php" class="nav-link">logout</a></li>
    <?php } ?>
</ul>