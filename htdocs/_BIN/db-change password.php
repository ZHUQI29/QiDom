<?php
header("Content-type:text/html;charset=utf-8");
header("Access-Control-Allow-Origin: *");

session_start();

if (isset($_POST["submit"]) && $_POST["submit"] == "change Password") {
    include('php/utils/connect.php');
    require_once('php/utils/connect.php');

    $id = $_POST['ID'];
    $old_password = $_POST['old_password'];

    $sql = "SELECT password, ID FROM user WHERE password = '$old_password' AND ID = '$id';";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);

    if ($row == 1) {
        $new_password = $_POST['new_password'];
        $new_password_conf = $_POST['new_password_conf'];

        if ($new_password == $new_password_conf) {
            $sql = "UPDATE user SET password = '$new_password' WHERE ID = '$id';";
            $result = mysqli_query($link, $sql);

            if ($result) {  //密码修改成功
                $arr = array('success' => 1);
            }
        }
    }
    else {  //  密码修改失败
        $arr['success'] = 0;
    }
    $json_arr = json_encode($arr, TRUE);
    echo $json_arr;
}

