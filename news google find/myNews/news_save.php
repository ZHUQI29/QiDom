
<?php
 header("content-type:text/html;charset=utf8");
?>
<?php 
include_once("functions/file_system.php"); 
if(empty($_POST)){ 
     $message = "上传的文件超过了php.ini中post_max_size选项限制的值"; 
	 echo "<h2>保存失败!</h2>";
}else{ 
     $user_id = 1; 
     $category_id = $_POST["category_id"]; 
     $title = $_POST["title"]; 
     $content = $_POST["content"]; 
	 $pic = $_POST["picture"];
     $currentDate =  date("Y-m-d H:i:s"); 
     $clicked = 0; 
     $file_name = $_FILES["news_file"]["name"]; 
     $message = upload($_FILES["news_file"],"uploads"); 
     $sql = "insert into news values(null,$user_id,$category_id,'$title','$pic','$content', '$currentDate',$clicked,'$file_name')"; 
     if($message=="文件上传成功！"||$message=="没有选择上传附件！"){ 
     		include_once("functions/database.php"); 
     		get_connection(); 
     		mysql_query($sql); 
     		close_connection();		 
     }	 
} 
$message = urlencode($message);
//
echo "<h2>保存成功!</h2>";
//header("Location:news_list.php&message=$message");  
?>