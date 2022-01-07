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
      // $size = sizeof($result);
    } else { /*echo "error";*/ }
  }

  $result = loadNews(0);
  // console_log($result);
  prepareDashboardDesktop($result);

  function prepareDashboardDesktop($data) {
    $counter = 1;
    $json_a = file_get_contents('php/sites/dashboard/newsView.json');
    $trimmed = ltrim($json_a, "{\"data\":\"");
    $a = explode("$", $trimmed);

    echo $a[0];
    foreach ($data as $key) {
      createRow($key, $counter, $a);
    }
    echo $a[10];
  }

  function createRow($row, $counter, $a) {
    echo $a[1] . $counter++ . $a[2] . $row[0] . $a[3] . $row[1] . $a[4];
    if ($row[2] != '') {
      $pics = explode(",", $row[2]);
      foreach ($pics as $key) {
        echo $a[5] . $key . $a[6];
      }
    }
    echo $a[7] . $row[3] . $a[8] . $row[4] . $a[9];
  }


 ?>
