<?php

if (!isset($_SESSION['user'])) {
    session_start();
    if (isset($_COOKIE['user'])) {
        $_SESSION['user'] = $_COOKIE['user'];
    } else {
      $_SESSION['user'] = 'anonymous';
      // expires in 24h
      setcookie('user', 'anonymous', time()+3600*24);
      setcookie('level', 0, time()+3600*24);
    }
}

?>
