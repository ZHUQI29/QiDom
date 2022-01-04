<?php

// echo 'upload start0';
echo $_SERVER['PHP_SELF'];
  // Checking the file was submitted
  if(!isset($_FILES['photo'])) {   echo '<p>Please Select a file</p>';   }
  else
  {

      try  {
                // echo 'upload start2';
                $msg = upload(); // function  calling to upload an image
                // echo $msg;
                }
             catch(Exception $e) {
                 echo $e->getMessage();
                 echo 'Sorry, Could not upload file';
                      }
  }

  function upload() {

  }

  // $a = download();
  // echo $a;
  //
  function download() {
    // echo "<br>start";
    include ('php/utils/connect.php');
    // echo "<br>start0";
    if($stmt = $conn->prepare('SELECT photo FROM photos')) {
      // echo "start1";
      $stmt->execute();
      // echo "start2";
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      // echo "start3";
      $img = $row['photo'];
      // echo "start3.5";
      echo '<img src="data:image/png;base64,'.base64_encode($img) .'" />';
      // header("Content-type: image/png");
      // echo "start4";
      // echo $img;
      // echo "end";
    } //else {echo "error";}
  }


 ?>
