<?php
  function initializeDashBar() {
    $view = $_GET['view'];
    $d = getJson('dashbar');
    echo $d['dashBarStart'] . $d['search'];

    if ($view != 'personal_data') {
      echo $d['date1'] . date('Y-m-d') . $d['date2'];
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

    // sneak in url of this page
    $url = $_SERVER['REQUEST_URI'];
    echo $d['url1'] . $url . $d['url2'];
    echo $d['url3'] . $view . $d['url4'];

    if ($view != 'personal_data') {
      echo $d['tnSelect'];
    } else {
      echo $d['uSelect'];
    }
    echo $d['dashBarEnd'];
  }

  // load JSON-FIle
  function getJson($file) {
    switch ($file) {

      case 'mobile':
        $json_a = file_get_contents('json/viewMobile.json');
        break;

      case 'desktop':
        $json_a = file_get_contents('json/viewDesktop.json');
        break;

      case 'dashbar':
        $json_a = file_get_contents('json/dashBar.json');
        break;

      case 'bigview':
        $json_a = file_get_contents('json/bigview.json');
        break;

      case 'smallview':
        $json_a = file_get_contents('json/smallview.json');
        break;

      case 'faq':
        $json_a = file_get_contents('json/faq.json');
        break;

      default:
        break;
    }

    return json_decode($json_a, true);
  }

  // fetch username from database
  function getUserName($ID) {
    include('php/utils/dbaccess.php');
    $sql = "SELECT username, level FROM user WHERE ID='" . $ID . "'";
    $stmt = $conn->query($sql);
    return $stmt->fetch_all(MYSQLI_ASSOC);
  }

  // manipulate url and return it with one changed value
  function changeURL($getVar, $newValue) {
    $url = explode('&', $_SERVER['REQUEST_URI']);
    foreach ($url as $key => $value) {
      if (substr_compare($value, $getVar, 0, 2) == 0) {
        $url[$key] = $getVar . '=' . $newValue;
      }
    }
    $newURI = '';
    foreach ($url as $key => $value) {
      $newURI = ($newURI == '') ? $value : $newURI . "&" . $value;
    }
    return $newURI;

  }

  // set a button to load more entries
  function createNextPageBtn() {
    $d = getJson('dashbar');
    $url = $_SERVER['REQUEST_URI'];
    $view = (isset($_GET['view'])) ? $_GET['view'] : $_GET['site'];

    if (isset($_GET['le'])) {
      $le = intval($_GET['le']) + 10;
      $url = changeURL('le', $le);

    } else {
      $le = 20;
    }
    echo $d['nextPage1'] . $url;
    echo $d['nextPage2'] . $view;
    echo $d['nextPage3'] . $le;
    echo $d['nextPage4'];
  }
 ?>
