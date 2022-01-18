<div class="error">
  <div class="container-lg">

  <?php

    $err = isset($_GET["err"]) ? $_GET["err"] : "default";
    $nextPage = '';

    switch ($err) {
      case "e404":
        $title = "404, Seite nicht gefunden!";
        $text = "Du hast eine ungültige Addresse eingegeben.";
        $nextPage = "home";
        break;

      case "c100":
        $title = "Verbindungs-Fehler";
        $text = "Die Verbindung zum Server konnte nicht hergestellt werden";
        $nextPage = "home";
        break;

      case "r100":
        $title = "Passwörter stimmen nicht überein!";
        $text = "Bitte versuche es noch einmal.";
        $nextPage = "registration";
        break;

      case "r101":
        $title = "User-Name bereits vergeben!";
        $text = "Bitte gib einen neuen Namen ein.";
        $nextPage = "home";
        break;

      case "l100":
        $title = "Ungenügend Informationen!";
        $text = "Bitte fülle alles vollständig aus.";
        $nextPage = "login";
        break;

      case "l101":
        $title = "Falsches Passwort!";
        $text = "Bitte gib das Passwort nochmal ein, oder kontaktiere die Administration.";
        $nextPage = "login";
        break;

      case "l102":
        $title = "Du wurdest gebannt!";
        $text = "Sorry. Dein Account wurde deaktiviert.";
        $nextPage = "home";
        break;

      case "l103":
        $title = "Login benötigt";
        $text = "Bitte logge dich ein, oder registriere dich, um Tickets zu schreiben";
        $nextPage = 'login';
        break;

      case "u100":
        $title = "Upload Erfolgreich!";
        $text = "Danke für deinen Eintrag!";
        $nextPage = "home";
        break;

      case "u101":
        $title = "Falsches Foto-Format!";
        $text = "Bitte lade ein .jpg oder .png hoch.";
        $nextPage = 'upload';
        break;

      case "u102":
        $title = "Upload zu groß!";
        $text = "Bitte lade ein kleineres Foto hoch.<br>Max-Größe = 10 MB";
        $nextPage = 'upload';
        break;

      case "u103":
        $title = "Upload Fehler!";
        $text = "Etwas ist schief gegangen.<br>Bitte versuche es später wieder, oder kontaktiere die Administration.";
        $nextPage = 'upload';
        break;

      default:
        $title = "Unerwarteter Fehler!";
        $text = "Etwas ist schief gelaufen.<br>Bitte versuche es später wieder, oder kontaktiere die Administration.";
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
<div id="loading-bar">

</div>
<script type="text/javascript">
  var bar = document.getElementById("loading-bar");
  for (var i = 0; i < array.length; i++) {
    array[i]
  }
</script>
