<?php //include('_BIN/console.php'); ?>
<?php
  if ($_COOKIE['level'] != '3')
  {
    "<script>window.location.href='index.php?site=error';</script>";
  }

  include('php/utils/prepareDashData.php');
  include('php/utils/dashUtils.php');


  $result = loadData(0, $view);
  prepareMobile($result);
  createNextPageBtn();

  // Prepare User-Dashboard
  function prepareMobile($data) {
    $a = getJson('mobile');
    echo $a['mobileStart'];
    initializeDashBar();
    echo $a['addBtn1'] . $_GET['view'] . $a['addBtn2'];
    $counter = -1;
    foreach ($data as $key) {
      createCard($key, $counter, $a);
      $counter *= -1;
    }
    echo $a['mobileEnd'];
    echo $a['changeDevice'];
    include('js/addBtn.php');
  }

  // Make cards out of database- and uViewDesktop-Fragments
  function createCard($data, $counter, $a) {

    $username = getUserName($data['username']);
    echo $a['container'];
    if ($data['photo_id'] == '') {
      echo $a['photo1'] . $a['photo2'] . "img/banner" . $a['photo3'] . $a['photo4'];
    } else {
      $pics = explode(",", $data['photo_id'])[0];
      echo $a['photo1'];
      if ($pics != '') {
        echo $a['photo2'] . "upload/" . $pics . $a['photo3'];
      }
      echo $a['photo4'];
    }
    echo $a['contentStart'];
    // Decide on displaying User-Data..
    if ($_GET['view'] == 'personal_data') {
      echo $a['title1'] . $username[0]['username'] . $a['title2'];
      echo $a['text1'] . $data['vorname'] . " " .$data['nachname'] . $a['text2'];
      echo $a['text1'] . $data['plz'] . " " . $data['ort'] . ", " . $data['strasse'] . " " . $data['hausnummer'] . $a['text2'];
      echo $a['dateAuthor1'] . $data['birthday'] . $a['dateAuthor2'];
      echo $a['dateAuthor1'] . $data['email'] . $a['dateAuthor2'];
      // ..or displaying Tickets/News
    } else {
      echo $a['title1'] . $data['title'] . $a['title2'];
      echo $a['text1'] . $data['text'] . $a['text2'];
      echo $a['dateAuthor1'] . date('Y-m-d H:i', strtotime($data['timestamp'])) . $a['dateAuthor2'];
      echo $a['dateAuthor1'] . $data['username'] . $a['dateAuthor2'];
    }
    echo $a['contentEnd'];
    echo $a['options1'] . $data['ID'];
    echo $a['options2'] . $data['ID'] . ' ' . $_GET['view'] . $a['options3'];
    echo $a['mobileEnd'];
  }

  // include delete-confirmation
  include('js/modal.php');

 ?>
