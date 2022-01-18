<?php
  include('php/utils/dashUtils.php');

  if (!isset($_COOKIE['level'])) {
    setcookie('user', 'anonymous', time()+3600*24);
    setcookie('level', 0, time()+3600*24);
  }

  $f = getJson('faq');
  echo $f['faqStart'];

  if ($_COOKIE['level'] >= 3) {
    createAdminFAQ($f);
  }
  if ($_COOKIE['level'] >= 2) {
    createTechnikFAQ($f);
  }
  if ($_COOKIE['level'] >= 0) {
    createGuestFAQ($f);
  }

  function createGuestFAQ($f) {
    //"helpCon1": "<div class='help-con m-3 mb-2 px-3 py-3'>",
    echo $f['helpCon1'];

    //      "<h1>" . "Login & Registrierung" . "</h1>"
    echo $f['title1'] . $f['login1'] . $f['title2'];
    echo $f['text1'] . $f['login2'] . $f['text2'];
    echo $f['helpCon2'];

    echo $f['helpCon1'];
    echo $f['title1'] . $f['complaints1'] . $f['title2'];
    echo $f['text1'] . $f['complaints2'] . $f['text2'];
    echo $f['helpCon2'];

    echo $f['helpCon1'];
    echo $f['title1'] . $f['news1'] . $f['title2'];
    echo $f['text1'] . $f['news2'] . $f['text2'];
    echo $f['helpCon2'];
  }

  function createTechnikFAQ($f) {
    echo $f['helpCon1'];
    echo $f['title1'] . $f['ticketSystem1'] . $f['title2'];
    echo $f['text1'] . $f['ticketSystem2'] . $f['text2'];
    echo $f['helpCon2'];
  }

  function createAdminFAQ($f) {
    echo $f['helpCon1'];
    echo $f['title1'] . $f['adminBasics1'] . $f['title2'];
    echo $f['text1'] . $f['adminBasics2'] . $f['text2'];
    echo $f['helpCon2'];

    echo $f['helpCon1'];
    echo $f['title1'] . $f['newsSystem1'] . $f['title2'];
    echo $f['text1'] . $f['newsSystem2'] . $f['text2'];
    echo $f['helpCon2'];

    echo $f['helpCon1'];
    echo $f['title1'] . $f['userSystem1'] . $f['title2'];
    echo $f['text1'] . $f['userSystem2'] . $f['text2'];
    echo $f['helpCon2'];
  }


 ?>
