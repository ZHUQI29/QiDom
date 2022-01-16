<?php include('_BIN/console.php'); ?>
<?php

  //console_log($_POST);

  $info = explode('&',$_POST['id']);
  $id = explode('=',$info[1])[1];
  $site = explode('=',$info[2])[1];
  $username = explode('=',$info[3])[1];


  if ($site == 'tickets' || $site == 'news') {
    $title = $_POST['title'];
    if (isset($_POST['comment'])) {
      postComment($id, $site, $username, $title, $_POST['comment']);
    } else if (isset($_POST['text'])) {
      postChanges($id, $site, $title, $_POST['text']);
    }





  } else if ($site=='personal_data') {
    // USER PROFIL SAVING
  }

  function postComment($id, $site, $username, $title, $comment) {
    $photoID = isset($_COOKIE['photo_id']) ? $_COOKIE['photo_id'] : 'banner';
    $sql = "INSERT INTO comments (ID, title, text, photo_id, username) VALUES('" . $id . "','" .$title . "','" . $comment . "','" . $photoID . "','" . $username . "')";
    console_log($sql);
    include('php/utils/connect.php');
    if($stmt = $conn->prepare($sql)) {
      $stmt->execute();
      echo "<script>window.location.href='index.php?site=error&err=u100';</script>";
    }
    // echo "<script>window.location.href='index.php?site=error&err=u103';</script>";
    $conn = NULL;
  }

  function postChanges($id, $site, $title, $text) {
    $sql = "UPDATE " . $site . " SET title='" . $title . "', text='" . $text . "' WHERE ID LIKE '" . $id . "'";

    include('php/utils/connect.php');
    if($stmt = $conn->prepare($sql)) {
      $stmt->execute();
      echo "<script>window.location.href='index.php?site=error&err=u100';</script>";
    }
    // echo "<script>window.location.href='index.php?site=error&err=u103';</script>";
    $conn = NULL;
  }

?>
