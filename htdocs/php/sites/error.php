<div class="error">
  <div class="container-lg">

  <?php

    $err = isset($_GET["err"]) ? $_GET["err"] : "default";
    $nextPage = '';

    switch ($err) {
      case "e404":
        $title = "404, Page not found!";
        $text = "You've entered a invalid site or this site was deprecated.";
        $nextPage = "home";
        break;

      case "c100":
        $title = "Verbindungs-Fehler";
        $text = "Die Verbindung zum Server konnte nicht hergestellt werden";
        $nextPage = "home";
        break;

      case "r100":
        $title = "Entered passwords are not matching!";
        $text = "You've entered not matching passwords. Please re-enter them.";
        $nextPage = "registration";
        break;

      case "r101":
        $title = "UserName already taken!";
        $text = "Enter a new UserName or Login.";
        $nextPage = "home";
        break;

      case "l100":
        $title = "Incomplete Information!";
        $text = "Please re-enter them.";
        $nextPage = "login";
        break;

      case "l101":
        $title = "Wrong Password!";
        $text = "Please re-enter password or contact Administration.";
        $nextPage = "login";
        break;

      case "l102":
        $title = "You were banned!";
        $text = "Sorry, your account was deactivated.";
        $nextPage = "home";
        break;

      case "l103":
        $title = "Login needed";
        $text = "Please login or register yourself, to write tickets";
        $nextPage = 'login';
        break;

      case "u100":
        $title = "Upload Successful!";
        $text = "Thank you for your entry!";
        $nextPage = "home";
        break;

      case "u101":
        $title = "Wrong Image-Format!";
        $text = "Please upload a valid photo.";
        $nextPage = 'upload';
        break;

      case "u102":
        $title = "Upload too big!";
        $text = "Please upload a smaller photo.<br>MaxSize = 10 MB";
        $nextPage = 'upload';
        break;

      case "u103":
        $title = "Upload Error!";
        $text = "Something went wrong. Please try again later or check input.";
        $nextPage = 'upload';
        break;

      default:
        $title = "Unexpected Error!";
        $text = "Something went wrong. Please try again later or check input.";
        $nextPage = "home";
        break;
    }

    // error output
    echo "<h1>" . $title . "</h1><p>" . $text . "</p>";
    if ($nextPage !== '') {
        echo "<script>setTimeout(function(){window.location.href='index.php?site=". $nextPage ."';},5000);</script>";
    }

   ?>

 </div>
</div>
