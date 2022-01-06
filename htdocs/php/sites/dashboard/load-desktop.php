<?php //include('_BIN/console.php'); ?>
<?php
  if ($_COOKIE['level'] != '3')
  {
    "<script>window.location.href='index.php?site=error';</script>";
  }

  // get data from database, based on $_GET['view']
  function loadData($startColumn, $view) {
    include('php/utils/connect.php');
    if($stmt = $conn->prepare("SELECT * FROM ".$view." ORDER BY timestamp DESC LIMIT " . $startColumn . ",10")) {
      $stmt->execute();
      return $stmt->fetchAll();
    } else { /*echo "error";*/ }
  }

  // Decide on displaying News/Tickets or User-Data
  $result = loadData(0, $view);
  if($view == 'personal_data') {
    prepareDesktopU($result);
  } else {
    prepareDesktopTN($result);
  }

  // Prepare User-Dashboard
  function prepareDesktopU($data)
  {
    $json_a = file_get_contents('php/sites/dashboard/uViewDesktop.json');
    $a = explode("$", $json_a);
    // console_log($a);
    echo $a[1];
    $counter = -1;
    foreach ($data as $key) {
      createRowU($key, $counter, $a);
      $counter *= -1;
    }
    echo $a[11];
  }

  // Make rows out of database- and uViewDesktop-Fragments
  function createRowU($row, $counter, $a) {
    $username = getUserName($row[0]);
    echo $a[2] . $counter;
    echo $a[3] . $row[1] . $a[4] . $row[1] . $a[5];
    echo $a[6] . $username . $a[7];
    echo $a[6] . $row[3] . $a[7];
    echo $a[6] . $row[4] . $a[7];
    echo $a[6] . $row[10] . $a[7];
    echo $a[6] . $row[5] . ' ' . $row[6] . $a[7];
    echo $a[6] . $row[7] . ' ' . $row[8] . $a[7];
    echo $a[8] . $row[9] . $a[9];
  }

  function getUserName($ID) {
    include('php/utils/connect.php');
    $stmt = $conn->prepare("SELECT username FROM user WHERE ID=".$ID);
    $stmt->execute();
    return $stmt->fetchColumn();
  }

  // Prepare TicketsNews-Dashboard
  function prepareDesktopTN($data) {
    $counter = 1;
    $json_a = file_get_contents('php/sites/dashboard/tnViewDesktop.json');
    $a = explode("$", $json_a);
    // console_log($a);
    echo $a[1];
    foreach ($data as $key) {
      if (isset($key[5])) {$key[5] = null;}
      createRowTN($key, $counter, $a);
      $counter++;
    }
    echo $a[13];
  }

  // Make rows out of database- and tnViewDesktop-Fragments
  function createRowTN($row, $counter, $a) {
    $even = ($counter%2==0) ? '1' : '0';
    echo $a[2] . $even . $a[3] . $row[5] . $a[4] . $counter . $a[5] . $row[0] . $a[6] . $row[1] . $a[7];
    if ($row[2] != '') {
      $pics = explode(",", $row[2]);
      foreach ($pics as $key) {
        echo $a[8] . $key . $a[9];
      }
    }
    echo $a[10] . $row[3] . $a[11] . $row[4] . $a[12];
  }

 ?>
