<?php
    $server=@mysql_connect("localhost", "root", "")or die("数据库连接失败！");
    mysql_query("SET NAMES 'UTF8'");
    $dblink=@mysql_select_db("news") or die("选择当前数据库失败！");
	$name=$_POST['name'];
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];
	$sql1="select name from users where name={$name}";
	$selected=mysql_query($sql1);
	if(mysql_affected_rows()>0){
		echo "<script>alert('用户名已存在');window.history.back()</script>";
	}
	else if($name==''){
		echo "<script>alert('用户名不能为空');window.history.back()</script>";
	}
	else if($password==''){
		echo "<script>alert('密码不能为空');window.history.back()</script>";
	}
	else if($password!=$repassword){
		echo "<script>alert('两次输入密码不一致');window.history.back()</script>";
	}
	else{
		$sql="insert into users values(null,'{$name}','{$password}')";
		$added=mysql_query($sql);
		if (mysql_affected_rows() > 0) {
			echo "<script> alert('注册成功');window.history.back();</script>";
        } else {
            echo "<script> alert('注册失败');window.history.back();</script>";
        }
	}
?>