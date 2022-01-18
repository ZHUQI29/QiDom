<?php
    //include('_BIN/console.php');

    // console_log($_FILES);
    switch ($_POST["submit"]) {
      case 'update':
        handlePersonalData(true, '', '');
        break;
      case 'registration':
        registration();
        break;

      default:
        // code...
        break;
    }

    echo "<script>window.location.href='index.php?site=error=welcome&';</script>";
    $conn = null; // close connection

    function registration() {
      // login data
      $username=$_POST['username'];//post 获取表单里的 name post to get the name in the form
      if ($_POST['password1'] === $_POST['password2']) {
        $password=$_POST['password1'];//post 获取表单里的 password
      } else {
        echo "<script>window.location.href='index.php?site=registration';</script>";
      }
      $id=random_int(100000, 999999);
      $level= $_POST['status'];

      // Encrypt password with a strength of 12 (Higher = More time needed to make a stronger pass)
      // NOT RECOMMENDED to go above 12, unless the server-hardware can handle it.
      $options = ['cost' => 12,];
      $passwordNew = password_hash($password, PASSWORD_BCRYPT, $options);

      include('php/utils/dbaccess.php');
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
              handlePersonalData(false, $id, $username);
              $conn = null;
          }

      } else {
          // Else - if account DOES already exist
          $conn = null; // close connection
          echo "<script>window.location.href='index.php?site=error&err=r101';</script>";
      }
    }

    function handlePersonalData($update, $id, $username) {
      // personal data
      // console_log($_POST);
      $gAnrede = ($_POST['anrede'] == NULL) ? '---' : $_POST['anrede'];
      $gVorname = ($_POST['vorname'] == NULL) ? '---' : $_POST['vorname'];
      $gNachname = ($_POST['nachname'] == NULL) ? '---' : $_POST['nachname'];
      $gEmail = ($_POST['email'] == NULL) ? '---' : $_POST['email'];
      $gStrasse = ($_POST['strasse'] == NULL) ? '---' : $_POST['strasse'];
      $gHausnummer = ($_POST['hausnummer'] == NULL) ? '---' : $_POST['hausnummer'];
      $gPlz = ($_POST['plz'] == NULL) ? '0' : $_POST['plz'];
      $gOrt = ($_POST['ort'] == NULL) ? '---' : $_POST['ort'];
      $gBday = ($_POST['bday'] == NULL) ? date('Y-m-d') : $_POST['bday'];
      $photo_id = '';
      if ($_FILES != NULL) {
        include('photo-upload.php');
      } else {
        // console_log("no photo");
      }


      include('php/utils/dbaccess.php');
      if ($update) {
        changeStatus($_POST['status'], $_POST['ID']);
        try {
          if ($stmt = $conn->prepare("UPDATE personal_data SET anrede=?, vorname=?, nachname=?, plz=?, ort=?, strasse=?, hausnummer=?, birthday=?, email=?, photo_id=? WHERE ID LIKE '" . $_POST['ID'] . "'")) {
            $stmt->bindValue(1, $gAnrede);
            $stmt->bindValue(2, $gVorname);
            $stmt->bindValue(3, $gNachname);
            $stmt->bindValue(4, $gPlz);
            $stmt->bindValue(5, $gOrt);
            $stmt->bindValue(6, $gStrasse);
            $stmt->bindValue(7, $gHausnummer);
            $stmt->bindValue(8, $gBday);
            $stmt->bindValue(9, $gEmail);
            $stmt->bindValue(10, $photo_id);
            $stmt->execute();
          }
        } catch (exception $e) {
          $conn = null; // close connection
           echo "<script>window.location.href='index.php?site=error&err=u103';</script>";
        }
      } else {
        try {
          if ($stmt = $conn->prepare("INSERT INTO personal_data (ID,anrede,vorname, nachname,plz,ort,strasse,hausnummer,birthday,email,photo_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)")) {
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
            $stmt->bindValue(11, $photo_id);
            $stmt->execute();
          }
        } catch (exception $e) {
          // console_log($e->getMessage());
          $conn = null; // close connection
          setcookie('level', '1', time()+3600*24*30);
          setcookie('user', $username, time()+3600*24*30);
          echo "<script>window.location.href='index.php?site=welcome&';</script>";
        }
        echo "<script>window.location.href='index.php?site=login';</script>";
      }
    }

    function changeStatus($status, $id) {
      include('php/utils/dbaccess.php');
      $stmt = $conn->prepare("SELECT * FROM user WHERE ID=?");
      $stmt->bindValue(1, $id);
      $stmt->execute();
      $result = $stmt->fetchAll();
      // console_log($result);
      if ($result) {
        if ($stmt = $conn->prepare("UPDATE user SET level=? WHERE ID=?")) {
          $stmt->bindValue(1, intval($status));
          $stmt->bindValue(2, $id);
          $stmt->execute();
        } else {
          // console_log("error changing status");
        }
      } else {
      }

    }
?>
