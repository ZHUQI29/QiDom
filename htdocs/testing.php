<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include "php/utils/session.php" ?>
<?php include "php/utils/navbar.php" ?>
<?php include "php/utils/BG-Banner.php" ?>
<?php include('_BIN/console.php'); ?>


<?php
  $json_a = file_get_contents('php/sites/dashboard/newsView.json');
  $trimmed = ltrim($json_a, "{\"data\":\"");
  $a = explode("$", $trimmed);
  console_log($a);
?>


</body>

</html>
