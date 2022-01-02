<?php
include_once("is_login.php");
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
	<title>新闻发布系统</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel=stylesheet href="css/style1.css">
	<link rel="stylesheet" href="css/responsiveslides.css" />
	<link rel="stylesheet" href="css/responsive.css">
	<link href='./images/favicon.ico' rel='icon' type='image/x-icon'/>
	<script src="js/jquery.min.js"></script>
	<script src="js/responsiveslides.js"></script>
	<script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        pager: true,
        nav: true,
        speed: 500,
        maxwidth: 960,
        namespace: "centered-btns"
      });
      $("#log_in a").click(function() {
	      	$(".box_lg").show();
	    });
      $("#ljzc").click(function() {
	      	$(".box_zc").show();
	    });
      $("#ljdl").click(function() {
	      	$(".box_lg").show();
	    });
    });
    </script>

</head>
<body>
<div class="box_lg">
		<div class="box_tit">
			<a href="" class="close">x</a>
			<H3>登录账号</H3>
		</div>
		<div class="box_con">
			<form action="login.php" method="post">
				<p>
					<select name="usertype">
						<option value="普通用户">普通用户</option>
						<option value="管理员">管理员</option>
					</select>
				</p>
				<p>
					用户名：<input type="text" name="name" size="11"/><br/>
				</p>
				<p>
					密 码 ：<input type="password" name="password" size="11"/><br/>
				</p>
				<p class="log">
					<input type="submit" name="login" value="登录">
				</p>
				<span>
					<a href="#" id="ljzc">立即注册</a>
				</span>
			</form>
		</div>
	</div>
	<div class="box_zc">
		<div class="box_tit">
			<a href="" class="close">x</a>
			<H3>注册账号</H3>
		</div>
		<div class="box_con">
			<form action="adduser.php" method="post">
				<p>
					用户名：<input type="text" name="name" size="11"/><br/>
				</p>
				<p>
					密 码 ：<input type="password" name="password" size="11"/><br/>
				</p>
				<p>
					确认密码：<input type="password" name="repassword" size="11"/><br/>
				</p>
				<p class="zc">
					<input type="submit" name="zhuce" value="注册">
				</p>
				<span>
					<a href="#" id="ljdl">立即登录</a>
				</span>
			</form>
		</div>
	</div>
	<header>
		<div class="zerogrid">
			<div class="row">
				<div class="col05">
					<div id="logo"><a href=""><img src="./images/logo.png"/></a></div>
				</div>
				<div class="col06 offset05">
				    <div id='search-box'>
					  <form action='find.php' id='search-form' method='get' target='_top'>
						<input id='search-text' name='find' placeholder='type here' type='text'/>
						<button id='search-button' type='submit'><span>Search</span></button>
					  </form>
					</div>
				</div>
			</div>
		</div>
	</header>

	<nav>
		<ul>
			<li><a href="index.php#yule">娱乐</a></li>
			<li><a href="index.php#tiyu">体育</a></li>
			<li><a href="index.php#shizheng">时政</a></li>
			<li><a href="index.php#shehui">社会</a></li>
			<li><a href="index.php#jingji">经济</a></li>
			<li id="log_in">
				<?php
				if(is_login()){
     				echo "<a href='logout.php'>欢迎".$_SESSION['name']."访问系统!&nbsp;&nbsp;&nbsp;&nbsp;注销</a>";
     			}else{
     				echo "<a href='#'>登录</a>";
     			}
				?>
			</li>

		</ul>

	</nav>
<center>
<table width="650" border="1">
<?php
    $server=@mysql_connect("localhost", "root", "")or die("数据库连接失败！");
    mysql_query("SET NAMES 'UTF8'");
    $dblink=@mysql_select_db("news") or die("选择当前数据库失败！");
	@$find=$_GET['find'];
	$sql1="select title from news where title like '%{$find}%'";
	$finded=mysql_query($sql1);
	/*if(mysql_affected_rows()>0){
		echo "查询成功";
	}
	else{
		echo "查询失败";
	}*/
	$rows=mysql_num_rows($finded);
	$fnum=8;
		$pagenum=ceil($rows/$fnum); 
		@$tmp=$_GET['page'];
		if($tmp>$pagenum)  
            echo "<script>window.location.href='index.php'</script>";
		if($tmp==""){
            $num=0;
        }
		else{  
            $num=($tmp-1)*$fnum;  
        }
		$sql="select * from news where title like '%{$find}%' order by news_id limit {$num} , $fnum";
		//echo $sql;
		$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)) {
		    $sqls="select name from category where category_id={$row['category_id']}";
			$selected=mysql_query($sqls);
			$a=mysql_result($selected,0);
			$b=$row['news_id'];
            echo "<tr>";
            echo "<td style='color:white;'>{$a}</td>";
            echo "<td style='color:white;'><a href=content.php?news_id=$b style='color:white;'>{$row['title']}</td>";
            echo "</tr>";
        }
		echo "<td colspan='2' align='center'>";
		$a=1;
		echo "<a href=find.php?page=".$a." style='color:white;'>首页</a>&nbsp;&nbsp";
		for($i=0;$i<$pagenum;$i++){
            echo "<a href=find.php?page=".($i+1)." style='color:white;'>".($i+1)."</a>&nbsp;&nbsp";
        }
		echo "<a href=find.php?page=".$pagenum." style='color:white;'>尾页</a>";
		echo "</td>";
?>
</table>
</center>
</body>
</html>