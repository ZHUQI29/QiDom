<?php

    //header("Content-Type: text/html; charset=utf8");
    include('php/utils/connect.php');

    $username = $_POST['username'];//post 获得用户名表单值 post to get the username form value
    $password = $_POST['password'];//post 获得用户密码单值 post to obtain the user password single value

    if (isset($_POST["login"])) {
        if ($username && $password) {//如果用户名和密码都不为空 If the username and password are not empty
            // Select HASHED password from the database and feed in entered password,
            // then use password_verify to determine if they are matched.
            if ($stmt = $conn->prepare("SELECT password FROM user WHERE username=:uname")) {
                $stmt->bindParam(":uname", $username);
                $stmt->execute();

                // Result = the HASHED password, this will not give out a unhashed password.
                $result = $stmt->fetchColumn();

                // verify password.
                if (password_verify($password, $result)) {
                  // password MATCHES (HASH) (LOGIN SUCCESSFUL!)
                  $conn = null; // close connection
                  echo "<script>window.location.href='index.php?site=welcome';</script>";
                } else {
                    echo"wrong password";
                }
            }
        } else {//如果用户名或密码有空 If the username or password is available
            $conn = null; // close connection
            echo "Incomplete form";
            echo "<script>setTimeout(function(){window.location.href='../../test.php';},2000);</script>";
        }
    } else {
        $conn = null; // close connection
        exit("Wrong execution");
    }
    $conn = null; // close connection
?>
