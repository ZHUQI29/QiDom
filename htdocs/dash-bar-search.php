<?php //include('_BIN/console.php'); ?>
<?php

$url = $_POST['url'];
$view = $_POST['view'];

  if (isset($_POST['search'])) {
    $url = $url . '&search=' . $_POST['search'];
  }

  if (isset($_POST['vDate'])) {
    $url = $url . '&vDate=' . $_POST['vDate'];
  }

  if (isset($_POST['bDate'])) {
    $url = $url . '&bDate=' . $_POST['bDate'];
  }

  if (isset($_POST['A']) || isset($_POST['B']) || isset($_POST['C']) ) {
    $url = $url . '&status=';
    if (isset($_POST['A'])) {
      $url = $url . '1';
    } else {
      $url = $url . '0';
    }
    if (isset($_POST['B'])) {
      $url = $url . '1';
    } else {
      $url = $url . '0';
    }
    if (isset($_POST['C'])) {
      $url = $url . '1';
    } else {
      $url = $url . '0';
    }
  }

  // console_log($_POST);
  if (isset($_POST['ls'])) {
    $url = $url . '&ls=' . $_POST['ls'] . '&le=' . $POST['le'];
  }

  if (isset($_POST['ob'])) {
    $url = $url . '&ob=' . $_POST['ob'] . '&order=' . $_POST['order'];
  }

  echo "<script>window.location.href='". $url ."';</script>";

 ?>
