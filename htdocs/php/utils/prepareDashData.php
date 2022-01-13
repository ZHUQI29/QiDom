<?php

  if (isset($_GET['del'])) {
    deleteRow($_GET['del']);
  }

  function deleteRow($del) {
    include('php/utils/connect.php');
    if($stmt = $conn->prepare("DELETE FROM ".$_GET['view']." WHERE ID=".$del)) {
      $stmt->execute();
      $substring = explode('&del=', $_SERVER['REQUEST_URI']);
      $url = $_SERVER['SERVER_NAME'] . $substring[0];
      echo "<script>window.location.href='" . $substring[0] . "';</script>";
    }
  }


  // get data from database, based on $_GET['view']
  function loadData($startColumn, $view) {
    $counter = 0;
    $sql= "SELECT * FROM " . $view;

    if (isset($_GET['search'])) {
      $search = $_GET['search'];
      $bDate = date('Y-m-d', strtotime($_GET['bDate'] . ' +1 day'));

      if ($view == 'personal_data') {
        $sql = $sql . " WHERE (vorname LIKE '%" . $search . "%' or nachname LIKE '%" . $search . "%' or plz LIKE '%". $search . "%' or ort LIKE '%" .$search . "%' or strasse LIKE '%" . $search . "%' or hausnummer LIKE '%" . $search . "%' or email LIKE '%" ."%')";
      } else {
        $sql = $sql . " WHERE (titel LIKE '%" . $search . "%' or text LIKE '%" . $search . "%' or username LIKE '%". $search . "%')";
      }

      $sql = $sql . " and (timestamp > Convert('" . $_GET['vDate'] . "', datetime)) and (timestamp <= Convert('" . $bDate . "', datetime))";
      // console_log($_GET['bDate']);
      // console_log(date('Y-m-d', strtotime($_GET['bDate'] . ' +1 day')));
      if (isset($_GET['status'])) {
        $status = intval($_GET['status']);
        if ($status > 0) {
          $counter = 0;
          $sql = $sql . " and (";
          if ($status % 10 == 1) {
            $sql = $sql . "(status = 2)";
            $counter++;
          }
          if (($status/10) % 10 == 1) {
            if($counter == 0) {
              $sql = $sql . "(status = 1)";
            } else {
              $sql = $sql . " or (status = 1)";
            }
            $counter++;
          }
          if (($status/100) % 10 == 1) {
            if($counter == 0) {
              $sql = $sql . "(status = 0)";
            } else {
              $sql = $sql . " or (status = 0)";
            }
          }
          $sql = $sql . ")";
        }
      }

    }

    if (isset($_GET['ob'])) {
      $sql = $sql . " ORDER BY " . $_GET['ob'] . " " . $_GET['order'];
    } else {
        $sql = $sql . " ORDER BY timestamp ASC ";
    }

    if (isset($_GET['ls'])) {
      $sql = $sql . " LIMIT " . $_GET['ls'] . "," . $_GET['le'] ;
    } else {
      $sql = $sql . " LIMIT 1,10";
    }
     // console_log($sql);

    include('php/utils/connect.php');
    if($stmt = $conn->prepare($sql)) {
      $stmt->execute();
      return $stmt->fetchAll();
    } else { /*echo "error";*/ }
  }

  // get data from database, based on $_GET['view']
  // function loadData($startColumn, $view) {
  //   include('php/utils/connect.php');
  //   if($stmt = $conn->prepare("SELECT * FROM ".$view." ORDER BY timestamp DESC LIMIT " . $startColumn . ",10")) {
  //     $stmt->execute();
  //     return $stmt->fetchAll();
  //   } else { /*echo "error";*/ }
  // }

  // SELECT * FROM `tickets`
  // WHERE
  // (titel LIKE '%d%' or text LIKE '%d%' or username LIKE '%d%')
  // and
  // (timestamp > Convert('2022-01-08', datetime))
  // and
  // (timestamp < Convert('2022-01-11', datetime))
  // and
  // (status = 2)

 ?>
