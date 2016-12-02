<?php
include 'library.php';
$connect = mysql_connect("localhost", "root", "");
if(!$connect){
  die(mysql_error());
}

//Selecting database
$select_db = mysql_select_db("jaiho", $connect);
if(!$select_db){
  die(mysql_error());
}
$usrname= $_SESSION['sessionVar'];
$rsdob = mysql_query("SELECT name FROM jaiho_user WHERE username = '$usrname'");
while($row= mysql_fetch_array( $rsdob ))
{
  $mainname= $row['name'];
}
?>
<?php

include("connect.php");

echo $mainname;
$post = $_POST['post2'];
$drop = $_POST['type'];
echo "post".$post;
echo "drop".$drop;
if($post!=NULL&& $post!=" "){
  $sql = "INSERT INTO posts(description) VALUES ('$post')";
}else{

  header('location:index1.php');

}
if (!mysql_query($sql)){
}
else{
  $sql2 = mysql_query("UPDATE posts SET type = '$drop' WHERE description LIKE '$post'");
  $sql3 = mysql_query("UPDATE posts SET userID = '$usrname' WHERE description LIKE '$post'");
  $sql4 = mysql_query("UPDATE posts SET name = '$mainname' WHERE description LIKE '$post'");

  header('location:index1.php');

}




?>
