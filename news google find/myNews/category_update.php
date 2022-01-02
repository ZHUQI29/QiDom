<?php
 header("content-type:text/html;charset=utf8");
?>
<?php 
include_once("functions/is_login.php"); 
session_start(); 
?>
<?php 
include_once("functions/database.php"); 

$category_id = $_POST["category_id"]; 
$name = $_POST["category_name"]; 

$sql = "update category set name='$name' where category_id=$category_id"; 
get_connection(); 
mysql_query($sql); 
close_connection(); 
echo "新闻类别修改成功！"; 

?> 