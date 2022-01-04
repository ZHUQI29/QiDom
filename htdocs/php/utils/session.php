<?php
if (!isset($_SESSION['user'])) {   // if not logged in, in this session,
    session_start();
    $_SESSION['user'] = "anonymous";
    if (!isset($_COOKIE["level"])) {
        setcookie("level", 0, time()+86400); // expires in 24h
    }
}
?>
