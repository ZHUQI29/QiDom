﻿<?php
 header("content-type:text/html;charset=utf8");
?>

<?php 
include_once("functions/database.php"); 
include_once("functions/page.php"); 

//构造查询所有新闻的SQL语句 
$search_sql = "select * from category order by category_id desc"; 

?> 

<table> 
<?php 
get_connection(); 
//分页的实现 
$result_news = mysql_query($search_sql); 
$total_records = mysql_num_rows($result_news); 
$page_size = 5; 
if(isset($_GET["page_current"])){ 
     $page_current = $_GET["page_current"]; 
}else{ 
     $page_current=1; 
} 
$start = ($page_current-1)*$page_size; 
$search_sql = "select * from category order by category_id desc limit $start,$page_size"; 

$result_set = mysql_query($search_sql); 
close_connection(); 
if(mysql_num_rows($result_set)==0){ 
     exit("暂无记录！"); 
} 
while($row = mysql_fetch_array($result_set)){ 
?> 
<tr> 
<td> 
     <?php echo $row['name'] ?>
</td>


<td> 
     <a href="category_edit.php?category_id=<?php echo $row['category_id']?>">编辑</a> 
</td> 
<td> 
     <a href="category_delete.php?category_id=<?php echo $row['category_id']?>" onclick="return confirm('确定删除吗？');">删除</a> 
</td> 

</tr> 
<?php 
} 
?> 
</table> 
<?php 
//打印分页导航条
$url = $_SERVER["PHP_SELF"]; 
page($total_records,$page_size,$page_current,$url,""); 
?> 