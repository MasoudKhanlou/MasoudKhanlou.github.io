<?php
include_once "Controllers/controller.php";

// Page Routines
Controller::Instance()->PageManager->excecuteGeneralPageLoadingRoutines(Page::Index, false);

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
  <link rel="stylesheet" href="CSS/style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script defer src="JS/main.js"></script>
  <title>Lernoo | Home</title>
  <!--Start icon in title -->
  <link rel="icon" href="Static-Icons/Icons/titleIcon60.60.png" />
  <!--End Icon in title -->
</head>

<body id="body">
  <!--coockie -->
  <div class="coockie-main"></div>
  <div class="index-header">
    <video controles hight="600px" width="800px" loop autoplay muted>
      <source src="/Pictures/AEIndex1.mp4" type="Video/Mp4">
    </video>
  </div>
  <div class="index-header" style="margin-top: 7rem;">
    <video controls hight="600px" width="800px" loop autoplay muted>
      <source src="/Pictures/AEIndex1.mp4" type="Video/Mp4">
    </video>
  </div>
  <div class="index-header" style="margin-top: 7rem;">
    <video controls hight="600px" width="800px" loop autoplay muted>
      <source src="/Pictures/AEIndex1.mp4" type="Video/Mp4">
    </video>
  </div>
  <div class="index-header" style="margin-top: 7rem;  margin-bottom: 3rem;">
    <video controls hight="600px" width="800px" loop autoplay muted>
      <source src="/Pictures/AEIndex1.mp4" type="Video/Mp4">
    </video>
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