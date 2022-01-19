<?php
  include('php/utils/dashUtils.php');

  // le = limit end = sql: "... LIMIT 0,x"
  $amount = (isset($_GET['le'])) ? $_GET['le'] : 8;
  createSmallViews($amount);
  createNextPageBtn();

  // start creating small Views, out of Database- and JSON-Fragments
  function createSmallViews($amount) {
    $sql = "SELECT * FROM news ORDER BY timestamp DESC LIMIT 1," . $amount;
    $data = loadArticles($sql);
    $s = getJson('smallview');

    echo $s['smallViewStart'];
    foreach ($data as $key => $value) {
      generateSmallView($s, $value);
    }
    echo $s['smallViewEnd'];
  }

  function generateSmallView($s, $data) {
    $pic = getPic($data['photo_id']);
    if ($pic != NULL) {
      $pic = 'upload/' . $pic . '.png';
    } else {
      $pic = 'img/banner.png';
    }
    $substring = explode('=', $_SERVER['REQUEST_URI']);
    $url =  $substring[0] . '=newsview&id=';

    // sneak in this.url for after-POST
    echo $s['card1'] . $url . $data['ID'] . $s['card2'] . $pic . $s['card3'];
    echo $data['title'] . $s['card4'];
  }

  // fetch data from Database
  function loadArticles($sql) {
    include('php/utils/connect.php');
    if($stmt = $conn->prepare($sql)) {
      $stmt->execute();
      $conn = NULL;
      return $stmt->fetchAll();
    }
    $conn = NULL;
  }

  // extract first picture from photo_id
  function getPic($photo_id) {
    if ($photo_id != ' ') {
      return explode(",", $photo_id)[0];
    } else return NULL;
  }

 ?>
