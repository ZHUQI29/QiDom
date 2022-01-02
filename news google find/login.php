<?php
    session_start();
	$url = $_SERVER["HTTP_REFERER"];
    $server=@mysql_connect("localhost", "root", "")or die("数据库连接失败！");
    mysql_query("SET NAMES 'UTF8'");
    $dblink=@mysql_select_db("news") or die("选择当前数据库失败！");
    $name=$_POST['name'];
	$password=$_POST['password'];
	$user=$_POST['usertype'];
	if($user=='管理员'){
		$sql1="select admin from admin where admin={$name}";
		$sql2="select apassword from admin where admin={$name}";
		$sql3="select admin_id from admin where admin={$name}";
		$selected=mysql_query($sql1);
	if(mysql_affected_rows()>0){
		$a=mysql_result($selected,0);
		$_SESSION['name']=$a;
	    $selected2=mysql_query($sql2);
	    $b=mysql_result($selected2,0);
		$_SESSION['password']=$b;
		$selected3=mysql_query($sql3);
		$c=mysql_result($selected3,0);
		$_SESSION['user_id']=$c;
		//echo $_SESSION['user_id'];
		if($name==$a&&$password==$b){
			header("Location:../news/myNews/index.php");
		}else{
			echo "<script>alert('用户不存在');window.history.back()</script>";
		}
	}else{
		echo "<script>alert('账号或密码错误');window.history.back()</script>";
	}
	}
	
	else if($user=='普通用户'){
		$sql1="select name from users where name={$name}";
		$sql2="select password from users where name={$name}";
		$sql3="select user_id from users where name={$name}";
		$selected3=mysql_query($sql3);
		@$c=mysql_result($selected3,0);
		$_SESSION['user_id']=$c;
		//echo $_SESSION['user_id'];
		$selected=mysql_query($sql1);
	if(mysql_affected_rows()>0){
		$a=mysql_result($selected,0);
		$_SESSION['name']=$a;
	    $selected2=mysql_query($sql2);
	    $b=mysql_result($selected2,0);
		if($name==$a&&$password==$b){
			header("Location:$url");
		}else{
			echo "<script>alert('用户不存在');window.history.back()</script>";
		}
	}else{
		echo "<script>alert('账号或密码错误');window.history.back()</script>";
	}
	}
	/*if(mysql_affected_rows()>0&&$password==123456){
        echo "<script>window.location='index.php?user_id='.$c.''</script>";
    }else{
        echo "<script>alert('登陆失败');window.history.back()</script>";
    }*/
?>