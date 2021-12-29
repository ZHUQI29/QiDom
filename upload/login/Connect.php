<?php
    $server="localhost";
    $db_username="zhuqi";
    $db_password="zq020809";

    $con = mysql_connect($server,$db_username,$db_password);//链接数据库Link to the database
    if(!$con){
        die("can't connect".mysql_error());//如果链接失败输出错误If the link fails, an error will be output
    }
    
    mysql_select_db('qidom',$con);//选择数据库Select database
?>