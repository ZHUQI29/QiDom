<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("Wrong execution");
    }//判断是否有submit操作 Determine whether there is a submit operation
    $employed=$_POST['employed'];
    $anrede=$_POST['anrede'];

    $Vname=$_POST['Vname'];
    $Nname=$_POST['Nname'];
    $PLZ=$_POST['PLZ'];
    $Ort=$_POST['Ort'];
    $Straße=$_POST['Straße'];
    $Hausnummer=$_POST['Hausnummer'];
    $birthday=$_POST['birthday'];
    $Email=$_POST['Email'];

    $name=$_POST['name'];//post获取表单里的name post to get the name in the form
    $password=$_POST['password'];//post获取表单里的password post to get the password in the form
    $Level=$_POST['Level'];


    include('Connect.php');//链接数据库link to database
    $q="insert into user(id,username,password) values (null,'$name','$password')";//向数据库插入表单传来的值的sql
    $reslut=mysql_query($q,$con);//执行sql
    
    if (!$reslut){
        die('Error: ' . mysql_error());//如果sql执行失败输出错误If the sql execution fails, an error will be output
    }else{
        echo "registration success";//成功输出注册成功Successful output registration is successful
    }

    

    mysql_close($con);//关闭数据库Close the database

?>