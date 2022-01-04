<?php

header("Content-type: image/png");
include('php/utils/connect.php');
// echo "<br>start0";
if ($stmt = $conn->prepare('SELECT photo FROM photos')) {
    // echo "start1";
    $stmt->execute();
    // echo "start2";
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // echo "start3";
    $img = $row['photo'];
    // echo "start3.5";
    // echo '<img src="data:image/png;base64,'.base64_encode($img) .'" />';
    header("Content-type: image/png");
    // echo "start4";
    echo $row['photo'];
    $conn = null;
    // echo "end";
} //else {echo "error";}
