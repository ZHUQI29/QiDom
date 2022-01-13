<?php include('_BIN/console.php'); ?>
<?php
  if ($_COOKIE['level'] != '3')
  {
    "<script>window.location.href='index.php?site=error';</script>";
  }

  include('php/utils/prepareDashData.php');
  include('php/utils/dashUtils.php');

  // Decide on displaying News/Tickets or User-Data
  $result = loadData(0, $view);
  if($view == 'personal_data') {
    prepareDesktopU($result);
  } else {
    prepareDesktopTN($result);
  }

  // Prepare User-Dashboard
  function prepareDesktopU($data) {
    $a = getJson('desktop');
    echo $a['uViewStart1'];
    initializeDashBar();
    echo $a['uViewStart2'];
    $counter = -1;
    foreach ($data as $key) {
      createRowU($key, $counter, $a);
      $counter *= -1;
    }
    echo $a['end'];
    echo $a['changeDevice'];
  }

  // Make rows out of database- and uViewDesktop-Fragments
  function createRowU($data, $counter, $a) {
    $username = getUserName($data[0]);
    echo $a['row1'] . $counter;
    echo $a['row2'] . $data['status'] . $a['row3'] . $data['status'] . $a['row4'];
    echo $a['userTD1'] . $username . $a['userTD2'];
    echo $a['userTD1'] . $data['vorname'] . $a['userTD2'];
    echo $a['userTD1'] . $data['nachname'] . $a['userTD2'];
    echo $a['userTD1'] . $data['email']. $a['userTD2'];
    echo $a['userTD1'] . $data['plz'] . ' ' . $data['ort'] . $a['userTD2'];
    echo $a['userTD1'] . $data['strasse'] . ' ' . $data['hausnummer'] . $a['userTD2'];
    echo $a['date1'] . $data['birthday']. $a['date2'];
    echo $a['userOptions'];
  }

  // Prepare TicketsNews-Dashboard
  function prepareDesktopTN($data) {
    $a = getJson('desktop');
    echo $a['tnViewStart1'];
    initializeDashBar();
    echo $a['tnViewStart2'];
    $counter = 1;
    foreach ($data as $key) {
      if (isset($key[5])) {$key[5] = null;}
      createRowTN($key, $counter, $a);
      $counter++;
    }
    echo $a['end'];
    echo $a['changeDevice'];
  }

  // Make rows out of database- and tnViewDesktop-Fragments
  function createRowTN($data, $counter, $a) {
    $even = ($counter%2==0) ? '1' : '0';
    // $data[6] = ($data[6]==null) ? $counter : $data[6];
    echo $a['row1'] . $even;
    echo $a['row2'] . $data['status'] . $a['row3'] . $data['status'] . $a['row4'];
    echo $a['titel1'] . $data['titel'] . $a['titel2'];
    echo $a['text1'] . $data['text'] . $a['text2'];
    echo $a['photos1'];

    if ($data['photo_id'] != '') {
      $pics = explode(",", $data['photo_id']);
      foreach ($pics as $key) {
        if ($key != '') {
          echo $a['photos2'] . $key . $a['photos3'];
        }
      }
      echo $a['photos4'];
    }

    echo $a['author1'] . $data['username'] . $a['author2'];
    echo $a['date1'] . date('Y-m-d H:i', strtotime($data['timestamp'])) . $a['date2'];
    echo $a['TNoptions1'] . $data['ID'] . $a['TNoptions2'];
  }

  include('js/modal.php');

 ?>
