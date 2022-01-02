<?php
    include_once("is_login.php");
    session_start();
?>
<?php
	$url = $_SERVER["HTTP_REFERER"]; 
    header("Content-type:text/html;charset=utf-8");
    $server=@mysql_connect("localhost", "root", "")or die("数据库连接失败！");
    mysql_query("SET NAMES 'UTF8'");
    $dblink=@mysql_select_db("news") or die("选择当前数据库失败！");
    $news_id = substr($url,-1);
	@$user_id =$_SESSION['user_id'];
	//echo $user_id;
	if($user_id ==0){ 
		echo"<script>alert('请您登录系统后，再进行评论！');history.go(-1);</script>"; 
	}
	else{
		$review=$_POST['info'];	
        //echo '<script>alert('.$review.');</script>';
		ini_set('date.timezone','Asia/Shanghai');
	    $currentDate = date("Y-m-d H:i:s"); 
		$ip = $_SERVER["REMOTE_ADDR"];
		$state = "未审核"; 
		$sql = "insert into review values(null,$user_id,$news_id,'$review','$currentDate','$state','$ip')"; 
		mysql_query($sql); 
		echo"<script>alert('评论成功，待审核！');window.history.back();</script>";
	}
?>