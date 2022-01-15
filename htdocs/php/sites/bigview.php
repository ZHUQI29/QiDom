<?php include('_BIN/console.php'); ?>
<?php
  if (($_COOKIE['level'] != '3' && $_COOKIE['level'] != '2') && $_GET['site'] == 'ticketview')
  {
    "<script>window.location.href='index.php?site=error';</script>";
  }

  include('php/utils/dashUtils.php');

  if (isset($_GET['id']) == false) {
    "<script>window.location.href='index.php?site=error';</script>";
  }
  $id = $_GET['id'];
  $site = ($_GET['site'] == 'ticketview') ? 'tickets' : 'news';
  $data = loadArticle($site, $id);
  $comments = loadArticle('comments', $id);
  $b = getJson('bigview');
  createDisplay($data[0], $b);
  createComments($comments, $b);

  function createDisplay($data, $b) {
    console_log($data);
    echo $b['bViewStart'] . $b['displayS'];
    if ($data['photo_id'] != NULL) {
      $pic = $data['photo_id'].explode(',')[0];
      echo $b['photo1'] . $pic . $b['photo2'];
    } else {
      echo "<img class='mx-auto mt-3'src='img/banner.png' alt='photo'>";
    }
    echo $b['titel1'] . $data['titel'] . $b['titel2'];
    echo $b['text1'] . $data['text'] . $b['text2'];
    echo $b['displayE'];
  }

  function createComments($comments, $b) {
    foreach ($comments as $key => $value) {
      echo $b['comment1'];
      if ($value['photo_id'] != '') {
        $pic = explode(",", $value['photo_id'])[0];
        echo $b['cPhoto1'] . $pic . $b['cPhoto2'];
      } else {
        echo "<img class='mx-auto mt-3'src='img/banner.png' alt='photo'>";
      }
      echo $b['comment2'];
      echo $b['commentT1'] . $value['titel'];
      echo $b['commentT2'] . $value['text'];
      echo $b['commentT3'] . date('Y-m-d H:i', strtotime($value['timestamp']));
      echo $b['commentT4'] . $value['username'];
      echo $b['commentT5'];
    }
    echo $b['bViewEnd'];
  }

  function loadArticle($site, $id) {
    $sql = "SELECT * FROM " . $site . " WHERE ID LIKE '" . $id . "'";
    // console_log($sql);
    include('php/utils/connect.php');
    if($stmt = $conn->prepare($sql)) {
      $stmt->execute();
      return $stmt->fetchAll();
    }
    $conn = NULL;
  }

 ?>
