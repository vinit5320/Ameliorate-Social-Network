<?php
include("connect.php");
echo "its working";
$i=$_POST['id'];
echo $i;
$p=mysql_query("SELECT * FROM posts WHERE id='$i'");
while($row=mysql_fetch_assoc($p)){
$count=$row['im_in'];
echo $row['description'];
}
echo $count;
$count=$count+1;
echo $count;
$q=mysql_query("UPDATE posts SET im_in='$count' where id='$i' ");
header('location:index1.php');
?>
