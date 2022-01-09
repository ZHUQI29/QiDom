<?php include('_BIN/console.php'); ?>

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

// Get info from personal_data-table
$sql = "SELECT anrede, vorname, nachname, plz, ort, strasse, hausnummer, birthday, email, photo FROM personal_data WHERE ID='" . $id['ID'] . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        echo "Anrede: " . $row["anrede"]. "<br>";
        echo "Vorname: " . $row["vorname"]. "<br>";
        echo "Nachname: " . $row["nachname"]. "<br>";
        echo "PLZ: " . $row["plz"]. "<br>";
        echo "Ort: " . $row["ort"]. "<br>";
        echo "Straße: " . $row["strasse"]. "<br>";
        echo "Hausnummer: " . $row["hausnummer"]. "<br>";
        echo "Geburtstag: " . $row["birthday"]. "<br>";
        echo "Email: " . $row["email"]. "<br>";
        echo "Photo: " . $row["photo"]. "<br>";
    }
} else {
    echo "0 ";
}

mysqli_close($conn);
?>
