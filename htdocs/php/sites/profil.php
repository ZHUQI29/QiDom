<?php //include('_BIN/console.php'); ?>
<div class="container-fluid login-container">
  <form class="qd-bg-light reg-form-con d-lg-flex justify-content-center"name="change profile" action="db-registration.php?site=user" method="POST" enctype="multipart/form-data">
    <div class="d-flex flex-column align-items-center justify-content-between">
      <fieldset class="mx-3">
        <legend>Change profile</legend>
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
        <input type="text" id="vorname" name="vorname" value="">
        <br>
        <label for="nachname">Nachname:</label>
        <br>
        <input type="text" id="nachname" name="nachname" value="">
        <br>
        <label for="plz">New PLZ: </label>
        <br>
        <input type="text" id="plz" name="plz" value="">
        <br>
        <label for="ort">New Ort: </label>
        <br>
        <input type="text" id="ort" name="ort" value="" >
        <br>
        <label for="strasse">New Straße: </label>
        <br>
        <input type="text" id="strasse" name="strasse" value="" >
        <br>
        <label for="hausnummer">New Hausnummer: </label>
        <br>
        <input type="text" id="hausnummer" name="hausnummer" value="" >
        <br>
        <label for="email">New Email: </label>
        <br>
        <input type="text" id="email" name="email" value="" >
        <br>
        <label for="bday">New Birthdate: </label>
        <br>
        <input class="" type="date" id="bday" name="bday" value="">
        <br>
        <label for="photo">New Photo: </label>
        <br>
        <input type="file" id="photo" name="photo[]" value="" multiple>
        <br>
        <?php
          if($_COOKIE['level'] == '3') { include('php/misc/regStatusSelect.php'); }
         ?>
        <input class="b-button p-2 mt-3 mb-5 mb-lg-auto" type="submit" id="submit" name="submit" value="update">
      </fieldset>


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

// console_log($id);
echo "<input type='hidden' name='ID' value='" . $id . "'>";

// Get info from personal_data-table
$sql = "SELECT anrede, vorname, nachname, plz, ort, strasse, hausnummer, birthday, email FROM personal_data WHERE ID='" . $id . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Anrede: " . $row["anrede"]. "<br>";
        echo "Vorname: " . $row["vorname"]. "<br>";
        echo "Nachname: " . $row["nachname"]. "<br>";
        echo "PLZ: " . $row["plz"]. "<br>";
        echo "Ort: " . $row["ort"]. "<br>";
        echo "Straße: " . $row["strasse"]. "<br>";
        echo "Hausnummer: " . $row["hausnummer"]. "<br>";
        echo "Geburtstag: " . $row["birthday"]. "<br>";
        echo "Email: " . $row["email"]. "<br>";
        // echo "Photo: " . $row["photo_id"]. "<br>";
    }
} else {
    echo "0 ";
}
mysqli_close($conn);
?>