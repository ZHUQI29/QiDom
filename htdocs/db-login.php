<?php //include('_BIN/console.php'); ?>
<?php
    include('php/utils/dbaccess.php');

    if(isset($_COOKIE['wrongAttempts'])) {
      if ($_COOKIE['wrongAttempts'] >= 3) {
        echo "<script>window.location.href='index.php?site=error&err=l104';</script>";
      }
    }

    // post to get the username form value
    // post to obtain the user password single value
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST["login"])) {
        // If the username and password are not empty
        if ($username && $password) {

          // Select HASHED password from the database and feed in entered password,
          // then use password_verify to determine if they are matched.
          $sql = "SELECT password FROM user WHERE username='" . $username . "'";
          $stmt = $conn->query($sql);

          // Result = the HASHED password, this will not give out a unhashed password.
          $result = $stmt->fetch_assoc()['password'];

          // verify password.
          if (password_verify($password, $result)) {
            // password MATCHES (HASH) (LOGIN SUCCESSFUL!)

            // get level from database and set cookie
            $sql = "SELECT level, ID FROM user WHERE username='" . $username . "'";
            $stmt = $conn->query($sql);
            $result = $stmt->fetch_all(MYSQLI_ASSOC);

            $sql = "SELECT photo_id FROM personal_data WHERE ID='" . $result[0]['ID'] . "'";

            $stmt = $conn->query($sql);
            $photoID = $stmt->fetch_assoc()['ID'];
            $conn->close(); // close connection

            if ($photoID == NULL) {
              $photoID = 'banner.png';
            }


            switch ($result[0]['level']) {
              case '1':
                setcookie('level', '1', time()+3600*24*30);
                setcookie('user', $username, time()+3600*24*30);
                setcookie('photo_id', $photoID, time()+3600*24*30);
                break;

              case '2':
                setcookie('level', '2', time()+3600*24);
                setcookie('user', $username, time()+3600*24);
                setcookie('photo_id', $photoID, time()+3600*24*30);
                break;

              case '3':
                setcookie('level', '3', time()+3600*12);
                setcookie('user', $username, time()+3600*12);
                setcookie('photo_id', $photoID, time()+3600*24*30);
                break;

              default:
                setcookie('level', '0', time()+3600*24);
                setcookie('user', 'DEACTIVATED', time()+3600*24);
                setcookie('photo_id', $photoID, time()+3600*24*30);
                echo "<script>window.location.href='index.php?site=error&err=l102';</script>";
                break;
            }

            echo "<script>window.location.href='index.php?site=welcome';</script>";
          } else {
              $punishment = (isset($_COOKIE['wrongAttempts'])) ? $_COOKIE['wrongAttempts'] : 0;
              setcookie('wrongAttempts', $punishment + 1, time()+300);

              echo "<script>window.location.href='index.php?site=error&err=l101';</script>";
          }
          $conn->close(); // close connection
        } else {
            $conn = null; // close connection
            echo "<script>window.location.href='index.php?site=error&err=l100';</script>";
        }
    } else {
        $conn->close(); // close connection
        exit("Wrong execution");
    }
    $conn->close(); // close connection
?>
