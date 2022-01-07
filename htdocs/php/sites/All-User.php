<?php
    $server="localhost";
    $db_username="root";
    $db_password="";
    $db_name="technikum-wsp";

$conn = mysqli_connect($server, $db_username, $db_password, $db_name);

// Get ID from user-table
//$sql = "SELECT ID FROM user WHERE username='" . $_COOKIE['user'] . "'";
//$result = mysqli_query($conn, $sql);
//$id = mysqli_fetch_assoc($result);

// Get info from personal_data-table
$sql = "SELECT ID, username,level FROM user";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["ID"]. " ";
        echo "Username: " . $row["username"]. " ";
        echo "level: " . $row["level"]. " ";
        echo "<br>";
    }
} else {
    echo "0 ";
}
?>

<form class="example" action="action_page.php" method="post">
  <input type="text" placeholder="Geben Sie die ID ein, um persönliche Informationen anzuzeigen.." name="id">
  <button type="submit"><i class="fa fa-search"><a href="http://localhost/php/sites/find-Profil.php">Suche</a></i></button>
</form>

<?php
mysqli_close($conn);
?>
