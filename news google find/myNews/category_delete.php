<?php
 header("content-type:text/html;charset=utf8");
?>
<?php 
include_once("functions/is_login.php"); 
session_start(); 
?> 
<?php 
include_once("functions/database.php"); 
$category_id = $_GET["category_id"]; 
get_connection(); 
mysql_query("delete from review where news_id in (select news_id from news where category_id=$category_id)"); 
mysql_query("delete from news where category_id=$category_id"); 
mysql_query("delete from category where category_id=$category_id");
close_connection(); 
echo "新闻种类及相关新闻删除成功！"; 

?> 