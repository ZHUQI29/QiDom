<?php
  if ($_COOKIE['level'] != '3')
  {
    "<script>window.location.href='index.php?site=error';</script>";
  }

  function loadNews($startColumn) {
    include('php/utils/connect.php');
    if($stmt = $conn->prepare("SELECT * FROM news ORDER BY timestamp DESC LIMIT " . $startColumn . ",10")) {
      $stmt->execute();
      return $stmt->fetchAll();
      // $size = sizeof($result);
    } else { /*echo "error";*/ }
  }

  $result = loadNews(0);
  // console_log($result);
  prepareDashboardDesktop($result);

  function prepareDashboardDesktop($data) {
    $counter = 1;
    // echo 1
    echo "<div class='t-desktop container my-3 d-flex justify-content-center'><table class='box-1'><tr><th> </th><th>Titel</th><th>Text</th><th>Photos</th><th>Author</th><th>Time</th><th>Options</th></tr>";
    foreach ($data as $key) {
      echo '<tr><td>' . $counter++ . '</td>';

      // console_log($key);
      createRow($key);
    }
    echo "</tr></table></div>";

  }

  function createRow($row) {

    echo "<td class='tdn-title'><div><p class='td-of-webkit'>"
     . $row[0] . "</p></div></td>";
    echo "<td class='tdn-text'><div><p class='td-of-webkit'>"
     . $row[1] . "</p></div></td>";
    echo "<td class='tdn-photos'><div class='d-flex flex-column td-overflow'>";
    if ($row[2] != '') {
      $pics = explode(",", $row[2]);
      foreach ($pics as $key) {
        echo "<img class='p-1' src='upload/" . $key . ".png' alt='preview'>";
      }
    }

    echo "</div></td>";
    echo "<td class='tdn-author td-overflow'>" . $row[3] . "</td>";
    echo "<td>" . $row[4] . "</td>";
    echo "<td class='tdn-options d-flex flex-column align-items-center'><i class='material-icons p-1' style='font-size:36px;'>highlight_off</i><i class='material-icons pt-1' style='font-size:36px;'>edit_note</i></td>";

  }


 ?>
