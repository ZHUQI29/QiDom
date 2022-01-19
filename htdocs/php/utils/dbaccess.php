<?php
    $server="localhost";
    $db_username="root";
    $db_password="";
    $db_name="technikum-wsp";

    try {
      $conn = new mysqli($server, $db_username, $db_password, $db_name);
      // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      echo $e;
    }
    if ($conn -> connect_errno) {
      echo "<script>window.location.href='index.php?site=error&err=c100';</script>";
    }

?>
