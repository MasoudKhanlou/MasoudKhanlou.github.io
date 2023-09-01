<?php
include_once "Controllers/controller.php";

if (isset($_POST['submit'])) {
	Controller::Instance()->PageManager->excecuteGeneralPageExitRoutines();
}

// Page Routines
Controller::Instance()->PageManager->excecuteGeneralPageLoadingRoutines(Page::Logout, true);

// Header and Navigation
include_once "header.php";
?>
<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!--Start Icon query -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<!--End Icon query -->
	<link rel="stylesheet" href="/CSS/style.css" />
	<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script defer src="/JS/main.js"></script>
  <title>Lernoo | Logout</title>
  <!--Start icon in title -->
  <link rel="icon" href="Static-Icons/Icons/titleIcon60.60.png" />
  <!--End Icon in title -->
</head>

<body id="body">
	<!--coockie -->
	<div class="coockie-main"></div>
	<!--logout -->
	<form id="formLogin" class="login-form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<div class="login-container" id="login-background">
			<?php $image = Controller::Instance()->DatabaseDataAccess->getUserImage();
			echo '<img class="logout-pic" style="margin-top: 2rem;" alt="" src="data:image;base64, ' . $image . ' " >'; ?>
			<a href="account.php" style="margin-top: 3rem;">Account</a>
			<button class="login-btn" type="submit" name="submit">Ausloggen</button>
		</div>
	</form>
	<?php
	// Adding Footer
	include_once "footer.php";
	?>
	<!--Link for social media Icons-->
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>