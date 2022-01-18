<?php
    $server="localhost";
    $db_username="root";
    $db_password="";
    $db_name="technikum-wsp";

    $conn = new mysqli($server, $db_username, $db_password, $db_name);

    if ($conn -> connect_errno) {
      echo "<script>window.location.href='index.php?site=error&err=c100';</script>";
    }


?>
