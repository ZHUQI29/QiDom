<?php
  if (isset($_GET['del'])) {
    deleteRow($_GET['del']);
  }

  // delete database row and refresh page without $_GET['del']
  function deleteRow($del) {
    include('php/utils/dbaccess.php');
    $table = $_GET['view'];

    // if user data, delete from both: "user" and "personal_data" base
    if ($table == 'personal_data') $table = $table . ', user';
    $sql = "DELETE FROM " . $_GET['view'] . " WHERE ID=" . $del;
    $substring = explode('&del=', $_SERVER['REQUEST_URI']);
    $url = $_SERVER['SERVER_NAME'] . $substring[0];
    echo "<script>window.location.href='" . $substring[0] . "';</script>";
  }

  // get data from database, based on $_GET['view']-variables
  function loadData($startColumn, $view) {
    $counter = 0;
    $sql= "SELECT * FROM " . $view;

    if (isset($_GET['search'])) {
      $search = $_GET['search'];
      $bDate = date('Y-m-d', strtotime($_GET['bDate'] . ' +1 day'));

      if ($view == 'personal_data') {
        $sql = $sql . " WHERE (vorname LIKE '%" . $search . "%' or nachname LIKE '%" . $search . "%' or plz LIKE '%". $search . "%' or ort LIKE '%" .$search . "%' or strasse LIKE '%" . $search . "%' or hausnummer LIKE '%" . $search . "%' or email LIKE '%" ."%')";
      } else {
        $sql = $sql . " WHERE (title LIKE '%" . $search . "%' or text LIKE '%" . $search . "%' or username LIKE '%". $search . "%')";
      }

      $sql = $sql . " and (timestamp > Convert('" . $_GET['vDate'] . "', datetime)) and (timestamp <= Convert('" . $bDate . "', datetime))";

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

    if (isset($_GET['le'])) {
      $sql = $sql . " LIMIT 0," . $_GET['le'] ;
    } else {
      $sql = $sql . " LIMIT 0,10";
    }
    // console_log($sql);

    include('php/utils/dbaccess.php');
    $stmt = $conn->query($sql);
    return $stmt->fetch_all(MYSQLI_ASSOC);
  }

  // https://localhost/index.php?site=dashboard
  // &view=tickets
  // &search=asd
  // &vDate=2022-01-01
  // &bDate=2022-01-19
  // &status=111
  // &ob=timestamp
  // &order=ASC

  // SELECT * FROM tickets
  // WHERE (title LIKE '%asd%' or text LIKE '%asd%' or username LIKE '%asd%')
  // and (timestamp > Convert('2022-01-01', datetime))
  // and (timestamp <= Convert('2022-01-20', datetime))
  // and ((status = 2) or (status = 1) or (status = 0))
  // ORDER BY timestamp ASC LIMIT 0,10;

 ?>
