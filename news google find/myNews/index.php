<?php
 header("content-type:text/html;charset=utf8");

?>
<?php 
include_once("functions/is_login.php"); 
session_start(); 
@$user_id =$_SESSION['user_id'];
if($user_id ==0){ 
		echo"<script>alert('请先登录');history.go(-1);</script>"; 
	}
?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新闻发布系统</title>
<link rel="stylesheet" href="style/backstage.css">
</head>

<body>
    <div class="head">
            <div class=" fl"><a href="#"></a></div>
            <h3 class="head_text fr">新闻发布系统</h3>
    </div>
    <div class="operation_user clearfix">
            <div class="link fr">
            <b>欢迎您 ！<?php echo @$_SESSION['name'] ?>
            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="logout.php" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
      	 		<!-- 嵌套网页开始 -->         
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span onclick="show('menu1','change1')" id="change1">+</span>新闻类别管理</h3>
                        <dl id="menu1" style="display:none;">
						    <dd><a href="category_add.php" target="mainFrame">类别添加</a></dd>
                        	<dd><a href="categoryList.php" target="mainFrame">类别列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu2','change2')" id="change2">+</span>新闻管理</h3>
                        <dl id="menu2" style="display:none;">
                        	<dd><a href="news_add.php" target="mainFrame">新闻添加</a></dd>
                            <dd><a href="news_list.php" target="mainFrame">新闻列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span  onclick="show('menu3','change3')" id="change3" >+</span>评论管理</h3>
                        <dl id="menu3" style="display:none;">
                            <dd><a href="review_list.php" target="mainFrame" >评论列表</a></dd>
                           
                        </dl>
                    </li>

                </ul>
            </div>
        </div>

    </div>
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>

</body>
</html>