<?php
include_once "Controllers/controller.php";

// Page Routines
Controller::Instance()->PageManager->excecuteGeneralPageLoadingRoutines(Page::AboutUs, false);

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
   <title>Lernoo | Aboutus</title>
  <!--Start icon in title -->
  <link rel="icon" href="Static-Icons/Icons/titleIcon60.60.png" />
  <!--End Icon in title -->
</head>

<body id="body">
   <!--coockie -->
   <div class="coockie-main"></div>
   <div class="aboutus-container">
      <div class="aboutus-header"></div>
      <div class="aboutus-body">
         <p class="aboutus-title">
            What is an 'About Us' page?
         </p>
         <p>
            An 'About Us' page is a spot for your founding story, a place to show off your business wins, and a sales
            page that answers the most pressing question new customers have about your business.
            What an 'About Us' page should be is a goal-oriented sales page, one that focuses on highlighting the
            biggest selling points of your story and brand at the top of the page, making a strong first impression on
            curious customers
            In Shopify’s customer trust research, we found that shoppers navigate to an About Us page to learn more
            about the brand and the people behind the products. Your 'About Page' should address those two curiosities
            shoppers have to help with decision making.
            Shoppers are also interested in a company’s mission. They’ll use the About Us page to determine if they
            share core values with the business and to decide if they want to shop with the business or not.
            In contrast to a landing page, your About Us page is the ideal place to accommodate a number of objectives
         </p>
         <p><a
               href="https://www.shopify.com/blog/how-to-write-an-about-us-page">https://www.shopify.com/blog/how-to-write-an-about-us-page</a>
         </p>
         <p style="margin-bottom: 10rem;">
            An 'About Us' page is a spot for your founding story, a place to show off your business wins, and a sales
            page that answers the most pressing question new customers have about your business.
            What an 'About Us' page should be is a goal-oriented sales page, one that focuses on highlighting the
            biggest selling points of your story and brand at the top of the page, making a strong first impression on
            curious customers
            In Shopify’s customer trust research, we found that shoppers navigate to an About Us page to learn more
            about the brand and the people behind the products. Your 'About Page' should address those two curiosities
            shoppers have to help with decision making.
            Shoppers are also interested in a company’s mission. They’ll use the About Us page to determine if they
            share core values with the business and to decide if they want to shop with the business or not.
            In contrast to a landing page, your About Us page is the ideal place to accommodate a number of objectives
         </p>
      </div>
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