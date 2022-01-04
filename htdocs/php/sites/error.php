<div class="error">
  <div class="container-lg">

<?php

  $err = isset($_GET["err"]) ?  $_GET["err"] : "default";

  switch ($err) {
    case "e404":
      echo "<h1>404, Page not found!</h1><p>You've entered a invalid site or this site was deprecated.</p>";
      break;

    case "r100":
      echo "<h1>Entered passwords are not matching!</h1><p>You've entered not matching passwords. Please re-enter them.</p>";
      echo "<script>setTimeout(function(){window.location.href='index.php?site=registration';},5000);</script>";
      break;

    case "r101":
      echo "<h1>UserName already taken!</h1><p>Enter a new UserName or Login.</p>";
      break;

    case "l100":
      echo "<h1>Incomplete information!</h1><p>Please re-enter them.</p>";
      echo "<script>setTimeout(function(){window.location.href='index.php?site=login';},5000);</script>";
      break;

    case "l101":
      echo "<h1>Wrong password!</h1><p>Please re-enter password or contact Administration.</p>";
      echo "<script>setTimeout(function(){window.location.href='index.php?site=login';},5000);</script>";
      break;

    case "u100":
      echo "<h1>Upload Error!</h1><p>Please retry later or contact Administration.</p>";
      echo "<script>setTimeout(function(){window.location.href='index.php?site=upload';},5000);</script>";
      break;

    case "u101":
      echo "<h1>Something went wrong!</h1><p>Please retry later or contact Administration.</p>";
      echo "<script>setTimeout(function(){window.location.href='index.php?site=upload';},5000);</script>";
      break;

    case "u102":
      echo "<h1>Upload Successful!</h1><p>Thank you for your entry!.</p>";
      echo "<script>setTimeout(function(){window.location.href='index.php?site=home';},5000);</script>";
      break;

    default:
      echo "<h1>Unexpected Error!</h1><p>Something went wrong. Please try again later or check input.</p>";
      break;
  }
 ?>
 </div>
</div>
