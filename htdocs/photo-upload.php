<?php
  error_reporting(-1); // ALL messages
  ini_set('display_errors', 'On');
 ?>
<?php include "php/utils/session.php" ?>
<?php

$dest_folder = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR;
if (!file_exists($dest_folder)) {
    mkdir($dest_folder, 0755, true);
}
$status = 0;
$titel = $_POST['title'];
$text = $_POST['text'];
$a=explode(".", $_FILES['photo']['name']);
$id = date('YmdHis') . mt_rand(100, 999) . '.' . $a[1];
$username = $_SESSION['user'];
$table = $_GET['site'];

$maxsize = 10000000;

//check associated error code
if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {

  //check whether file is uploaded with HTTP POST
    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {

    //checks size of uploaded image on server side
        if ($_FILES['photo']['size'] < $maxsize) {

      // echo 'upload start6';
            $finfo = finfo_open(FILEINFO_MIME_TYPE);

            //checks whether uploaded file is of image type
            if (strpos(finfo_file($finfo, $_FILES['photo']['tmp_name']), "image") === 0) {

                // move photo to /htdocs/upload/
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $dest_folder . $id)) {
                    $status++;
                } else {
                    // echo 'move error';
                }
            } else {
                echo 'upload error4';
            }
        } else {
            echo 'upload error3';
        }
    } else {
        echo 'upload error2';
    }
} else {
    echo 'upload error1';
}


// database entry
include('php/utils/connect.php');

try {
    if ($stmt = $conn->prepare("INSERT INTO ". $table . "(titel,text,photo_id,username) VALUES (?,?,?,?)")) {
        $stmt->bindValue(1, $titel);
        $stmt->bindValue(2, $text);
        $stmt->bindValue(3, $id);
        $stmt->bindValue(4, $username);
        $stmt->execute();
        $status++;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$gotoSite = '';
switch ($status) {
  case 0:
    $gotoSite = 'error&err=u100';
    break;

  case 1:
    $gotoSite = 'error&err=u101';
    break;

  case 2:
    $gotoSite = 'error&err=u102';
    break;

  default:
    $gotoSite = 'error';
    break;
}
echo "<script>window.location.href='index.php?site=".$gotoSite."';</script>";
 ?>
