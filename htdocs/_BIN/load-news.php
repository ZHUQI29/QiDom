<?php
  if ($_COOKIE['level'] != '3')
  {
    "<script>window.location.href='index.php?site=error';</script>";
  }

  function loadNews($startColumn) {
    include('php/utils/connect.php');
    if($stmt = $conn->prepare("SELECT * FROM news ORDER BY timestamp DESC LIMIT " . $startColumn . ",10")) {
      $stmt->execute();
      return $stmt->fetchAll();
    } else { /*echo "error";*/ }
  }

  $result = loadNews(0);
  prepareDashboardDesktop($result);

  function prepareDashboardDesktop($data) {
    $counter = 1;
    $json_a = file_get_contents('php/sites/dashboard/tnViewDesktop.json');
    $a = explode("$", $json_a);

    echo $a[1];
    foreach ($data as $key) {
      createRow($key, $counter, $a);
      $counter++;
    }
    echo $a[12];
  }

  function createRow($row, $counter, $a) {
    echo $a[2] . $row[5] . $a[3] . $counter . $a[4] . $row[0] . $a[5] . $row[1] . $a[6];
    if ($row[2] != '') {
      $pics = explode(",", $row[2]);
      foreach ($pics as $key) {
        echo $a[7] . $key . $a[8];
      }
    }
    echo $a[9] . $row[3] . $a[10] . $row[4] . $a[11];
  }


 ?>
