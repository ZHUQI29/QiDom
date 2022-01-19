<?php //include('_BIN/console.php'); ?>
<?php

  $info = explode('&',$_POST['id']);
  $id = explode('=',$info[1])[1];
  $site = explode('=',$info[2])[1];
  $username = explode('=',$info[3])[1];

  // decide on posting tickets/news/comment
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

  // upload comment to database and forward to next page
  function postComment($id, $site, $username, $title, $comment) {
    $photoID = isset($_COOKIE['photo_id']) ? $_COOKIE['photo_id'] : 'banner';
    $sql = "INSERT INTO comments (ID, title, text, photo_id, username) VALUES('" . $id . "','" .$title . "','" . $comment . "','" . $photoID . "','" . $username . "')";
    include('php/utils/dbaccess.php');
    if($stmt = $conn->prepare($sql)) {
      $stmt->execute();
      $conn->close(); // close connection
      echo "<script>window.location.href='index.php?site=error&err=u100';</script>";
    }
    echo "<script>window.location.href='index.php?site=error&err=u103';</script>";
    $conn = NULL;
  }

  // update news/ticket changes, made by an admin and forward to next page
  function postChanges($id, $site, $title, $text) {
    $status = (isset($_POST['status'])) ? $_POST['status'] : '-';
    $sql = "UPDATE " . $site . " SET title='" . $title . "', text='" . $text . "', status='" . $status . "' WHERE ID LIKE '" . $id . "'";

    include('php/utils/dbaccess.php');
    if($stmt = $conn->prepare($sql)) {
      $stmt->execute();
      $conn->close(); // close connection
      echo "<script>window.location.href='index.php?site=error&err=u100';</script>";
    }
    echo "<script>window.location.href='index.php?site=error&err=u103';</script>";
    $conn = NULL;
  }

?>
