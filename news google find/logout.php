<?php 
session_start(); 
session_unset(); 
$url = $_SERVER["HTTP_REFERER"];
if(isset($_COOKIE[session_name()])){ 
     setcookie(session_name(),session_id(), time()-10); 
} 
session_destroy(); 
header("Location:$url");
?> 