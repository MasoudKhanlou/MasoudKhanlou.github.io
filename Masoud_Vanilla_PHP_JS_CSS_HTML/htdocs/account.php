<?php
include_once "Controllers/controller.php";

// Image Error
$imageError = "";

// Page Routines
Controller::Instance()->PageManager->excecuteGeneralPageLoadingRoutines(Page::Account, true);

// Retrieve User Date in Account Fields
$userAccount = Controller::Instance()->AccountManager->getUserAccount();

// Updating User Data
if (isset($_POST['submit'])) {
  $userAccount->Birthday = date('Y-m-d 00:00:00', strtotime($_POST['date']));
  $userAccount->City = $_POST['account-city'];
  $userAccount->Country = $_POST['account-country'];
  $userAccount->FirstName = $_POST['account-firstname'];
  $userAccount->Gender = $_POST['account-gender'];
  $userAccount->HouseNumber = $_POST['account-HouseNumber'];
  $userAccount->LastName = $_POST['account-lastname'];
  $userAccount->PhoneNumber = $_POST['account-phone'];
  $userAccount->PLZ = $_POST['account-plz'];
  $userAccount->Street = $_POST['account-street'];

  // Sending data to AccountManager to refining them
  Controller::Instance()->AccountManager->updateUserAccount($userAccount);
}

// Cancel Button

if (array_key_exists('cancel', $_POST)) {
  $userAccount->Birthday;
  $userAccount->City;
  $userAccount->Country;
  $userAccount->FirstName;
  $userAccount->Gender;
  $userAccount->HouseNumber;
  $userAccount->LastName;
  $userAccount->PhoneNumber;
  $userAccount->PLZ;
  $userAccount->Street;
}

// Upload image
$imageError = Controller::Instance()->FileManger->checkAndUploadFile(Page::Account);

// Delete image
if (array_key_exists('delete', $_POST)) {
  Controller::Instance()->DatabaseDataAccess->deleteUserImage();
}

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
  <link rel="stylesheet" href="/CSS/style.css" />
  <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script defer src="/JS/main.js"></script>
  <title>Lernoo | Account</title>
  <!--Start icon in title -->
  <link rel="icon" href="Static-Icons/Icons/titleIcon60.60.png" />
  <!--End Icon in title -->
</head>

<body id="body">
  <!--coockie -->
  <div class="coockie-main"></div>
  <!--logout -->
  <form style="margin-top: 3rem; margin-bottom: 3rem;" id="formLogin" class="login-form" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="login-container" id="login-background">
      <div class="account-welcome">
        <?php $image = Controller::Instance()->DatabaseDataAccess->getUserImage();
        echo '<img class="logout-pic" alt="" id="profile-pic" src="data:image;base64, ' . $image . ' " >'; ?>
        <div class="account-welcome-inside">
          <span>Willkommen</span>
          <span>
            <?php echo $userAccount->Gender ?>
            <?php echo $userAccount->FirstName ?>
          </span>
        </div>
        <div class="user-image-error">
          <?php echo $imageError; ?>
        </div>
      </div>
      <input type="file" id="account-input-file" name="user-img" accept=".jpg, .jpeg, .png">
      <div class="delete-container"><button class="account-upload-img-btn"><label for="account-input-file" style="cursor: pointer; width: 90%;">Bild Bearbeiten</label></button></div>
      <div class="delete-container"><button type="submit" class="account-delete-img-btn" name="delete">Bild Entfernen</button></div>
      <span class="account-title">Persönliche Daten</span>
      <div class="account-name-info">
        <select class="account-inputs account-select" name="account-gender">
          <?php $selectgender = "";
          ($userAccount->Gender == 'Herr') ? $selectgender = 'Frau' : $selectgender = 'Herr'; ?>
          <option>
            <?php echo $userAccount->Gender ?>
          </option>
          <option>
            <?php echo $selectgender ?>
          </option>
        </select>
        <input class="account-inputs input-calendar" id="custom-date" type="text" name="date" placeholder="Geburtsdatum" onfocus="(this.type='date')" onclick="accountCalendarReset(this);" onkeydown="accountCalendar(this);" value="<?php $onlyDate = substr($userAccount->Birthday, 0, 10);
                                                                                                                                                                                                                                      echo $onlyDate; ?>">
      </div>
      <div class="account-inputs-title-container">
        <div class="account-inputs-title" style="padding-left: 0.5rem;">Geschlecht</div>
        <div class="account-inputs-title" style="margin-right:0.8rem ;">Geburtsdatum</div>
      </div>
      <div class="account-name-info">
        <input class="account-inputs" type="text" placeholder="Vorname" name="account-firstname" value="<?php echo $userAccount->FirstName ?>">
        <input class="account-inputs" type="text" placeholder="Nachname" name="account-lastname" value="<?php echo $userAccount->LastName ?>">
      </div>
      <div class="account-inputs-title-container">
        <div class="account-inputs-title" style="padding-left: 0.5rem;">Vorname</div>
        <div class="account-inputs-title" style="margin-right:0.8rem ;">Nachname</div>
      </div>
      <span class="account-title">Anschrift</span>
      <div class="account-name-info">
        <input class="account-inputs" type="text" placeholder="Land" name="account-country" value="<?php echo $userAccount->Country ?>">
        <input class="account-inputs" type="text" placeholder="Stadt" name="account-city" value="<?php echo $userAccount->City ?>">
      </div>
      <div class="account-inputs-title-container">
        <div class="account-inputs-title" style="padding-left: 0.5rem;">Land</div>
        <div class="account-inputs-title" style="margin-right:0.8rem ;">Stadt</div>
      </div>
      <div class="account-adress-info">
        <div class="account-adress-info-left-side">
          <input class="account-inputs-left" type="text" name="account-street" placeholder="Straße" value="<?php echo $userAccount->Street ?>">
        </div>
        <div class="account-adress-info-right-side">
          <input class=" account-inputs-right" type="text" name="account-HouseNumber" placeholder="Haus-Nr." value="<?php echo $userAccount->HouseNumber ?>">
          <input class="account-inputs-right" type="text" name="account-plz" placeholder="Postleitzahl" value="<?php echo $userAccount->PLZ ?>">
        </div>
      </div>
      <div class="account-adress-info" style="font-size: 1rem;">
        <div class="account-adress-info-left-side">
          <div style="padding-left: 0.5rem;">Straße</div>
        </div>
        <div class="account-adress-info-right-side">
          <div class="account-inputs-title" style="margin-right:1.2rem ;">Hausnummer</div>
          <div class="account-inputs-title" style="margin-right:1.2rem ;">Postleitzahl</div>
        </div>
      </div>
      <span class="account-title">Kontaktdaten</span>
      <div class="account-name-info">
        <input class="account-inputs" type="text" placeholder="Email" style="pointer-events: none; background-color: lightgrey;" readonly value="<?php echo $userAccount->Email ?>">
        <input class="account-inputs" type="text" placeholder="Telefon" name="account-phone" value="<?php echo $userAccount->PhoneNumber ?>">
      </div>
      <div class="account-inputs-title-container">
        <div class="account-inputs-title" style="padding-left: 0.5rem;">Email</div>
        <div class="account-inputs-title" style="margin-right:0.8rem ;">Telefon</div>
      </div>

      <div class="account-name-info">
        <button class="login-btn" type="submit" name="submit">Speichern</button>
        <button class="account-btn-cancel" type="submit" name="cancel">Abbrechen</button>
      </div>
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