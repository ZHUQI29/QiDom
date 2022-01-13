<?php
  function initializeDashBar() {
    $view = $_GET['view'];
    $d = getJson('dashbar');
    echo $d['dashBarStart'];

    if ($view != 'personal_data') {
      echo $d['searchDate1'] . date('Y-m-d') . $d['searchDate2'];
    }

    switch ($view) {
      case 'news':
        break;

      case 'tickets':
        echo $d['optionA1'] . 'open' . $d['optionA2'];
        echo $d['optionB1'] . 'bad close' . $d['optionB2'];
        echo $d['optionC1'] . 'good close' . $d['optionC2'];
        break;

      case 'personal_data':
        echo $d['optionA1'] . 'Guest' . $d['optionA2'];
        echo $d['optionB1'] . 'Service' . $d['optionB2'];
        echo $d['optionC1'] . 'Admin' . $d['optionC2'];
        break;

      default:
        break;
    }

    $substring = explode('&', $_SERVER['REQUEST_URI']);
    $url = $substring[0] . '&view=' . $view;
    echo $d['url1'] . $url . $d['url2'];
    echo $d['url3'] . $view . $d['url4'];

    if ($view != 'personal_data') {
      echo $d['tnSelect'];
    } else {
      echo $d['uSelect'];
    }

    echo $d['dashBarEnd'];

  }

  function getJson($file) {
    switch ($file) {

      case 'mobile':
        $json_a = file_get_contents('php/sites/dashboard/viewMobile.json');
        break;

      case 'desktop':
        $json_a = file_get_contents('php/sites/dashboard/viewDesktop.json');
        break;

      case 'dashbar':
        $json_a = file_get_contents('php/sites/dashboard/dashBar.json');
        break;

      default:
        break;
    }

    return json_decode($json_a, true);
  }

  function getUserName($ID) {
    include('php/utils/connect.php');
    $stmt = $conn->prepare("SELECT username FROM user WHERE ID=".$ID);
    $stmt->execute();
    return $stmt->fetchColumn();
  }
 ?>
