<?php
    include('_BIN/console.php');
    //header("Content-Type: text/html; charset=utf8");
    include('php/utils/connect.php');
    console_log($_POST);
    if (isset($_POST["registration"])) {
        $registrationProcess = 0;
        // login data
        $username=$_POST['username'];//post 获取表单里的 name post to get the name in the form
        if ($_POST['password1'] === $_POST['password2']) {
          $password=$_POST['password1'];//post 获取表单里的 password
        } else {
          echo "<script>window.location.href='index.php?site=registration';</script>";
        }
        $id=random_int(100000, 999999);
        $level= $_POST['status'];

        // personal data
        $gAnrede = ($_POST['anrede'] == NULL) ? '---' : $_POST['anrede'];
        $gVorname = ($_POST['vorname'] == NULL) ? '---' : $_POST['vorname'];
        $gNachname = ($_POST['nachname'] == NULL) ? '---' : $_POST['nachname'];
        $gEmail = ($_POST['email'] == NULL) ? '---' : $_POST['email'];
        $gStrasse = ($_POST['strasse'] == NULL) ? '---' : $_POST['strasse'];
        $gHausnummer = ($_POST['hausnummer'] == NULL) ? '---' : $_POST['hausnummer'];
        $gPlz = ($_POST['plz'] == NULL) ? '0' : $_POST['plz'];
        $gOrt = ($_POST['ort'] == NULL) ? '---' : $_POST['ort'];
        $gBday = ($_POST['bday'] == NULL) ? date('Y-m-d') : $_POST['bday'];

        // Encrypt password with a strength of 12 (Higher = More time needed to make a stronger pass)
		    // NOT RECOMMENDED to go above 12, unless the server-hardware can handle it.
        $options = ['cost' => 12,];
        $passwordNew = password_hash($password, PASSWORD_BCRYPT, $options);
        $stmt = $conn->prepare('SELECT * FROM user WHERE username=:uname');
        $stmt->bindParam(":uname", $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // If Account (DOESN'T EXIST) { CREATE IT! }.
        if (!$row) {
            if ($stmt = $conn->prepare("INSERT INTO user (ID,username,password,level) VALUES (?,?,?,?)")) {
                $stmt->bindValue(1, $id);
                $stmt->bindValue(2, $username);
                $stmt->bindValue(3, $passwordNew);
                $stmt->bindValue(4, $level);
                $stmt->execute();
                $registrationProcess++;
                console_log('check1');
            }
            try {
              if ($stmt = $conn->prepare("INSERT INTO personal_data (ID,anrede,vorname, nachname,plz,ort,strasse,hausnummer,birthday,email) VALUES (?,?,?,?,?,?,?,?,?,?)")) {
                $stmt->bindValue(1, $id);
                $stmt->bindValue(2, $gAnrede);
                $stmt->bindValue(3, $gVorname);
                $stmt->bindValue(4, $gNachname);
                $stmt->bindValue(5, $gPlz);
                $stmt->bindValue(6, $gOrt);
                $stmt->bindValue(7, $gStrasse);
                $stmt->bindValue(8, $gHausnummer);
                $stmt->bindValue(9, $gBday);
                $stmt->bindValue(10, $gEmail);
                $stmt->execute();
                $registrationProcess++;
              }
            } catch (exception $e) {
              $conn = null; // close connection
              setcookie('level', '1', time()+3600*24*30);
              setcookie('user', $username, time()+3600*24*30);
              // echo "<script>window.location.href='index.php?site=welcome&';</script>";
            }

            if ($registrationProcess == 2) {
              // success!
              $conn = null; // close connection
              // echo "<script>window.location.href='index.php?site=login';</script>";
            } else { echo "<script>window.location.href='index.php?site=error';</script>"; }
        } else {
            // Else - if account DOES already exist
            $conn = null; // close connection
            // echo "<script>window.location.href='index.php?site=error&err=r101';</script>";
        }
    } else {
        $conn = null; // close connection
        exit("Wrong execution");
    }
    echo "end";
    $conn = null; // close connection
?>
