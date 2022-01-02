
<!DOCTYPE html>
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
	  $(".content p").nextAll().css('display','none');
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
			<li><a href="#yule">娱乐</a></li>
			<li><a href="#tiyu">体育</a></li>
			<li><a href="#shizheng">时政</a></li>
			<li><a href="#shehui">社会</a></li>
			<li><a href="#jingji">经济</a></li>
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

	<section id="content">
		<div class="zerogrid">
			<div class="row block">
<!-- ---------------------轮播图--------- -->
				<div class="featured col16">
					<div class="rslides_container">
						<ul class="rslides" id="slider">
							<?php
								$sql= "select * from news where category_id=1";
								$newsRes = mysql_query($sql);
								if($news = mysql_fetch_array($newsRes)){
							    	echo"<li><a href='content.php?news_id=".$news[0]."'><img src='myNews/".$news[4]."'/></a></li>";
								}
							?>
							<?php
								$sql= "select * from news where category_id=2";
								$newsRes = mysql_query($sql);
								if($news = mysql_fetch_array($newsRes)){
							    	echo"<li><a href='content.php?news_id=".$news[0]."'><img src='myNews/".$news[4]."'/></a></li>";
								}
							?>
							<?php
								$sql= "select * from news where category_id=3";
								$newsRes = mysql_query($sql);
								if($news = mysql_fetch_array($newsRes)){
							    	echo"<li><a href='content.php?news_id=".$news[0]."'><img src='myNews/".$news[4]."'/></a></li>";
								}
							?>
							<?php
								$sql= "select * from news where category_id=4";
								$newsRes = mysql_query($sql);
								if($news = mysql_fetch_array($newsRes)){
							    	echo"<li><a href='content.php?news_id=".$news[0]."'><img src='myNews/".$news[4]."'/></a></li>";
								}
							?>
							<?php
								$sql= "select * from news where category_id=5";
								$newsRes = mysql_query($sql);
								if($news = mysql_fetch_array($newsRes)){
							    	echo"<li><a href='content.php?news_id=".$news[0]."'><img src='myNews/".$news[4]."'/></a></li>";
								}
							?>
						</ul>
					</div>
				</div>
<!-- ---------------------左侧------------------------- -->
				<div class="sidebar col05">
					<section>
						<div id="yule" class="heading">娱乐</div>
						<div class="content">
							<ul class="list">
								<?php
								$sql= "select * from news where category_id=1";
								$newsRes = mysql_query($sql);
								while($news = mysql_fetch_array($newsRes)){
							    	echo"<li><a href='content.php?news_id=".$news[0]."'>$news[3]</a></li>";
								}
								?>
							</ul>
						</div>
					</section>
					<section>
						<div id="tiyu" class="heading">体育</div>
						<div class="content">
							<ul class="list">
								<?php
								$sql= "select * from news where category_id=2";
								$newsRes = mysql_query($sql);
								while($news = mysql_fetch_array($newsRes)){
							    	echo"<li><a href='content.php?news_id=".$news[0]."'>$news[3]</a></li>";
								}
								?>
							</ul>
						</div>
					</section>
					<section>
						<div id="shizheng" class="heading">时政</div>
						<div class="content">
						<ul class="list">
								<?php
								$sql= "select * from news where category_id=3";
								$newsRes = mysql_query($sql);
								while($news = mysql_fetch_array($newsRes)){
							    	echo"<li><a href='content.php?news_id=".$news[0]."'>$news[3]</a></li>";
								}
								?>
							</ul>
						</div>
					</section>
					<section>
						<div id="shehui" class="heading">社会</div>
						<div class="content">
							<ul class="list">
								<?php
								$sql= "select * from news where category_id=4";
								$newsRes = mysql_query($sql);
								while($news = mysql_fetch_array($newsRes)){
							    	echo"<li><a href='content.php?news_id=".$news[0]."'>$news[3]</a></li>";
								}
								?>
							</ul>
						</div>
					</section>
					<section>
						<div id="jingji" class="heading">经济</div>
						<div class="content">
							<ul class="list">
								<?php
								$sql= "select * from news where category_id=5";
								$newsRes = mysql_query($sql);
								while($news = mysql_fetch_array($newsRes)){
							    	echo"<li><a href='content.php?news_id=".$news[0]."'>$news[3]</a></li>";
								}
								?>
							</ul>
						</div>
					</section>
				</div>
<!-- --------------------文章---------------------- -->
				<div class="main-content col11">
					<article>
						<?php
							$sql= "select * from news where category_id=1";
							$newsRes = mysql_query($sql);
							if($news = mysql_fetch_array($newsRes)){
						    	echo"<div class='heading'><h2>".$news[3]."</h2>
							<p class='info'>+ Posted by ".$news[1]." -".$news[6]." - ".$news[7]."Clicked</p></div>
							<div class='content'><img src='myNews/".$news[4]."'/><p>".$news[5]."</p></div>
							<div class='footer'><p class='more'><a class='button' href='content.php?news_id=".$news[0]."'>Read more >></a></p>";
							}
						?>
					</article>
					<article>
						<?php
							$sql= "select * from news where category_id=2";
							$newsRes = mysql_query($sql);
							if($news = mysql_fetch_array($newsRes)){
						    	echo"<div class='heading'><h2>".$news[3]."</h2>
							<p class='info'>+ Posted by ".$news[1]." -".$news[6]." - ".$news[7]."Clicked</p></div><div class='content'><img src='myNews/".$news[4]."'/><p>".$news[5]."</p></div><div class='footer'><p class='more'><a class='button' href='content.php?news_id=".$news[0]."'>Read more >></a></p>";
							}
						?>
					</article>
					<article>
						<?php
							$sql= "select * from news where category_id=3";
							$newsRes = mysql_query($sql);
							if($news = mysql_fetch_array($newsRes)){
						    	echo"<div class='heading'><h2>".$news[3]."</h2>
							<p class='info'>+ Posted by ".$news[1]." -".$news[6]." - ".$news[7]."Clicked</p></div><div class='content'><img src='myNews/".$news[4]."'/><p>".$news[5]."</p></div><div class='footer'><p class='more'><a class='button' href='content.php?news_id=".$news[0]."'>Read more >></a></p>";
							}
						?>
					</article>
					<article>
						<?php
							$sql= "select * from news where category_id=4";
							$newsRes = mysql_query($sql);
							if($news = mysql_fetch_array($newsRes)){
						    	echo"<div class='heading'><h2>".$news[3]."</h2>
							<p class='info'>+ Posted by ".$news[1]." -".$news[6]." - ".$news[7]."Clicked</p></div><div class='content'><img src='myNews/".$news[4]."'/><p>".$news[5]."</p></div><div class='footer'><p class='more'><a class='button' href='content.php?news_id=".$news[0]."'>Read more >></a></p>";
							}
						?>
					</article>
					<article>
						<?php
							$sql= "select * from news where category_id=5";
							$newsRes = mysql_query($sql);
							if($news = mysql_fetch_array($newsRes)){
						    	echo"<div class='heading'><h2>".$news[3]."</h2>
							<p class='info'>+ Posted by ".$news[1]." -".$news[6]." - ".$news[7]."Clicked</p></div><div class='content'><img src='myNews/".$news[4]."'/><p>".$news[5]."</p></div><div class='footer'><p class='more'><a class='button' href='content.php?news_id=".$news[0]."'>Read more >></a></p>";
							}
						?>
					</article>
				</div>

			</div>
		</div>
	</section>

	<footer>
		<div class="zerogrid">
			<div class="row">
				<div id="copyright">
					<p>Copyright &copy; 2017.9.12.13.19.29</p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>