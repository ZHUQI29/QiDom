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

                // Now we verify it.
                if (password_verify($password, $result)) {
                    echo"1"; // password MATCHES (HASH) (LOGIN SUCCESSFUL!)
                } else {
                    echo"00";// wrong password
                }
            }
        } else {//如果用户名或密码有空 If the username or password is available
            echo "Incomplete form";
            echo "<script>setTimeout(function(){window.location.href='../../test.php';},2000);</script>";
        }
    } elseif (isset($_POST["registration"])) {
        $username=$_POST['username'];//post 获取表单里的 name post to get the name in the form
        $password=$_POST['password'];//post 获取表单里的 password
        $id=random_int(100000, 999999);
        $level=0;
        // Encrypt password with a strength of 10 (Higher = More time needed to make a stronger pass)
		    // NOT RECOMMENDED to go above 12, unless the server-hardware can handle it.
        $options = ['cost' => 10,];
        $passwordNew = password_hash($password, PASSWORD_BCRYPT, $options);
        $stmt = $conn->prepare('SELECT * FROM user WHERE username=:uname');
        $stmt->bindParam(":uname", $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // If Account (DON'T EXIST) { CREATE IT! }.
        if (!$row) {
            if ($stmt = $conn->prepare("INSERT INTO user (ID,username,password,level) VALUES (?,?,?,?)")) {
                $stmt->bindValue(1, $id);
                $stmt->bindValue(2, $username);
                $stmt->bindValue(3, $passwordNew);
                $stmt->bindValue(4, $level);
                $stmt->execute();
                echo"1";
            }
        } else {
            // Else - if account DOES already exist
            die('Account Exists!');
            echo"00";
        }
    } else {
        exit("Wrong execution");
    }
    $conn = null;
?>
