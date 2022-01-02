<?PHP
    header("Content-Type: text/html; charset=utf8");
    include('/php/utils/connect.php');
    if(isset($_POST["login"])){
      include('connect.php');//链接数据库 Link to the database
      $name = $_POST['username'];//post 获得用户名表单值 post to get the username form value
      $password = $_POST['password'];//post 获得用户密码单值 post to obtain the user password single value

      if ($name && $password){//如果用户名和密码都不为空 If the username and password are not empty
               $sql = "select * from user where username = '$name' and password = '$password'";//检测数据库是否有对应的 username 和 password 的 sqlCheck whether the database has corresponding username and password sql
               $result = mysql_query($sql);//执行 sql
               $rows=mysql_num_rows($result);//返回一个数值 Returns a number
               if($rows){//0 false 1 true
                     header("refresh:0;url=welcome.html");//如果成功跳转至 welcome.html 页面 If successful, jump to welcome.html page
                     exit;
               }else{
                  echo "wrong user name or password";
                  echo "
                      <script>
                              setTimeout(function(){window.location.href='../../test.php';},1000);
                      </script>

                  ";//如果错误使用js 1秒后跳转到登录页面重试; If you use js incorrectly, jump to the login page after 1 second and try again;
               }


      }else{//如果用户名或密码有空 If the username or password is available
                  echo "Incomplete form";
                  echo "
                        <script>
                              setTimeout(function(){window.location.href='../../test.php';},1000);
                        </script>";

                          //如果错误使用js 1秒后跳转到登录页面重试; If you use js incorrectly, jump to the login page after 1 second and try again;
      }

      mysql_close();//关闭数据库 Close the database

    } else if(isset($_POST["registration"])) {
      $username=$_POST['username'];//post 获取表单里的 name post to get the name in the form
      $password=$_POST['password'];//post 获取表单里的 password
      $id=random_int(100000, 999999);
      echo $id;
      echo "<br>test";
      include('connect.php');//链接数据库 post to get the password in the form

      $q="insert into user(id,username,password) values ('$id','$username','$password')";//向数据库插入表单传来的值的sql; Insert the value from the form into the database

      echo $q;
      $result=mysql_query($q,$con);//执行 sql
      var_dump($result);
      if (!$result){
          die('Error: ' . mysql_error());//如果sql执行失败输出错误 If the sql execution fails, an error will be output
      }else{
          echo "registration success";//成功输出注册成功 Successful output registration is successful
      }

      mysql_close($con);//关闭数据库 Close the database
    } else {
      exit("Wrong execution");
    }




?>
