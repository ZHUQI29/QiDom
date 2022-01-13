<?php //include('_BIN/console.php'); ?>
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
    $a = getJson('desktop');
    echo $a['tnViewStart1'];
    initializeDashBar();
    echo $a['tnViewStart2'];
    // console_log($data);
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
    echo $a['row2'] . $data[6] . $a['row3'] . $data[6] . $a['row4'];
    echo $a['titel1'] . $data[1] . $a['titel2'];
    echo $a['text1'] . $data[2] . $a['text2'];
    echo $a['photos1'];

    if ($data[3] != '') {
      $pics = explode(",", $data[3]);
      foreach ($pics as $key) {
        if ($key != '') {
          echo $a['photos2'] . $key . $a['photos3'];
        }
      }
      echo $a['photos4'];
    }

    echo $a['author1'] . $data[4] . $a['author2'];
    echo $a['date1'] . date('Y-m-d H:i', strtotime($data['timestamp'])) . $a['date2'];
    echo $a['TNoptions1'] . $data[0] . $a['TNoptions2'];

  }

  include('js/modal.php');

 ?>
