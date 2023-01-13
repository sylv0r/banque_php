<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/footer.css">
        <link rel="stylesheet" href="/css/header.css">
		<title><?= $page_title; ?></title>
		<?= $head_metas ;?>
		<script>
			var e = document.getElementById("ddlViewBy");
			var value = e.value;
			var text = e.options[e.selectedIndex].text;
		</script>
	</head>
	<body>
		<?php 
			require_once __DIR__ . "/partials/header.php"
		?>
        <div class="menu">
            <?php if (count($userManager->getAllUsersExcept())>0) require_once __DIR__ . '/partials/menu.php';
			require_once __DIR__ . "/partials/alert_success.php"?>
        </div>

		<?php
            if (isset($user->role)) $actual_role = $user->role; 
            else $actual_role = 1;

            if ($actual_role >= $role) echo $page_content;
            else echo "Vous n'avez pas les droits";
        ?>
		

			<?php 
			require_once __DIR__ . '/partials/footer.php';
			?>
	</body>
</html>
