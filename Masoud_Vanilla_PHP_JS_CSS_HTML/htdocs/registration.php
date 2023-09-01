<?php
include_once "Controllers/controller.php";

// Saving Form Vlaues
$firstName = $_POST['first_name'] ?? "";
$lastName = $_POST['last_name'] ?? "";
$email = $_POST['Email'] ?? "";
$password = $_POST['password'] ?? "";
$registrationDate = date('y-m-d h:i:s') ?? "";
$passwordRepeat = $_POST['passwordrepeat'] ?? "";
$gender = $_POST['anrede'] ?? "";
$datenschutz = $_POST['checkBoxDatenschutz'] ?? "";
$geschaeftsbedingung = $_POST['checkBoxGeschaeftsbedingung'] ?? "";

if (isset($_POST['submit'])) {
  // Caching form values
  $userInputs = array(&$firstName, &$lastName, &$email, &$passwordLogin, &$passwordRepeat);

  // Check sql injection
  Controller::Instance()->DatabaseDataAccess->checkSqlInjectionForUserInputs($userInputs);
}

Controller::Instance()->PageManager->excecuteGeneralPageLoadingRoutines(Page::Registration, false);

$firstName_error = "";
$lastName_error = "";
$email_error = "";
$password_error = "";
$passwordRepeat_error = "";

// Page Routines

$userFieldsMaxLengthDto = Controller::Instance()->DatabaseDataAccess->getMaxLegthOfUserFields();

$userFormDto = new UserFormDto();
$userFormDto->Gender = $gender;
$userFormDto->FirstName = $firstName;
$userFormDto->LastName = $lastName;
$userFormDto->Email = $email;
$userFormDto->Password = $password;
$userFormDto->PasswordRepeat = $passwordRepeat;
$userFormDto->RegistrationDate = $registrationDate;
$userFormDto->Datenschutz = $datenschutz;
$userFormDto->Geschaeftsbedingung = $geschaeftsbedingung;
$userFormDto->FirstName_error = $firstName_error;
$userFormDto->LastName_error = $lastName_error;
$userFormDto->Email_error = $email_error;
$userFormDto->Password_error = $password_error;
$userFormDto->PasswordRepeat_error = $passwordRepeat_error;

Controller::Instance()->RegistrationManager->register($userFormDto);

$firstName_error = $userFormDto->FirstName_error;
$lastName_error = $userFormDto->LastName_error;
$email_error = $userFormDto->Email_error;
$password_error = $userFormDto->Password_error;
$passwordRepeat_error = $userFormDto->PasswordRepeat_error;

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
  <title>Lernoo | Registrieren</title>
  <!--Start icon in title -->
  <link rel="icon" href="Static-Icons/Icons/titleIcon60.60.png" />
  <!--End Icon in title -->
</head>

<body id="body">
  <!--coockie -->
  <div class="coockie-main"></div>
  <!--login -->
  <form id="formRegistration" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="margin-bottom: 3rem"
    method="post" onsubmit="return invalidPasswordsMessage('reg-pass1', 'reg-pass2');">
    <div class="login-container" id="login-background" style="margin-top: 8rem;">
      <span id="title-form">Registrieren</span>
      <div class="gender">
        <div style="font-size: 1.2rem">Anrede:</div>
        <input type="radio" title="" name="anrede" value="Frau" checked <?php echo $gender==='Frau' ?
          'checked="checked"' : '' ?> />Frau
        <input type="radio" title="" value="Herr" name="anrede" <?php echo $gender==='Herr' ? 'checked="checked"' : ''
          ?> />Herr
      </div>
      <input class="input-form input-vorname" type="text" placeholder="Vorname" title="" required autofocus
        name="first_name" value="<?php echo $firstName ?>"
        maxlength="<?php echo $userFieldsMaxLengthDto->FirstNameAndMaxLength->getValue() ?>"
        oninvalid="invalidVorNameMessage(this);" onchange="invalidVorNameMessage(this);" />
      <span class="mistake-input-reg">
        <?php echo $firstName_error; ?>
      </span>
      <input class="input-form input-nachname" type="text" placeholder="Nachname" name="last_name" title="" required
        value="<?php echo $lastName ?>"
        maxlength="<?php echo $userFieldsMaxLengthDto->LastNameAndMaxLength->getValue() ?>"
        oninvalid="invalidNachNameMessage(this);" onchange="invalidNachNameMessage(this);" />
      <span class="mistake-input-reg">
        <?php echo $lastName_error; ?>
      </span>
      <input class="input-form input-email" type="email" placeholder="Email" name="Email" required title=""
        value="<?php echo $email ?>" maxlength="<?php echo $userFieldsMaxLengthDto->EmailAndMaxLength->getValue() ?>"
        oninvalid="invalidEmailMessage(this);" onchange="invalidEmailMessage(this);" />
      <span class="mistake-input-reg">
        <?php echo $email_error; ?>
      </span>
      <input id="reg-pass1" class="input-form input-pass" type="password" placeholder="Passwort" name="password"
        required title="" value="<?php echo $password ?>"
        maxlength="<?php echo $userFieldsMaxLengthDto->PasswordAndMaxLength->getValue() ?>"
        oninvalid="invalidPasswordMessage(this);" onchange="invalidPasswordMessage(this);" />
      <span class="mistake-input-reg-pass">
        <?php echo $password_error; ?>
      </span>
      <input id="reg-pass2" class="input-form" type="password" placeholder="Passwort wiederholen" name="passwordrepeat"
        required title="" value="<?php echo $passwordRepeat ?>"
        maxlength="<?php echo $userFieldsMaxLengthDto->PasswordAndMaxLength->getValue() ?>"
        oninvalid="invalidPasswordMessage(this);" onchange="invalidPasswordMessage(this);" />
      <span class="mistake-input-reg">
        <?php echo $passwordRepeat_error; ?>
      </span>
      <div class="regis-datenschutz">
        <label id="firstCheckBoxLayer"">
          <input type="checkbox" required title="" style="margin: 0.08rem" name="checkBoxDatenschutz" value="checked"
          oninvalid="invalidCheckBox(this, 'firstCheckBoxLayer');" />
        </label>
        <p>
          Ich akzeptiere die
          <a href="/datenschutz.php">Datenschutzbestimmungen von X</a>,
          welche ich gleichermaßen zur Kenntniss genommen habe.
        </p>
      </div>
      <div class="regis-datenschutz">
        <label id="secondCheckBoxLayer">
          <input type="checkbox" required title="" style="margin: 0.08rem" name="checkBoxGeschaeftsbedingung"
            value="checked" oninvalid="invalidCheckBox(this, 'secondCheckBoxLayer');" />
        </label>
        <p>
          Ich akzeptiere die
          <a href="/AGB.php">
            Allgemeinen Geschäftsbedingungen von X</a>, und beschtätige, dass ich über die Verarbeitung meiner
          personenbezogenen Daten, wie in der
          <a href="/datenschutz.php">Datenschutzerklärung von X</a>
          beschrieben, informiert bin und ihr zustimme.
        </p>
      </div>
      <button class="login-btn" type="submit" style="margin-top: 2rem; width: 80%" name="registerBtn">
        Registrierung beschtätigen
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