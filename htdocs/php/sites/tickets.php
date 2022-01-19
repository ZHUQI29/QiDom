
<?php
  include('php/utils/dashUtils.php');

  createGuestTicketView();
  include('js/addBtn.php');

  // Generate ticket-view for guests to display their own made tickets
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

  // Generation of each ticket
  function generateGuestTicket($s, $data) {
    $pic = 'img/banner.png';
    $substring = explode('=', $_SERVER['REQUEST_URI']);
    $url =  $substring[0] . '=ticketview&id='  ;

    // sneak in url for later use
    echo $s['card1'] . $url . $data['ID'] . $s['card2'] . $pic . $s['card3'];
    echo $data['title'] . $s['card4'];
  }

  // fetch data from database
  function loadArticles($sql) {
    include('php/utils/dbaccess.php');
    $stmt = $conn->query($sql);
    return $stmt->fetch_all(MYSQLI_ASSOC);
  }

 ?>
