<?php //include('_BIN/console.php'); ?>
<?php
  if ($_COOKIE['level'] != '3')
  {
    "<script>window.location.href='index.php?site=error';</script>";
  }

  include('php/utils/prepareDashData.php');
  include('php/utils/dashUtils.php');

  // Decide on displaying Tickets/News or User-Data
  $result = loadData(0, $view);
  if($view == 'personal_data') {
    prepareDesktopU($result);
  } else {
    prepareDesktopTN($result);
  }
  createNextPageBtn();

  // Prepare User-Dashboard
  // load JSON-File with all needed HTML-Fragments and build the page
  function prepareDesktopU($data) {
    $a = getJson('desktop');
    echo $a['uViewStart1'];
    initializeDashBar();
    echo $a['uViewStart2'] . $_GET['view'] . $a['uViewStart3'];

    $counter = -1;
    foreach ($data as $key) {
      createRowU($key, $counter, $a);
      $counter *= -1;
    }
    echo $a['end'];
    echo $a['changeDevice'];
    include('js/addBtn.php');
  }

  // Make rows out of database-Entries and HTML-Fragments for User-Dashboard
  function createRowU($data, $counter, $a) {
    $username = getUserName($data['ID']);
    echo $a['row1'] . $counter;
    echo $a['row2'] . $a['row3'] . $username[0]['level'] . $a['row4'];
    echo $a['userTD1'] . $username[0]['username'] . $a['userTD2'];
    echo $a['userTD1'] . $data['vorname'] . $a['userTD2'];
    echo $a['userTD1'] . $data['nachname'] . $a['userTD2'];
    echo $a['userTD1'] . $data['email']. $a['userTD2'];
    echo $a['userTD1'] . $data['plz'] . ' ' . $data['ort'] . $a['userTD2'];
    echo $a['userTD1'] . $data['strasse'] . ' ' . $data['hausnummer'] . $a['userTD2'];
    echo $a['date1'] . $data['birthday']. $a['date2'];
    echo $a['userOptions1'] . $data['ID'] . ' ' . $_GET['view'] . $a['userOptions2'];
  }

  // Prepare Tickets/News-Dashboard. Same as User-Dashboard
  function prepareDesktopTN($data) {
    $a = getJson('desktop');
    echo $a['tnViewStart1'];
    initializeDashBar();
    echo $a['tnViewStart2'] . $_GET['view'] . $a['tnViewStart3'];
    $counter = 1;
    foreach ($data as $key) {
      createRowTN($key, $counter, $a);
      $counter++;
    }
    echo $a['end'];
    echo $a['changeDevice'];
    include('js/addBtn.php');
  }

  // Make rows out of database-Entries and HTML-Fragments for Tickets/News-Dashboard
  function createRowTN($data, $counter, $a) {
    $even = ($counter%2==0) ? '1' : '0';
    echo $a['row1'] . $even;
    echo $a['row2'] . $data['status'] . $a['row3'] . $data['status'] . $a['row4'];
    echo $a['title1'] . $data['title'] . $a['title2'];
    echo $a['text1'] . $data['text'] . $a['text2'];
    echo $a['photos1'];

    if ($data['photo_id'] != ' ') {
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
    echo $a['TNoptions1'] . $data['ID'];
    echo $a['TNoptions2'] . $data['ID'] . ' ' . $_GET['view'] . $a['TNoptions3'];
  }

  // include delete-confirmation
  include('js/modal.php');

 ?>
