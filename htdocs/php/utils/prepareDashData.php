<?php

  if (isset($_GET['del'])) {
    deleteRow($_GET['del']);
  }

  function deleteRow($del) {
    include('php/utils/connect.php');
    if($stmt = $conn->prepare("DELETE FROM ".$_GET['view']." WHERE ID=".$del)) {
      $stmt->execute();
      $substring = explode('&del=', $_SERVER['REQUEST_URI']);
      $url = $_SERVER['SERVER_NAME'] . $substring[0];
      echo "<script>window.location.href='" . $substring[0] . "';</script>";
    }
  }

 ?>
