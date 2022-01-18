<?php //include('_BIN/console.php');?>
<div class="container-fluid login-container">
  <form class="qd-bg-light reg-form-con d-lg-flex justify-content-center"name="change profile" action="db-registration.php?site=user" method="POST" enctype="multipart/form-data">
    <div class="d-flex flex-column align-items-center justify-content-between">
      <fieldset class="mx-3">
      <legend>Profil</legend>
      <?php
        $server="localhost";
        $db_username="root";
        $db_password="";
        $db_name="technikum-wsp";

        $conn = mysqli_connect($server, $db_username, $db_password, $db_name);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            // Get ID from user-table
            $sql = "SELECT ID FROM user WHERE username='" . $_COOKIE['user'] . "'";
            $result = mysqli_query($conn, $sql);
            $id = mysqli_fetch_assoc($result)['ID'];
        }

        // sneak in user ID in POST
        echo "<input type='hidden' name='ID' value='" . $id . "'>";

        // Get info from personal_data-table
        $sql = "SELECT anrede, vorname, nachname, plz, ort, strasse, hausnummer, birthday, email FROM personal_data WHERE ID='" . $id . "'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // 输出数据
            $row = mysqli_fetch_assoc($result);
            echo "Anrede: " . $row["anrede"]. "<br>";
            echo "Vorname: " . $row["vorname"]. "<br>";
            echo "Nachname: " . $row["nachname"]. "<br>";
            echo "PLZ: " . $row["plz"]. "<br>";
            echo "Ort: " . $row["ort"]. "<br>";
            echo "Straße: " . $row["strasse"]. "<br>";
            echo "Hausnummer: " . $row["hausnummer"]. "<br>";
            echo "Geburtstag: " . $row["birthday"]. "<br>";
            echo "Email: " . $row["email"]. "<br>";

        } else {
            echo "0 ";
        }
        mysqli_close($conn);
        ?>
        <br><br><br>
        <legend>Daten ändern</legend>
        <br>
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
        <input type="text" id="vorname" name="vorname" value="<?php echo $row['vorname'] ?>">
        <br>
        <label for="nachname">Nachname:</label>
        <br>
        <input type="text" id="nachname" name="nachname" value="<?php echo $row['nachname'] ?>">
        <br>
        <label for="plz">PLZ: </label>
        <br>
        <input type="text" id="plz" name="plz" value="<?php echo $row['plz'] ?>">
        <br>
        <label for="ort">Ort: </label>
        <br>
        <input type="text" id="ort" name="ort" value="<?php echo $row['ort'] ?>" >
        <br>
        <label for="strasse">Straße: </label>
        <br>
        <input type="text" id="strasse" name="strasse" value="<?php echo $row['strasse'] ?>" >
        <br>
        <label for="hausnummer">Hausnummer: </label>
        <br>
        <input type="text" id="hausnummer" name="hausnummer" value="<?php echo $row['hausnummer'] ?>" >
        <br>
        <label for="email">E-Mail: </label>
        <br>
        <input type="text" id="email" name="email" value="<?php echo $row['email'] ?>" >
        <br>
        <label for="bday">Geburtstag: </label>
        <br>
        <input class="" type="date" id="bday" name="bday" value="<?php echo $row['birthday']; ?>">
        <br>
        <label for="photo">Photo: </label>
        <br>
        <input type="file" id="photo" name="photo[]" value="" multiple>
        <br>
        <?php
          if ($_COOKIE['level'] == '3') {
              include('php/misc/regStatusSelect.php');
          }
         ?>
        <input class="b-button p-2 mt-3 mb-5 mb-lg-auto" type="submit" id="submit" name="submit" value="update">
      </fieldset>
