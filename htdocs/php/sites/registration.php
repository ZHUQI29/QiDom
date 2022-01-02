<div class="container-fluid login-container">
  <form name="registration" action="db-registration.php" method="POST">
    <fieldset>
      <legend>Login</legend>
      <label for="username">Username: </label>
      <br>
      <input type="text" id="username" name="username" value=" ">
      <br>
      <label for="password">Password: </label>
      <br>
      <input type="password" id="password1" name="password1" value=" " onkeyup="checkPasswordMatch()">
      <br>
      <label for="password2">Re-enter: </label>
      <br>
      <input type="password" id="password2" name="password2" value=" " onkeyup="checkPasswordMatch()">
      <br>
      <span id='message'> </span>
    </fieldset>
    <fieldset>
      <legend>Guest-Registration</legend>
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
      <input type="text" id="vorname" name="vorname" value=" ">
      <br>
      <label for="nachname">Nachname:</label>
      <br>
      <input type="text" id="nachname" name="nachname" value=" ">
      <br>
      <label for="email">Email-Adresse:</label>
      <br>
      <input type="email" id="email" name="email" value=" ">
      <br>
      <label for="strasse">Straße:</label>
      <br>
      <input type="text" id="strasse" name="strasse" value=" ">
      <br>
      <label for="hausnummer">Hausnummer:</label>
      <br>
      <input type="text" id="hausnummer" name="hausnummer" value=" ">
      <br>
      <label for="plz">PLZ:</label>
      <br>
      <input type="text" id="plz" name="plz" value=" ">
      <br>
      <label for="ort">Ort:</label>
      <br>
      <input type="text" id="ort" name="ort" value=" ">
      <br>
      <label for="bday">Geburtstag:</label>
      <br>
      <input type="date" id="bday" name="bday" value=" ">
    </fieldset>
      <!-- <h1>username<input type="text" name="username"></h1>
      <h1>password<input type="password" name="password"></h1>
      <h1>re-enter<input type="password_Re" name="password_Re"></h1> -->

      <input class="submit-button" type="submit" name="registration" value="REGISTRATION">
  </form>

  <script type="text/javascript">
  var checkPasswordMatch = function() {
    if (document.getElementById('password1').value ==
      document.getElementById('password2').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'ok';
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'no match';
    }
  }
  </script>

</div>
