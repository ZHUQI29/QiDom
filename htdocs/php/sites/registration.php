<div class="container-fluid login-container">
  <form class="qd-bg-light reg-form-con d-lg-flex justify-content-center"name="registration" action="db-registration.php" method="POST">
    <div class="d-flex flex-column align-items-center justify-content-between">
      <fieldset class="mx-3">
        <legend>Login</legend>
        <br>
        <br>
        <label for="username">Username: </label>
        <br>
        <input type="text" id="username" name="username" value="">
        <br>
        <label for="password">Passwort: </label>
        <br>
        <input type="password" id="password1" name="password1" value="" onkeyup="checkPasswordMatch()">
        <br>
        <label for="password2">Wiederholen: </label>
        <br>
        <input type="password" id="password2" name="password2" value="" onkeyup="checkPasswordMatch()">
        <br>
        <span id='pw-message'> </span>


        <?php
        // if admin => select status (level)
        // if not => post fixed hidden status (1 = Guest)
        if (isset($_COOKIE['level']) && $_COOKIE['level'] == '3') {
          include('php/misc/regStatusSelect.php');
        } else {
          echo "<input type='hidden' name='status' value='1'>";
        }
         ?>

      </fieldset>
      <input class="submit-button mt-3 mb-5 mb-lg-auto" type="submit" name="registration" value="REGISTRATION">
    </div>

    <div>
      <fieldset class="mx-3">
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
          <input type="text" id="vorname" name="vorname" value="">
          <br>
          <label for="nachname">Nachname:</label>
          <br>
          <input type="text" id="nachname" name="nachname" value="">
          <br>
          <label for="email">Email-Adresse:</label>
          <br>
          <input type="email" id="email" name="email" value="">
          <br>
          <label for="strasse">Straße:</label>
          <br>
          <input type="text" id="strasse" name="strasse" value="">
          <br>
          <label for="hausnummer">Hausnummer:</label>
          <br>
          <input type="text" id="hausnummer" name="hausnummer" value="">
          <br>
          <label for="plz" id='plz-message' >PLZ:</label>
          <br>
          <input type="text" id="plz" name="plz" value="" onkeyup="checkPlz()">
          <br>
          <label for="ort">Ort:</label>
          <br>
          <input type="text" id="ort" name="ort" value="">
          <br>
          <label for="bday">Geburtstag:</label>
          <br>
          <input type="date" id="bday" name="bday" value="">

      </fieldset>
    </div>


      <!-- <h1>username<input type="text" name="username"></h1>
      <h1>password<input type="password" name="password"></h1>
      <h1>re-enter<input type="password_Re" name="password_Re"></h1> -->


  </form>

  <script type="text/javascript">
  var checkPasswordMatch = function() {
    if (document.getElementById('password1').value ==
      document.getElementById('password2').value) {
      document.getElementById('pw-message').style.color = 'green';
      document.getElementById('pw-message').innerHTML = 'ok';
    } else {
      document.getElementById('pw-message').style.color = 'red';
      document.getElementById('pw-message').innerHTML = 'no match';
    }
  }
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
