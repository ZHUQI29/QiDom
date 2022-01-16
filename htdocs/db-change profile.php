<?php
if (isset($_POST["submit"]) && $_POST["submit"] == "Confirm the changes") {
    include "php/utils/connect.php";
    $id = $_POST['ID'];
    $new_plz = $_POST['new_plz'];
    $new_ort = $_POST['new_ort'];
    $new_strasse = $_POST['new_strasse'];
    $new_hausnummer = $_POST['new_hausnummer'];
    $new_email = $_POST['new_email'];
    $sql = "UPDATE user SET plz = '$new_plz', ort = '$new_ort', strasse = '$new_strasse' , hausnummer = '$new_hausnummer', email = '$new_email'
            WHERE ID = '$_POST[ID]';";
    $result = mysqli_query($link, $sql);
    if ($result) {  //修改信息成功
        $json_arr = array('success' => 1);
    }
    else {  //修改信息失败
        $json_arr = array('success' => 0);
    }
    $login_json = json_encode($json_arr);
    echo $login_json;
    ?>
