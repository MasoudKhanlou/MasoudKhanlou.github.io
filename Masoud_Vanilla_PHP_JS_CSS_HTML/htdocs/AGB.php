<?php
include_once "Controllers/controller.php";

// Page Routines
Controller::Instance()->PageManager->excecuteGeneralPageLoadingRoutines(Page::AGB, false);

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
  <title>Lernoo | AGB</title>
  <!--Start icon in title -->
  <link rel="icon" href="Static-Icons/Icons/titleIcon60.60.png" />
  <!--End Icon in title -->
</head>

<body id="body">
  <?php

  ?>
  <!--coockie -->
  <div class="coockie-main"></div>
  <div class="body-main-datenschutz">
    <div class="title-datenschutz">
      <h1 style="letter-spacing: 0.9rem">AGB</h1>
      <p style="letter-spacing: 0.2rem">
        Allgemeine Geschäftsbedingungen der KEMA
      </p>
    </div>
    <div class="body-datenschutz">
      <p>
        Meta entwickelt Technologien und Dienste, mit deren Hilfe sich
        Menschen miteinander vernetzen, Gemeinschaften bilden und ihre
        Unternehmen stärken können. Diese Nutzungsbedingungen (die
        „Nutzungsbedingungen“) regeln deine Nutzung von KEMA und den anderen
        von uns angebotenen Produkten, Features, Apps, Diensten, Technologien
        sowie von uns angebotener Software (die Meta-Produkte oder Produkte),
        außer, wenn wir ausdrücklich erklären, dass gesonderte
        Nutzungsbedingungen (und nicht diese) gelten. Diese Produkte werden
        dir von Meta Platforms Ireland Limited bereitgestellt.
      </p>
      <p>
        Für die Nutzung von KEMA und der anderen Produkte und Dienste, für die
        diese Nutzungsbedingungen gelten, erheben wir keine Gebühren, sofern
        wir nichts anderes angeben. Stattdessen bezahlen uns Unternehmen,
        Organisationen und andere Personen dafür, dass wir dir Werbeanzeigen
        für ihre Produkte und Dienstleistungen zeigen. Unsere Produkte und
        Dienste ermöglichen es dir, mit deinen Freunden und Gemeinschaften zu
        kommunizieren und personalisierte Inhalte und Werbeanzeigen zu
        erhalten, die nach unserer Ansicht relevant für dich sein und deinen
        Interessen entsprechen könnten. Durch Nutzung unserer Produkte
        erkennst du an, dass wir dir Werbeanzeigen zeigen, die nach unserer
        Ansicht relevant für dich sein und deinen Interessen entsprechen
        könnten. Wir verwenden deine personenbezogenen Daten, um festzulegen,
        welche personalisierten Werbeanzeigen wir dir zeigen.
      </p>
      <p>
        Wir verkaufen deine personenbezogenen Daten an Werbekunden, und wir
        geben Informationen, die dich unmittelbar identifizieren
        (beispielsweise deinen Namen, deine E-Mail-Adresse oder andere
        Kontaktinformationen) nur dann an Werbekunden weiter, wenn du uns dies
        ausdrücklich erlaubst. Dagegen können uns Werbekunden beispielsweise
        mitteilen, welche Zielgruppe ihre Werbeanzeigen sehen soll. Wir zeigen
        diese Anzeigen dann jenen Personen, die möglicherweise an ihnen
        interessiert sind. Wir stellen Werbetreibenden Berichte über die
        Performance ihrer Werbeanzeigen zur Verfügung, damit sie Erkenntnisse
        darüber erlangen, wie Personen mit ihrem Inhalt interagieren. In
        Abschnitt 2 unten erfährst du mehr darüber, wie personalisierte
        Werbung gemäß diesen Nutzungsbedingungen auf den Meta-Produkten
        funktioniert.
      </p>
      <p>
        Unsere Datenschutzrichtlinie erläutert, wie wir deine
        personenbezogenen Daten erheben und verwenden, um einige der dir
        gezeigten Werbeanzeigen festzulegen und alle anderen unten
        beschriebenen Dienste bereitzustellen. Auf deinen Einstellungen-Seiten
        des jeweiligen Meta-Produkts kannst du jederzeit die
        Privatsphäre-Optionen überprüfen, die dir hinsichtlich unserer
        Verwendung deiner Daten zur Verfügung stehen.
      </p>
      <p>
        Über Werbeanzeigen, die dir durch KEMA angezeigt werden Möglicherweise
        wird dir auch Werbung in Apps und auf Websites im KEMA Audience
        Network angezeigt. Wenn Unternehmen auf KEMA Werbung schalten, können
        sie entscheiden, ob ihre Werbeanzeigen über das Audience Network
        vertrieben werden. Das KEMA Audience Network ermöglicht es
        Werbetreibenden, dir relevantere und nützlichere Werbeanzeigen zu
        zeigen. Anhand deiner Aktivitäten in Apps und auf Websites wird
        bestimmt, welche Werbeanzeigen du siehst. Diese sogenannte
        „interessenbasierte Online-Werbung“ ist im Internet üblich.
      </p>
    </div>
  </div>
  <?php
  // Adding Footer
  include_once "footer.php";
  ?>
  <footer class="footer"></footer>
  <!--Link for social media Icons-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>