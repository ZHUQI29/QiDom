<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "php/head.php" ?>
  <body>

    <?php
      // session_start()
      // $_GET["site"]
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
                  "faq" => "php/sites/faq.php",
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

     <?php //include "php/sites/home.php" ?>


     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
