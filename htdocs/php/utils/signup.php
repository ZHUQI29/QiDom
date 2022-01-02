<?php
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("Wrong execution");
    }//判断是否有submit操作 Determine whether there is a submit operation

    $username=$_POST['username'];//post 获取表单里的 name post to get the name in the form
    $password=$_POST['password'];//post 获取表单里的 password
    $id=random_int(100000, 999999);

    include('Connect.php');//链接数据库 post to get the password in the form
    $q="insert into user(id,username,password) values ('$id','$username','$password')";//向数据库插入表单传来的值的sql; Insert the value from the form into the database


    $result=mysql_query($q,$con);//执行 sql

    if (!$result){
        die('Error: ' . mysql_error());//如果sql执行失败输出错误 If the sql execution fails, an error will be output
    }else{
        echo "registration success";//成功输出注册成功 Successful output registration is successful
    }



    mysql_close($con);//关闭数据库 Close the database

?>
