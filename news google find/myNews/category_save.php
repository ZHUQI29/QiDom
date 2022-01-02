<?php
 header("content-type:text/html;charset=utf8");
?>

<?php 
include_once("functions/database.php"); 
$category = $_POST["category"]; 
//$content = htmlspecialchars(addslashes($_POST["content"]));

$sql = "insert into category values(null,'$category')"; 
get_connection(); 
mysql_query($sql); 
close_connection(); 
echo  "该类别成功添加到数据库表中！"; 
?> 