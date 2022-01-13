<?php include('_BIN/console.php'); ?>

<?php
  $view = isset($_GET['view']) ? $_GET['view'] : 'tickets';
  $desktop = 'desktop';

  switch ($desktop) {

    case 'desktop':
      include('php/sites/dashboard/load-desktop.php');
      break;

    case 'mobile':
      // include('load-tickets.php');
      break;


    default:
      // code...
      break;
  }
?>
