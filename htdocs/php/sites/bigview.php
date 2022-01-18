<?php //include('_BIN/console.php'); ?>
<?php

  // If url contains delete-ID, delete this entry and reload page, without delete-ID
  if (isset($_GET['del'])) {
    include('php/utils/dbaccess.php');
    if($stmt = $conn->prepare("DELETE FROM " . 'comments'. " WHERE cid=" . $_GET['del'])) {
      $stmt->execute();
      $substring = explode('&del=', $_SERVER['REQUEST_URI']);
      $url = $_SERVER['SERVER_NAME'] . $substring[0];
      echo "<script>window.location.href='" . $substring[0] . "';</script>";
    }
  }


  include('php/utils/dashUtils.php');

  // if not id set, load error page
  if (isset($_GET['id']) == false) {
    echo "<script>window.location.href='index.php?site=error';</script>";
  }
  $id = $_GET['id'];
  $site = ($_GET['site'] == 'ticketview') ? 'tickets' : 'news';
  $viewerLevel = intval($_COOKIE['level']);
  $editMode = checkEditMode($viewerLevel, $site);
  $url = prepareURL($id, $site, $_COOKIE['user']);
  // check if guest and not own ticket => error page
  if ($site == 'tickets' && $viewerLevel < 2) {
    if (checkEditModeDB($id) != $_COOKIE['user']) {
      "<script>window.location.href='index.php?site=error';</script>";
    }
  }
  $data = loadArticle($site, $id);
  $comments = loadArticle('comments', $id);
  $b = getJson('bigview');
  createDisplay($data[0], $b, $editMode, $url, $site);
  createComments($comments, $b, $editMode);

  // modal for delete-confirmation
  include('js/modal.php');

  // if not logged in or banned => no comment posting
  if ($viewerLevel > 0) {
    echo $b['pComment1'] . $url . $b['pComment2'];
  }

  echo $b['bViewEnd'];


  // create main view, out of database content + json fragments
  function createDisplay($data, $b, $eMode, $url, $site) {
    echo $b['bViewStart'] . $b['displayS'];
    //if a photo-id exists, load first picture
    if ($data['photo_id'] != NULL) {
      $pic = explode(',', $data['photo_id'])[0];
      echo $b['photo1'] . $pic . $b['photo2'];
      // else load default image
    } else {
      echo "<img class='mx-auto mt-2'src='img/banner.png' alt='photo'>";
    }
    // if editMode..
    if ($eMode) {
      echo $b['editView'];
      echo $b['eTitle1'] . $data['title'] . $b['eTitle2'];
      echo $b['eText1'] . $data['text'] . $b['eText2'];
      // ..and ticket
      if ($site == 'tickets') {
        // ..mark present status as 'selected'
        $status = $data['status'];
        echo $b['eStatus1'] . $status . $b['eStatus2'];
        echo $b['option2a'] . checkStatus($status, '2') . $b['option2b'];
        echo $b['option1a'] . checkStatus($status, '1') . $b['option1b'];
        echo $b['option0a'] . checkStatus($status, '0') . $b['option0b'];
      }
      // add this url to hidden input POST, to use it after posting
      echo $b['id1'] . $url . $b['id2'];
      echo $b['saveBtn'];
      echo $b['editEnd'];
    } else {
      echo $b['title'] . $data['title'] . $b['title'];
      echo $b['text1'] . $data['text'] . $b['text2'];
      if ($site == 'tickets') {
        echo $b['status1'] . $data['status'] . $b['status2'] . statusToString($data['status']) . $b['status3'];
      }
    }
    echo $b['displayE'];
  }

  // create comments
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
        echo $b['eComment1'] . $value['cid'] . $b['eComment2'];
      } else {
        echo $b['neComment'];
      }
    }

  }

  // get content from database
  function loadArticle($site, $id) {
    $sql = "SELECT * FROM " . $site . " WHERE ID LIKE '" . $id . "'";
    // console_log($sql);
    include('php/utils/dbaccess.php');
    if($stmt = $conn->prepare($sql)) {
      $stmt->execute();
      return $stmt->fetchAll();
    }
    $conn = NULL;
  }

  // check if (admin) or (technician & tickets) for editmode
  function checkEditMode($viewerLevel, $site) {
    return (($viewerLevel == 3) || ($viewerLevel == 2 && $site == 'tickets'));
  }

  // check if guest views his own ticket
  function checkEditModeDB($id) {
    $sql = "SELECT username FROM tickets WHERE ID LIKE " . $id;
    include('php/utils/dbaccess.php');
    if($stmt = $conn->prepare($sql)) {
      $stmt->execute();
      $conn = NULL;
      return $stmt->fetchAll();
    }
    $conn = NULL;
  }

  // set url suffix
  function prepareURL($id, $site, $username) {
    return '&id=' . $id . '&site=' . $site . '&username=' . $username;
  }

  // if (status == select-index) choose this html-select-option
  function checkStatus($id, $a) {
    if ($id == $a) return 'selected';
  }

  // convert status number to string
  function statusToString($status) {
    switch ($status) {
      case '2':
        return 'open';
        break;
      case '1':
        return 'bad close';
        break;
      case '0':
        return 'closed';
        break;

      default:
        break;
    }
  }


 ?>
