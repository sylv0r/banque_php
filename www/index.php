<?php

require_once __DIR__ . "/../src/init.php";

$users_number = count($userManager->getAllUsersExcept());

$page = 'home';
if ($users_number > 0) {
	if (isset($_GET['page'])) {
		if (in_array($_GET['page'], $pages)) {
			$page = $_GET['page'];
		}
	}
} else {
	$page = "admin_init";
}	
//oui
include_once __DIR__ . "/../src/templates/pages/$page.php";
include_once __DIR__ . "/../src/templates/template.php";
// include_once __DIR__ . "/../src/templates/partials/head.php";
// echo $page_conten t;
// include_once __DIR__ . "/../src/templates/partials/footer.php";
