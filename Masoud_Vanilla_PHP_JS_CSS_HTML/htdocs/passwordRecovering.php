<?php
include_once "Controllers/controller.php";

// Page Routines
Controller::Instance()->PageManager->excecuteGeneralPageLoadingRoutines(Page::PasswordRecovering, false);

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
  <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script defer src="/JS/main.js"></script>
  <title>Lernoo | PasswordRecovering</title>
  <!--Start icon in title -->
  <link rel="icon" href="Static-Icons/Icons/titleIcon60.60.png" />
  <!--End Icon in title -->
</head>

<body id="body">
  <!--coockie -->
  <div class="coockie-main"></div>
  <!--login -->
  <form id="formRegistration" action="index.php" style="margin-bottom: 3rem; margin-top: 2rem"
    onsubmit="return invalidPasswordsMessage('reg-pass1', 'reg-pass2');">
    <div class="login-container" id="login-background">
      <span id="title-form" style="font-size: 3rem; padding-top: 1rem">Passwort</span>
      <span id="title-form" style="font-size: 3rem; margin-top: 1rem; margin-bottom: 2rem">zurücksetzen</span>
      <input class="input-form input-email" type="email" placeholder="Email" required title=""
        oninvalid="invalidEmailMessage(this);" onchange="invalidEmailMessage(this);" />
      <input id="reg-pass1" class="input-form input-pass" type="password" placeholder="Neues Passwort" required title=""
        oninvalid="invalidPasswordMessage(this);" onchange="invalidPasswordMessage(this);" />
      <input id="reg-pass2" class="input-form" type="password" placeholder="Neues Passwort beschtätigen" required
        title="" oninvalid="invalidPasswordMessage(this);" onchange="invalidPasswordMessage(this);" />
      <button class="login-btn" type="submit" style="margin-top: 4rem; width: 80%; margin-bottom: 3rem">
        Beschtätigen
      </button>
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