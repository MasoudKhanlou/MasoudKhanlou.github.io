<?php
include_once "Controllers/controller.php";

// Page Routines
Controller::Instance()->PageManager->excecuteGeneralPageLoadingRoutines(Page::Impressum, false);

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
  <title>Lernoo | Impressum</title>
  <!--Start icon in title -->
  <link rel="icon" href="Static-Icons/Icons/titleIcon60.60.png" />
  <!--End Icon in title -->
</head>

<body id="body">
  <!--coockie -->
  <div class="coockie-main"></div>
  <div class="impressum-main-container">
    <div class="Impressum-header">
      <span>Impressum</span>
    </div>
    <div class="Impressum-title">
      <span class="Impressum-header-title">Firmenname :</span>
      <span class="Impressum-child-title">KEMA GmbH</span>
    </div>
    <div class="Impressum-title">
      <span class="Impressum-header-title">Anschriftt :</span>
      <span class="Impressum-child-title">Diesel Straße 23</span>
      <span class="Impressum-child-title">51103 Köln</span>
      <span class="Impressum-child-title">Deutschland</span>
    </div>
    <div class="Impressum-title">
      <span class="Impressum-header-title">Kontakt :</span>
      <span class="Impressum-child-title">Email : kontakt@kema.com</span>
      <span class="Impressum-child-title">Tel : (0049) 23456</span>
      <span class="Impressum-child-title">Fax : (+49) 345678</span>
    </div>
    <div class="Impressum-title">
      <span class="Impressum-header-title" style="line-height: 1.5">Vertreten durch den <br />
        Geschäftsführer :</span>
      <span class="Impressum-child-title">Khashayar Emami</span>
    </div>
    <div class="Impressum-title">
      <span class="Impressum-header-title">Handelsregister-Nummer :</span>
      <span class="Impressum-child-title">Registration Number 344992</span>
    </div>
    <div class="Impressum-title">
      <span class="Impressum-header-title">Umsatzsteuer Ident.-Nr. :</span>
      <span class="Impressum-child-title" style="margin-bottom: 15rem">456789</span>
    </div>
  </div>
  <?php
  // Adding Footer
  include_once "footer.php";
  ?>
  <!--Link for social media Icons-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>