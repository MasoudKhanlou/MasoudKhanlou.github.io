<?php
include_once "Controllers/controller.php";

// Caching form values
$email = $_POST['email_login'] ?? "";
$password = $_POST['password_login'] ?? "";

if (isset($_POST['submit'])) {
  // Caching form values
  $userInputs = array(&$email, &$passwordLogin);

  // Check sql injection
  Controller::Instance()->DatabaseDataAccess->checkSqlInjectionForUserInputs($userInputs);
}

// Page Routines
Controller::Instance()->PageManager->excecuteGeneralPageLoadingRoutines(Page::Login, false);
// Error varibels

$email_error = "";
$password_error = "";

//MaxLlength
$userFieldsMaxLengthDto = Controller::Instance()->DatabaseDataAccess->getMaxLegthOfUserFields();

$userFormDto = new UserFormDto;
$userFormDto->Email = $email;
$userFormDto->Password = $password;
$userFormDto->Email_error = $email_error;
$userFormDto->Password_error = $password_error;

// Login 
Controller::Instance()->LoginManager->login($userFormDto);

$email_error = $userFormDto->Email_error;
$password_error = $userFormDto->Password_error;

#Header and Navigation
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
  <title>Lernoo | Login</title>
  <!--Start icon in title -->
  <link rel="icon" href="Static-Icons/Icons/titleIcon60.60.png" />
  <!--End Icon in title -->
</head>

<body id="body">
  <!--coockie -->
  <div class="coockie-main"></div>
  <!--login -->
  <form id="formLogin" class="login-form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="login-container" id="login-background">
      <span id="title-form" style="margin-bottom: 1rem">Anmeldung</span>
      <input class="input-form input-email" type="email" placeholder="Email" title="" autofocus required
        value="<?php echo $email ?>" maxlength="<?php echo $userFieldsMaxLengthDto->EmailAndMaxLength->getValue() ?>"
        oninvalid="invalidEmailMessage(this);" onchange="invalidEmailMessage(this);" name="email_login" />
      <span class="mistake-input-reg">
        <?php echo $email_error; ?>
      </span>
      <input class="input-form input-pass" type="password" placeholder="Passwort" title="" required
        maxlength="<?php echo $userFieldsMaxLengthDto->PasswordAndMaxLength->getValue() ?>"
        oninvalid="invalidPasswordMessage(this);" onchange="invalidPasswordMessage(this);" name="password_login" />
      <span class="mistake-input-reg">
        <?php echo $password_error; ?>
      </span>

      <div class="forget-staySignin">
        <input type="checkbox" style="margin-right: 0.7rem" />
        <span style="margin-right: 3rem">Angemeldet bleiben</span>
        <a href="passwordReset.php">Passwort vergessen?</a>
      </div>
      <button class="login-btn" type="submit" name="submit">Einloggen</button>
      <button id="regis" onclick="location.href='registration.php'" type="button">
        Kein Konto? Jetzt regiesterieren
      </button>
      <span id="fortfahren">Oder fortfahren mit</span>
      <ul class="anmeldung-social">
        <li>
          <a href="https://www.gmail.com">
            <ion-icon class="login-icon-google" name="logo-google"></ion-icon>
          </a>
        </li>
        <li>
          <a href="https://www.facebook.com">
            <ion-icon name="logo-facebook" class="login-icon-facebook"></ion-icon>
          </a>
        </li>
      </ul>
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