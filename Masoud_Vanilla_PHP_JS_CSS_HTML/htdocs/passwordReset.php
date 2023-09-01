<?php
include_once "Controllers/controller.php";

// Page Routines
Controller::Instance()->PageManager->excecuteGeneralPageLoadingRoutines(Page::PasswordReset, false);

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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!--End Icon query -->
  <link rel="stylesheet" href="/CSS/style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script defer src="/JS/main.js"></script>
  <title>Lernoo | PasswordReset</title>
  <!--Start icon in title -->
  <link rel="icon" href="Static-Icons/Icons/titleIcon60.60.png" />
  <!--End Icon in title -->
</head>

<body id="body">
  <!--coockie -->
  <div class="coockie-main"></div>
  <form id="formLogin" class="login-form" action="passwordRecovering.php" style="margin-top: 2rem">
    <div class="login-container" id="login-background"
      style="padding-top: 2rem; padding-bottom: 5rem; margin-top: 2.3rem">
      <span id="title-form" style="font-size: 3rem">Passwort</span>
      <span id="title-form" style="font-size: 3rem">wiederherstellen</span>
      <input class="input-form input-email" type="email" placeholder="Email" title="" autofocus required
        oninvalid="invalidEmailMessage(this);" onchange="invalidEmailMessage(this);" style="margin-top: 5rem" />
      <button class="login-btn" type="submit">Zurücksetzen</button>
      <span id="title-form" style="font-size: 1.2rem; margin-top: 2rem">Bitte prüfen Sie Ihre Email, um Ihr Passwort
        zurückzusetzen.</span>
      <span id="title-form" style="font-size: 1.2rem"><a href="">Keine Email erhalten?</a></span>
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