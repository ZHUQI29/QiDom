<!DOCTYPE html>
<?php
    include_once("is_login.php");
    session_start();
?>
<html lang="en">
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
  <style>
    #content {
      width: 80%;
      margin: 25px 100px;
      background: #fafafa;
    }

    #title {
      font-size: 22px;
      height: 50px;
      line-height: 50px;
    }

    #title h2 {
      text-indent: 20px;
    }

    #title h2 a {
      display: inline-block;
      float: right;
      font-size: 14px;
      padding: 10px;
    }

    #newscontent {
      padding: 20px 100px;
      border-bottom: 1px solid;
    }

    #review {
      padding: 25px 50px;
    }
    #postreview{
      padding:10px;
    }
    #postreview td{
      heigth: 20px;
    }
  </style>
</head>
<body>
<?php header("Content-type:text/html;charset=utf-8");
    $server=@mysql_connect("localhost", "root", "")or die("数据库连接失败！");
    mysql_query("SET NAMES 'UTF8'");
    $dblink=@mysql_select_db("news") or die("选择当前数据库失败！");
	  $newsid=$_GET['news_id'];	
	  //echo '<script>alert('.$newsid.');</script>';
	  $sql="select * from news where  news_id =".$newsid;
	  $rs=mysql_query($sql);
	  while($rows=mysql_fetch_array($rs)){
		  $title = $rows['title'];
		  $content = $rows['content'];
		  $picture = $rows['picture'];
	  }
	  $sql="select * from review where  state='已审核' and news_id =".$newsid;
	  $rs=mysql_query($sql);
	  @$userid=$_SESSION['user_id']; 
?>
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
<div id="content">
  <div id="title">
    <h2>
	<?php 
	echo $title;	
	?>
    </h2>
  </div>
  <div>
    <div>
      <td><img src="myNews/<?php echo  $picture;?>"/></td>
    </div>
    <div id="newscontent">
      <?php
		?>
		echo $content; 
    </div>
	
    <div id="review">
      <h5>显示评论</h5>
      <div id="postreview">
        <table>
		  <?php
			 echo "评论内容：".$row["content"]."<br/>"; 
		    while($row = mysql_fetch_array($rs)){ 
			 echo "日期：".$row["publish_time"]."&nbsp;&nbsp;"; 
			 echo "IP地址：".$row["ip"]."&nbsp;&nbsp;"; 
			 echo "<br/>"; 
			} 
		  ?>
        </table>
      </div>

      <h5>发表评论</h5>
	  <form name="form1" method="post" action="addreview.php">
      <p><textarea rows="9" name="info" cols="35" ></textarea></p>
      <p>
      
        <input type="submit" value="提交" name="B1"/>
        <input type="reset" value="重设" name="B2"/>
      </form>
      </p>
    </div>
  </div>

</div>


<footer>
  <div id="copyright">
    <p>Copyright &copy; 2017.9.12.13.19.29</p>
  </div>
</footer>
</body>
</html>