<div class="container-fluid login-container">
  <form class="qd-bg-light"name="User-Profil" action="db-profil.php" method="POST">
    <fieldset>
      <legend>Persönliche Daten</legend>
      <label for="anrede">Anrede:</label>
      <br>
      <select name="anrede" id="anrede">
        <option value="---">-----</option>
        <option value="Herr">Herr</option>
        <option value="Frau">Frau</option>
        <option value="Divers">Divers</option>
      </select>
      <br>
      <label for="vorname">Vorname:</label>
      <br>
      <input type="text" id="vorname" name="vorname" value="<?php echo $row["anrede"] ?>">
      <br>
      <label for="nachname">Nachname:</label>
      <br>
      <input type="text" id="nachname" name="nachname" value="<?php ?>">
      <br>
      <label for="email">Email-Adresse:</label>
      <br>
      <input type="email" id="email" name="email" value="<?php ?>">
      <br>
      <label for="strasse">Straße:</label>
      <br>
      <input type="text" id="strasse" name="strasse" value="<?php ?>">
      <br>
      <label for="hausnummer">Hausnummer:</label>
      <br>
      <input type="text" id="hausnummer" name="hausnummer" value="<?php ?>">
      <br>
      <label for="plz" id='plz-message' >PLZ:</label>
      <br>
      <input type="text" id="plz" name="plz" value="<?php ?>" onkeyup="checkPlz()">
      <br>
      <label for="ort">Ort:</label>
      <br>
      <input type="text" id="ort" name="ort" value="<?php ?>">
      <br>
      <label for="bday">Geburtstag:</label>
      <br>
      <input type="date" id="bday" name="bday" value="<?php ?>">
    </fieldset>
      <!-- <h1>username<input type="text" name="username"></h1>
      <h1>password<input type="password" name="password"></h1>
      <h1>re-enter<input type="password_Re" name="password_Re"></h1> -->

      <input class="submit-button" type="submit" name="registration" value="REGISTRATION">
  </form>

  <script type="text/javascript">
  var checkPlz = function() {
    if (document.getElementById('plz').value < 0 || document.getElementById('plz').value > 99999) {
      document.getElementById('plz-message').style.color = 'red';
      document.getElementById('plz-message').innerHTML = ' ungültige PLZ';
    } else {
      document.getElementById('plz-message').style.color = 'white';
      document.getElementById('plz-message').innerHTML = 'PLZ:';
    }
  }
  </script>

</div>
