<?php include('_BIN/console.php'); ?>
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
  function prepareDesktopU($data) {
    $json_a = file_get_contents('php/sites/dashboard/viewDesktop.json');
    $a = json_decode($json_a, true);
    echo $a['uViewStart'];
    $counter = -1;
    foreach ($data as $key) {
      createRowU($key, $counter, $a);
      $counter *= -1;
    }
    echo $a['end'];
  }

  // Make rows out of database- and uViewDesktop-Fragments
  function createRowU($data, $counter, $a) {
    $username = getUserName($data[0]);
    echo $a['row1'] . $counter;
    echo $a['row2'] . $data[1] . $a['row3'] . $data[1] . $a['row4'];
    echo $a['userTD1'] . $username . $a['userTD2'];
    echo $a['userTD1'] . $data[3] . $a['userTD2'];
    echo $a['userTD1'] . $data[4] . $a['userTD2'];
    echo $a['userTD1'] . $data[10]. $a['userTD2'];
    echo $a['userTD1'] . $data[5] . ' ' . $data[6] . $a['userTD2'];
    echo $a['userTD1'] . $data[7] . ' ' . $data[8] . $a['userTD2'];
    echo $a['date1'] . $data[9]. $a['date2'];
    echo $a['userOptions'];
  }

  // Prepare TicketsNews-Dashboard
  function prepareDesktopTN($data) {
    $json_a = file_get_contents('php/sites/dashboard/viewDesktop.json');
    $a = json_decode($json_a, true);
    echo $a['tnViewStart'];
    $counter = 1;
    foreach ($data as $key) {
      if (isset($key[5])) {$key[5] = null;}
      createRowTN($key, $counter, $a);
      $counter++;
    }
    echo $a['end'];
  }

  // Make rows out of database- and tnViewDesktop-Fragments
  function createRowTN($data, $counter, $a) {
    $even = ($counter%2==0) ? '1' : '0';

    echo $a['row1'] . $counter;
    echo $a['row2'] . $data[1] . $a['row3'] . $data[1] . $a['row4'];
    echo $a['titel1'] . $data[3] . $a['titel2'];
    echo $a['text1'] . $data[3] . $a['text2'];
    echo $a['photos1'];
    if ($data[2] != '') {
      $pics = explode(",", $data[2]);
      foreach ($pics as $key) {
        echo $a['photos2'] . $key . $a['photos3'];
      }
      echo $a['photos4'];
    }

    echo $a['author1'] . $data[3] . $a['author2'];
    echo $a['date1'] . $data[4] . $a['date2'];
    echo $a['TNoptions'];

  }
  function getUserName($ID) {
    include('php/utils/connect.php');
    $stmt = $conn->prepare("SELECT username FROM user WHERE ID=".$ID);
    $stmt->execute();
    return $stmt->fetchColumn();
  }

 ?>
