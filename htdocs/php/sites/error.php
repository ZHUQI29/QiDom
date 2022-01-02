<?php
  $err = isset($_GET["err"]) ?  $_GET["err"] : "default";

  switch ($err) {
    case "e404":
      echo "<h1>404, Page not found!</h1><p>You've entered a invalid site or this site was deprecated.</p>";
      break;

    case "r100":
      echo "<h1>Entered passwords are not matching!</h1><p>You've entered not matching passwords. Please re-enter them.</p>";
      echo "<script>setTimeout(function(){window.location.href='index.php?site=registration';},3000);</script>";
      break;

    case "r101":
      echo "<h1>UserName already taken!</h1><p>Enter a new UserName or Login.</p>";
      break;

    default:
      echo "<h1>Unexpected Error!</h1><p>Something went wrong. Please try again later or check input.</p>";
      break;
  }
 ?>
