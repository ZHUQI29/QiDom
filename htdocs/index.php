<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "php/head.php" ?>
  <body>

    <?php
    if(!isset($_SESSION["user"])) {   // if not logged in, in this session,
      session_start();
      $_SESSION["user"] = "anonymous";
      if (!isset($_COOKIE["level"])) {
        setcookie("level", 0, time()+86400); // expires in 24h
      }
    }

     ?>

     <?php include "php/utils/navbar.php" ?>
     <?php include "php/utils/BG-Banner.php" ?>

     <?php
      $site = isset($_GET["site"]) ?  $_GET["site"] : "home" ;
      $pages = [ "home" => "php/sites/home.php",
                  "imprint" => "php/sites/imprint.php",
                  "login" => "php/sites/login.php",
                  "registration" => "php/sites/registration.php",
                  "welcome" => "php/sites/welcome.php",
                  "contact" => "php/sites/contact.php",
                  "faq" => "php/sites/faq.php",  // to do
                  "error" => "php/sites/error.php"];

    ?>
    <?php
          if (isset($pages[$site])) {
              include $pages[$site];
          } else {
              // echo "404 site not found";
              echo "<script>window.location.href='index.php?site=error&err=e404';</script>";
          }
      ?>





  </body>
</html>
