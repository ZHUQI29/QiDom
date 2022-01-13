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
  prepareMobile($result);

  // Prepare User-Dashboard
  function prepareMobile($data) {
    $a = getJson('mobile');
    echo $a['mobileStart'];
    initializeDashBar();
    $counter = -1;
    foreach ($data as $key) {
      createRow($key, $counter, $a);
      $counter *= -1;
    }
    echo $a['mobileEnd'];
    echo $a['changeDevice'];
  }

  // Make rows out of database- and uViewDesktop-Fragments
  function createRow($data, $counter, $a) {
    $username = getUserName($data[0]);
    echo $a['container'];
    if ($data['photo_id'] == '') {
      echo $a['photo1'] . $a['photo2'] . "img/banner" . $a['photo3'] . $a['photo4'];
    } else {
      $pics = explode(",", $data['photo_id']);
      echo $a['photo1'];
      foreach ($pics as $key) {
        if ($key != '') {
          echo $a['photo2'] . "upload/" . $key . $a['photo3'];
        }
      }
      echo $a['photo4'];
    }
    echo $a['contentStart'];
    if ($_GET['view'] == 'personal_data') {
      echo $a['titel1'] . $username . $a['titel2'];
      echo $a['text1'] . $data['vorname'] . " " .$data['nachname'] . $a['text2'];
      echo $a['text1'] . $data['plz'] . " " . $data['ort'] . ", " . $data['strasse'] . " " . $data['hausnummer'] . $a['text2'];
      echo $a['dateAuthor1'] . $data['birthday'] . $a['dateAuthor2'];
      echo $a['dateAuthor1'] . $data['email'] . $a['dateAuthor2'];
    } else {
      echo $a['titel1'] . $data['titel'] . $a['titel2'];
      echo $a['text1'] . $data['text'] . $a['text2'];
      echo $a['dateAuthor1'] . date('Y-m-d H:i', strtotime($data['timestamp'])) . $a['dateAuthor2'];
      echo $a['dateAuthor1'] . $data['username'] . $a['dateAuthor2'];
    }
    echo $a['contentEnd'];
    echo $a['options1'] . $data['ID'] . $a['options2'] . $data['ID'] . $a['options3'];
    echo $a['mobileEnd'];
  }

  include('js/modal.php');

 ?>
