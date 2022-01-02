<?php
    $server="localhost";
    $db_username="qidom-db-access";
    $db_password="2!uvsFtui!0AKd?W";

    echo $db_username;
    $con = mysql_connect($server,$db_username,$db_password);//链接数据库 Link to the database
    if(!$con){
        die("can't connect".mysql_error());//如果链接失败输出错误 If the link fails, an error will be output
    }
    echo $con;
    echo "<br>CONNECTED"

    mysql_select_db('technikum-wsp',$con);//选择数据库 Select database
?>
