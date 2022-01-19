 <?php
     // include('_BIN/console.php');

     $server="localhost";
     $db_username="root";
     $db_password="";
     $db_name="technikum-wsp";
     $sql = "SELECT * FROM news";


     try {
       // echo "<br>start connection";
       $conn = new PDO ("mysql:host=$server;dbname=$db_name", $db_username, $db_password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo $conn;
       // echo "<br>CONNECTED";
     } catch (PDOException $e) {
       echo "<br>Connection failed";
       echo $e->getMessage();
     }

     if($stmt = $conn->prepare($sql)) {
       $stmt->execute();
       // console_log($stmt->fetchAll());
       console_log($stmt->fetchColumn());
     }



     $conn = new mysqli($server, $db_username, $db_password, $db_name);
     if ($conn->connect_errno) {
       echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
       exit();
     }
     $stmt = $conn->query($sql);
     // console_log($stmt->fetch_all(MYSQLI_ASSOC));
     console_log($stmt->fetch_assoc()['ID']);



 ?>
