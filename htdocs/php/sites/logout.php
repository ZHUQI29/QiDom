<?php 
session_start(); 
session_unset(); 
$url = $_SERVER["HTTP_REFERER"];
if(isset($_COOKIE[session_name()])){ 
     setcookie(session_name(),session_id(), time()-3600*24*30); 
} 
session_destroy(); 
header("Location:./index.php");
?> 