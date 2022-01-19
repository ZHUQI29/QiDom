<?php //include('_BIN/console.php'); ?>
<?php

  $view = $_POST['view'];
  $url = $_POST['url'];

  // check for any set $_POST variables and make a long-ass URL out of it
  if (isset($_POST['search'])) {
    $url = checkURL('search', $_POST['search'], $url);
  }

  if (isset($_POST['vDate'])) {
    $url = checkURL('vDate', $_POST['vDate'], $url);
  }

  if (isset($_POST['bDate'])) {
    $url = checkURL('bDate', $_POST['bDate'], $url);
  }

  if (isset($_POST['A']) || isset($_POST['B']) || isset($_POST['C']) ) {
    $status = '';
    if (isset($_POST['A'])) {
      $status = $status . '1';
    } else {
      $status = $status . '0';
    }
    if (isset($_POST['B'])) {
      $status = $status . '1';
    } else {
      $status = $status . '0';
    }
    if (isset($_POST['C'])) {
      $status = $status . '1';
    } else {
      $status = $status . '0';
    }
    $url = checkURL('status', $status, $url);
  }

  if (isset($_POST['le'])) {
    $url = checkURL('le', $_POST['le'], $url);
  }

  if (isset($_POST['ob'])) {
    $url = checkURL('ob', $_POST['ob'], $url);
  }

  if (isset($_POST['order'])) {
    $url = checkURL('order', $_POST['order'], $url);
  }

  echo "<script>window.location.href='". $url ."';</script>";

  // check if the the $_POST-variable exists in URL and change it to $newValue
  function checkURL($getVar, $newValue, $url) {
    $url = explode('&', $url);
    $checker = 0;
    foreach ($url as $key => $value) {
      if (substr_compare($value, $getVar, 0, 2) == 0) {
        $url[$key] = $getVar . '=' . $newValue;
        $checker++;
      }
    }
    $newURI = '';
    foreach ($url as $key => $value) {
      $newURI = ($newURI == '') ? $value : $newURI . "&" . $value;
    }
    if ($checker == 0) {
      $newURI = $newURI . '&' . $getVar . '=' . $newValue;
    }

    return $newURI;
  }

 ?>
