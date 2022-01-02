<?php
    $server="localhost";
    $db_username="root";
    $db_password="";
    $db_name="technikum-wsp";

    try {
      echo "<br>start connection";
      $conn = new PDO ("mysql:host=$server;dbname=$db_name", $db_username, $db_password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo $conn;
      echo "<br>CONNECTED";
    } catch (PDOException $e) {
      echo "<br>Connection failed";
      var_dump( $e );
      echo $e;
    }

?>
