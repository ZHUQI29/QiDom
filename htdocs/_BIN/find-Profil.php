<?php
$server="localhost";
$db_username="root";
$db_password="";
$db_name="technikum-wsp";
?>
<form class="example" action="action_page.php" method="post">
  <input type="text" placeholder="Geben Sie die ID ein, um persönliche Informationen anzuzeigen.." name="id">
  <button type="submit"><i class="fa fa-search"><a href="http://localhost/php/sites/find-Profil.php">Suche</a></i></button>
</form>
<?
$conn = mysqli_connect($server, $db_username, $db_password, $db_name);

$pid = $_POST["id"];
$sql ="SELECT anrede, vorname, nachname, plz, ort, strasse, hausnummer, birthday, email, photo FROM personal_data WHERE ID='" . $pid . "'";
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
