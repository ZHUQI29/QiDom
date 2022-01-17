<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "php/head.php" ?>
  <body>

     <?php //include('_BIN/console.php'); ?>

     <?php include "php/utils/session.php" ?>
     <?php include "php/utils/navbar.php" ?>
     <?php include "php/utils/BG-Banner.php" ?>

     <?php
      $site = isset($_GET["site"]) ?  $_GET["site"] : "home" ;
      $pages = [ "home" => "php/sites/home.php",
                  "imprint" => "php/sites/imprint.php",
                  "login" => "php/sites/login.php",
                  "registration" => "php/sites/registration.php",
                  "personal_data" => "php/sites/registration.php",
                  "welcome" => "php/sites/welcome.php",
                  "contact" => "php/sites/contact.php",
                  "news" => "php/sites/smallview.php",
                  "tickets" => "php/sites/upload.php",
                  "dashboard" => "php/sites/dashboard.php",
                  "newsview" => "php/sites/bigview.php",
                  "ticketview" => "php/sites/bigview.php",
                  "logout" => "php/sites/logout.php",
                  "users" => "php/sites/All-User.php",
                  "profile" => "php/sites/profil.php",
                  //"faq" => "php/sites/faq.php",  // to do
                  "error" => "php/sites/error.php"];

    ?>
    <?php
          if (isset($pages[$site])) {
              include $pages[$site];
          } else {
              // echo "<script>window.location.href='index.php?site=error&err=e404';</script>";
          }
      ?>


  </body>
</html>
