<?php  
$database_connection = null; 
function get_connection(){ 
     $server=@mysql_connect("localhost", "root", "")or die("数据库连接失败！");
    mysql_query("SET NAMES 'UTF8'");
    $dblink=@mysql_select_db("news") or die("选择当前数据库失败！");
} 
function close_connection(){ 
     global $database_connection; 
     if($database_connection){ 
     		mysql_close($database_connection) or die(mysql_error()); 
	} 
} 
?> 