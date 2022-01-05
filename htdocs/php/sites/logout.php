<?php include('_BIN/console.php'); ?>

<?php
session_start();
session_unset();
$url = $_SERVER["HTTP_REFERER"];

console_log(session_name());
console_log(session_id());

if(isset($_COOKIE[session_name()])){
     setcookie(session_name(),session_id(), time()-3600*24*30);
}
session_destroy();
// header("Location:./index.php");
?>
