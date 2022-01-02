<?php
 header("content-type:text/html;charset=utf8");
?>
<?php 
include_once("functions/is_login.php"); 
session_start(); 
?> 
<form action="category_save.php" method="post" enctype="multipart/form-data"> 
类别：	<input type="text"  size="20" name="category"><br/> 

<input type="submit" value="提交"><input type="reset" value="重置"> 
</form> 