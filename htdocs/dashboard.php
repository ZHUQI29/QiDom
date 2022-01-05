<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include "php/head.php" ?>

<body>
<?php include "php/utils/session.php" ?>
<?php include "php/utils/navbar.php" ?>
<?php include "php/utils/BG-Banner.php" ?>

<?php //include('_BIN/console.php'); ?>


<?php
  $view = isset($_GET['view']) ? $_GET['view'] : 'error';
  switch ($view) {

    case 'news':
      include('load-news.php');
      break;

    case 'tickets':
      // code...
      break;

    case 'users':
      // code...
      break;

    case 'error':
      // code...
      break;

    default:
      // code...
      break;
  }
?>


</body>

</html>
