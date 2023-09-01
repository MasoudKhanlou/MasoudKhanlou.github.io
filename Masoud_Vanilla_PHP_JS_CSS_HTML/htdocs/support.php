<?php
include_once "Controllers/controller.php";

// Page Routines  
Controller::Instance()->PageManager->excecuteGeneralPageLoadingRoutines(Page::Support, false);

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
   <title>Lernoo | Support</title>
  <!--Start icon in title -->
  <link rel="icon" href="Static-Icons/Icons/titleIcon60.60.png" />
  <!--End Icon in title -->
</head>

<body id="body">
   <!--coockie -->
   <div class="coockie-main"></div>
   <!--Home Page -->
   <br />
   <div class="support-container">
      <div class="support-grid-1 grid-1">
         <div>Wie können wir Ihnen helfen?</div>
      </div>
      <div class="support-grid-2">
         <form id="formRegistration" action="index.php">
            <div class="login-container" id="login-background" style="width: 70%; padding:2.5rem; margin-top: 7rem;">
               <span style="font-size: 2rem">Schreiben Sie uns an!</span>
               <div class="gender">
                  <div style="font-size: 1.2rem">Anrede:</div>
                  <input type="radio" title="" name="anrede" checked="true" />Frau
                  <input type="radio" title="" name="anrede" />Herr
               </div>
               <input class="input-form input-vorname" type="text" placeholder="Vorname" title="" required
                  oninvalid="invalidVorNameMessage(this);" onchange="invalidVorNameMessage(this);" />
               <input class="input-form input-nachname" type="text" placeholder="Nachname" title="" required
                  oninvalid="invalidNachNameMessage(this);" onchange="invalidNachNameMessage(this);" />
               <input class="input-form input-email" type="email" placeholder="Email" required title=""
                  oninvalid="invalidEmailMessage(this);" onchange="invalidEmailMessage(this);" />
               <textarea class="input-form support-textarea" placeholder="Ihre Nachricht" name="" id="" cols="30"
                  rows="100" maxlength="250" required autofocus oninvalid="invalidMessage(this);"
                  onchange="invalidMessage(this);"></textarea>
               <div class="regis-datenschutz">
                  <label id="firstCheckBoxLayer"">
                     <input
                        type="checkbox" required title="" style="margin: 0.08rem"
                     oninvalid="invalidCheckBox(this, 'firstCheckBoxLayer');" />
                  </label>
                  <p>
                     Ich akzeptiere die
                     <a href="/datenschutz.php">Datenschutzbestimmungen von KEMA</a>,
                     welche ich gleichermaßen zur Kenntniss genommen habe.
                  </p>
               </div>
               <button class="login-btn" type="submit" style="margin-top: 2rem; width: 80%">
                  Einreichen
               </button>
            </div>
         </form>
      </div>
      <div class="grid grid-3">
         <div class="support-grid-3A">Häufige gestellte Fragen</div>
         <div class="support-grid-3B"><a href="">FAQ</a></div>
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