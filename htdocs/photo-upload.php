<?php //include('_BIN/console.php'); /* For Debugging & Testing */?>
<?php include "php/utils/session.php" ?>
<?php

// Check for "upload" folder. create it, if not found
// DIRECTORY_SEPARATOR for windows/mac/linux compitability
$dest_folder = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR;
if (!file_exists($dest_folder)) {
    mkdir($dest_folder, 0777, true);
}
$error = 0;  // status of upload
$table = $_GET['site'];

if ($table == 'user') {
  $photo_id = preparePhoto($dest_folder);
  } else {
  uploadArticle($table, $dest_folder);
}

function uploadArticle($table, $dest_folder) {
  $eID = date('mdHis') . mt_rand(100, 999);
  $title = $_POST['title'];
  $text = $_POST['text'];
  $username = $_SESSION['user'];
  $id = preparePhoto($dest_folder);
  // database entry
  include('php/utils/dbaccess.php');

  try {
      if ($stmt = $conn->prepare("INSERT INTO ". $table . "(ID,title,text,photo_id,username) VALUES (?,?,?,?,?)")) {
          $stmt->bind_param('issss', $eID, $title, $text, $id, $username);
          $stmt->execute();
      }
  } catch (Exception $e) {
       // console_log($e->getMessage());
  }
}

function preparePhoto($dest_folder) {
  $eID = date('mdHis') . mt_rand(100, 999);
  $maxsize = 10000000;  // approx. 10 MB
  $id = '';
  // console_log($_FILES);
  foreach ($_FILES['photo']['name'] as $key => $value) {

    $a=explode(".", $_FILES['photo']['name'][$key]); // Catch file-extension
    $name = date('mdHis') . mt_rand(100, 999); // [date] + [random number] + . + [file-extension]
    $id .= $name . ',';
    //check associated error code
    if ($_FILES['photo']['error'][$key] == UPLOAD_ERR_OK) {

      //check whether file is uploaded with HTTP POST
        if (is_uploaded_file($_FILES['photo']['tmp_name'][$key])) {

        //checks size of uploaded image on server side
            if ($_FILES['photo']['size'][$key] < $maxsize) {

          // echo 'upload start6';
                $finfo = finfo_open(FILEINFO_MIME_TYPE);

                //checks whether uploaded file is of image type
                if (strpos(finfo_file($finfo, $_FILES['photo']['tmp_name'][$key]), "image") === 0) {

                    // move photo to /htdocs/upload/
                    move_uploaded_file($_FILES['photo']['tmp_name'][$key], $dest_folder . $name . '.' . $a[1]);


                } else {
                    $error = 1;
                }
            } else {
                $error = 2;
            }
        } else {
            $error = 3;
        }
    } else {
        $id = ' ';
    }
  }
  // console_log($id);
  return $id;
}


$gotoSite = '';
switch ($error) {
  case 0:
    $gotoSite = 'error&err=u100';
    break;

  case 1:
    $gotoSite = 'error&err=u101';
    break;

  case 2:
    $gotoSite = 'error&err=u102';
    break;

  case 3:
    $gotoSite = 'error&err=u103';
    break;

  default:
    $gotoSite = 'error';
    break;
}
 echo "<script>window.location.href='index.php?site=".$gotoSite."';</script>";

?>
