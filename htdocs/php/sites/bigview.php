<?php //include('_BIN/console.php'); ?>
<?php
  if (($_COOKIE['level'] != '3' && $_COOKIE['level'] != '2') && $_GET['site'] == 'ticketview')
  {
    "<script>window.location.href='index.php?site=error';</script>";
  }

  include('php/utils/dashUtils.php');

  if (isset($_GET['id']) == false) {
    echo "<script>window.location.href='index.php?site=error';</script>";
  }
  $id = $_GET['id'];
  $site = ($_GET['site'] == 'ticketview') ? 'tickets' : 'news';
  $viewerLevel = intval($_COOKIE['level']);
  $editMode = checkEditMode($viewerLevel, $site);
  $url = prepareURL($id, $site, $_COOKIE['user']);
  if ($site == 'tickets' && $viewerLevel < 2) {
    if (checkEditModeDB($id) != $_COOKIE['user']) {
      "<script>window.location.href='index.php?site=error';</script>";
    }
  }
  $data = loadArticle($site, $id);
  $comments = loadArticle('comments', $id);
  $b = getJson('bigview');
  createDisplay($data[0], $b, $editMode, $url);
  createComments($comments, $b, $editMode);
  // console_log($b);
  if ($viewerLevel > 0) {
    echo $b['pComment1'] . $url . $b['pComment2'];
  }

  echo $b['bViewEnd'];


  function createDisplay($data, $b, $eMode, $url) {
    // console_log($data);
    echo $b['bViewStart'] . $b['displayS'];
    if ($data['photo_id'] != NULL) {
      $pic = explode(',', $data['photo_id'])[0];
      echo $b['photo1'] . $pic . $b['photo2'];
    } else {
      echo "<img class='mx-auto mt-2'src='img/banner.png' alt='photo'>";
    }
    if ($eMode) {
      echo $b['editView'];
      echo $b['eTitle1'] . $data['title'] . $b['eTitle2'];
      echo $b['eText1'] . $data['text'] . $b['eText2'];
      echo $b['id1'] . $url . $b['id2'];
      echo $b['editEnd'];
    } else {
      echo $b['title'] . $data['title'] . $b['title'];
      echo $b['text1'] . $data['text'] . $b['text2'];
    }
    echo $b['displayE'];
  }

  function createComments($comments, $b, $eMode) {
    foreach ($comments as $key => $value) {
      echo $b['comment1'];
      if ($value['photo_id'] != '') {
        $pic = explode(",", $value['photo_id'])[0];
        echo $b['cPhoto1'] . $pic . $b['cPhoto2'];
      } else {
        echo "<img class='mx-auto mt-3'src='img/banner.png' alt='photo'>";
      }
      echo $b['comment2'];
      echo $b['commentT1'] . $value['title'];
      echo $b['commentT2'] . $value['text'];
      echo $b['commentT3'] . date('Y-m-d H:i', strtotime($value['timestamp']));
      echo $b['commentT4'] . $value['username'];
      echo $b['commentT5'];
      if ($eMode) {
        echo $b['eComment1'] . $value['ID'] . $b['eComment2'];
      } else {
        echo $b['neComment'];
      }
    }
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

  function checkEditMode($viewerLevel, $site) {
    return (($viewerLevel == 3) || ($viewerLevel == 2 && $site == 'tickets'));
  }

  function checkEditModeDB($id) {
    $sql = "SELECT username FROM tickets WHERE ID LIKE " . $id;
    include('php/utils/connect.php');
    if($stmt = $conn->prepare($sql)) {
      $stmt->execute();
      $conn = NULL;
      return $stmt->fetchAll();
    }
    $conn = NULL;
  }

  function prepareURL($id, $site, $username) {
    return '&id=' . $id . '&site=' . $site . '&username=' . $username;
  }
 ?>
