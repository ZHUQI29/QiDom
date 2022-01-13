<?php //include('_BIN/console.php'); ?>
<?php
  if ($_COOKIE['level'] != '3')
  {
    "<script>window.location.href='index.php?site=error';</script>";
  }

  include('php/utils/prepareDashData.php');

  // Decide on displaying News/Tickets or User-Data
  $result = loadData(0, $view);
  if($view == 'personal_data') {
    prepareDesktopU($result);
  } else {
    prepareDesktopTN($result);
  }

  // Prepare User-Dashboard
  function prepareDesktopU($data) {
    $a = getViewJson();
    echo $a['uViewStart1'];
    initializeDashBar($a);
    echo $a['uViewStart2'];
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
    $a = getViewJson();
    echo $a['tnViewStart1'];
    initializeDashBar($a);
    echo $a['tnViewStart2'];
    // console_log($data);
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
    echo $a['date1'] . $data[5] . $a['date2'];
    echo $a['TNoptions1'] . $data[0] . $a['TNoptions2'];

  }

  function initializeDashBar($a) {
    $view = $_GET['view'];
    echo $a['dashBarStart'];
    echo $a['searchDate1'] . date('Y-m-d') . $a['searchDate2'];
    console_log(date('Y-m-d'));
    switch ($view) {

      case 'news':
        break;

      case 'tickets':
        echo $a['optionA1'] . 'open' . $a['optionA2'];
        echo $a['optionB1'] . 'bad close' . $a['optionB2'];
        echo $a['optionC1'] . 'good close' . $a['optionC2'];
        break;

      case 'personal_data':
        echo $a['optionA1'] . 'Guest' . $a['optionA2'];
        echo $a['optionB1'] . 'Service' . $a['optionB2'];
        echo $a['optionC1'] . 'Admin' . $a['optionC2'];
        break;

      default:
        break;
    }
    $substring = explode('&', $_SERVER['REQUEST_URI']);
    $url = $substring[0] . '&view=' . $view;
    echo $a['url1'] . $url . $a['url2'];
    echo $a['url3'] . $view . $a['url4'];
    echo $a['dashBarEnd'];

  }

  function getViewJson() {
    $json_a = file_get_contents('php/sites/dashboard/viewDesktop.json');
    return json_decode($json_a, true);
  }

  function getUserName($ID) {
    include('php/utils/connect.php');
    $stmt = $conn->prepare("SELECT username FROM user WHERE ID=".$ID);
    $stmt->execute();
    return $stmt->fetchColumn();
  }

  include('js/modal.php');

 ?>
