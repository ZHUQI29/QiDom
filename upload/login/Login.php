<?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("Wrong execution");
    }//检测是否有submit操作 Check whether there is a submit operation

    include('Connect.php');//链接数据库Link to the database
    $name = $_POST['name'];//post获得用户名表单值post to get the username form value
    $passowrd = $_POST['password'];//post获得用户密码单值post to obtain the user password single value

    if ($name && $passowrd){//如果用户名和密码都不为空If the username and password are not empty
             $sql = "select * from user where username = '$name' and password='$passowrd'";//检测数据库是否有对应的username和password的sqlCheck whether the database has corresponding username and password sql
             $result = mysql_query($sql);//执行sql
             $rows=mysql_num_rows($result);//返回一个数值Returns a number
             if($rows){//0 false 1 true
                   header("refresh:0;url=welcome.html");//如果成功跳转至welcome.html页面If successful, jump to welcome.html page
                   exit;
             }else{
                echo "wrong user name or password";
                echo "
                    <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                    </script>

                ";//如果错误使用js 1秒后跳转到登录页面重试;If you use js incorrectly, jump to the login page after 1 second and try again;
             }
             

    }else{//如果用户名或密码有空If the username or password is available
                echo "Incomplete form";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                      </script>";

                        //如果错误使用js 1秒后跳转到登录页面重试;If you use js incorrectly, jump to the login page after 1 second and try again;
    }

    mysql_close();//关闭数据库Close the database
?>