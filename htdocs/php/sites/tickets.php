
<?php
  include('php/utils/dashUtils.php');

  createGuestTicketView();
  include('js/addBtn.php');

  function createGuestTicketView() {
    $sql = "SELECT * FROM tickets WHERE username='" . $_COOKIE['user'] . "' ORDER BY timestamp DESC";
    $data = loadArticles($sql);
    $s = getJson('smallview');

    echo $s['smallViewStart'];
    foreach ($data as $key => $value) {
      generateGuestTicket($s, $value);
    }
    echo $s['smallViewEnd'];
    echo $s['addBtn1'] . 'tickets' . $s['addBtn2'];
  }

  function generateGuestTicket($s, $data) {
    $pic = 'img/banner.png';
    $substring = explode('=', $_SERVER['REQUEST_URI']);
    $url =  $substring[0] . '=ticketview&id='  ;
    // console_log($url);

    echo $s['card1'] . $url . $data['ID'] . $s['card2'] . $pic . $s['card3'];
    echo $data['title'] . $s['card4'];
  }

  function loadArticles($sql) {
    include('php/utils/dbaccess.php');
    if($stmt = $conn->prepare($sql)) {
      $stmt->execute();
      $conn = NULL;
      return $stmt->fetchAll();
    }
    $conn = NULL;
  }

 ?>
