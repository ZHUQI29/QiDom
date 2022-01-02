<?php
 header("content-type:text/html;charset=utf8");
?>
<?php 
include_once("functions/is_login.php"); 
session_start(); 
?> 
<?php 
include_once("functions/database.php"); 
$news_id = $_GET["news_id"]; 
get_connection(); 
mysql_query("delete from review where news_id=$news_id"); 
mysql_query("delete from news where news_id=$news_id"); 
close_connection(); 
echo "新闻及相关评论信息删除成功！"; 

?> 