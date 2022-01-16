<?php include('_BIN/console.php'); ?>
<div class="container-fluid login-container">
  <form class="qd-bg-light reg-form-con d-lg-flex justify-content-center"name="change profile" action="db-change-profile.php" method="POST">
    <div class="d-flex flex-column align-items-center justify-content-between">
      <fieldset class="mx-3">
        <legend>Change profile</legend>
        <br>
        <br>
        <label for="new_plz">New PLZ: </label>
        <br>
        <input type="text" id="new_plz" name="new_plz" value="">
        <br>
        <label for="new_ort">New Ort: </label>
        <br>
        <input type="text" id="new_ort" name="new_ort" value="" >
        <br>
        <label for="new_strasse">New Straße: </label>
        <br>
        <input type="text" id="new_strasse" name="new_strasse" value="" >
        <br>
        <label for="new_hausnummer">New Hausnummer: </label>
        <br>
        <input type="text" id="new_hausnummer" name="new_hausnummer" value="" >
        <br>
        <label for="new_email">New Email: </label>
        <br>
        <input type="text" id="new_email" name="new_email" value="" >
        <br>
        <input class="submit-button mt-3 mb-5 mb-lg-auto" type="submit" id="submit" name="submit" value="Change Info">
      </fieldset>


<?php
    $server="localhost";
    $db_username="root";
    $db_password="";
    $db_name="technikum-wsp";

$conn = mysqli_connect($server, $db_username, $db_password, $db_name);

// Get ID from user-table
$sql = "SELECT ID FROM user WHERE username='" . $_COOKIE['user'] . "'";
$result = mysqli_query($conn, $sql);
$id = mysqli_fetch_assoc($result);

echo "<input type='hidden' name='ID' value='" . $id . "'>";

// Get info from personal_data-table
$sql = "SELECT anrede, vorname, nachname, plz, ort, strasse, hausnummer, birthday, email FROM personal_data WHERE ID='" . $id['ID'] . "'";
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
