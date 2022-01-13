<?php include('_BIN/console.php'); ?>
<?php

    //header("Content-Type: text/html; charset=utf8");
    include('php/utils/connect.php');

    $username = $_POST['username'];//post 获得用户名表单值 post to get the username form value
    $password = $_POST['password'];//post 获得用户密码单值 post to obtain the user password single value

    if (isset($_POST["login"])) {
        if ($username && $password) {//如果用户名和密码都不为空 If the username and password are not empty
            // Select HASHED password from the database and feed in entered password,
            // then use password_verify to determine if they are matched.
            if ($stmt = $conn->prepare("SELECT password FROM user WHERE username=:username")) {
                $stmt->bindParam(":username", $username);
                $stmt->execute();

                // Result = the HASHED password, this will not give out a unhashed password.
                $result = $stmt->fetchColumn();

                // verify password.
                if (password_verify($password, $result)) {
                  // password MATCHES (HASH) (LOGIN SUCCESSFUL!)

                  // get level from database and set cookie
                  $stmt = $conn->prepare("SELECT level FROM user WHERE username=:username");
                  $stmt->bindParam(":username", $username);
                  $stmt->execute();
                  $result = $stmt->fetchColumn();

                  switch ($result) {
                    case '1':
                      setcookie('level', '1', time()+3600*24*30);
                      setcookie('user', $username, time()+3600*24*30);
                      break;

                    case '2':
                      setcookie('level', '2', time()+3600*24);
                      setcookie('user', $username, time()+3600*24);
                      break;
                      
                    case '3':
                      setcookie('level', '3', time()+3600*12);
                      setcookie('user', $username, time()+3600*12);
                      break;

                    default:
                      setcookie('level', '0', time()+3600*24);
                      setcookie('user', 'error', time()+3600*24);
                      break;
                  }

                  $conn = null; // close connection
                  echo "<script>window.location.href='index.php?site=welcome';</script>";
                } else {
                    echo "<script>window.location.href='index.php?site=error&err=l101';</script>";
                }
            }
        } else {
            $conn = null; // close connection
            echo "<script>window.location.href='index.php?site=error&err=l100';</script>";
        }
    } else {
        $conn = null; // close connection
        exit("Wrong execution");
    }
    $conn = null; // close connection
?>
