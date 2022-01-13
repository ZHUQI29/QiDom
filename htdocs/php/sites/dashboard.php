<?php //include('_BIN/console.php'); ?>

<?php
  $view = isset($_GET['view']) ? $_GET['view'] : 'tickets';
  if (isset($_COOKIE['device'])) {
    $device = $_COOKIE['device'];
  } else {
    $device = 'mobile';
    setcookie('device', $device, time()+3600*12);
  }

  switch ($device) {

    case 'desktop':
      include('php/sites/dashboard/load-desktop.php');
      break;

    case 'mobile':
      include('php/sites/dashboard/load-mobile.php');
      break;


    default:
      // code...
      break;
  }
?>
