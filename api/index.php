<?php

//Connecting to database
$connect = mysql_connect("localhost:8081", "jayshah", "jayyaj@1");
if(!$connect){
die(mysql_error());
}

//Selecting database
$select_db = mysql_select_db("jaiho", $connect);
if(!$select_db){
die(mysql_error());
}

function registerpost(){
$username = $_POST['username'];
$description = $_POST['description'];
$type = $_POST['type'];
$latitude = 0.00; //Add latitude cordinates
$longitude = 0.00; //Add longitude cordinates
$area = $_POST['area'];
$date = date("m.d.y"); 
$timestamp = NOW();
   
$insert = mysql_query("INSERT INTO posts (userID,description, date,type,latitude,longitude,area,is_deleted,timestamp) VALUES ('$username','$description','$date','$type','$latitude','$longitude','$area','FALSE','$timestamp')") ;
if(!$insert){
die("There's little problem: ".mysql_error());
}
else
{
echo "Post Successful";
}
}

function follow(){
$followed = $_POST['to_follow'];
$followedby = $_POST['follower'];
$timestamp = NOW();
   
$insert = mysql_query("INSERT INTO jaiho_follow (follow_id,follower_id,timestamp) VALUES ('$followed','$followedby','$timestamp')") ;
if(!$insert){
die("There's little problem: ".mysql_error());
}
else
{
echo "Successfully followed";
}

}

function comment(){
$postid = $_POST['postid'];
$comment_desc = $_POST['comment'];
$userid = $_POST['username'];
$timestamp = NOW();
   
$insert = mysql_query("INSERT INTO jaiho_comment (postid,comment,userid,timestamp) VALUES ('$postid','$comment_desc','$userid','$timestamp')") ;
if(!$insert){
die("There's little problem: ".mysql_error());
}
else
{
echo "Successfully Commented";
}

}

function authenticate(){
$username = $_POST['username'];
$password = $_POST['password'];
   
$result = mysql_query("SELECT * from jaiho_user where username like '$username' AND password like '$password'") ;
$num=mysql_numrows($result);


if($num>0){
echo "Login Succesfull";
}
else
{
echo "Login Failed";
}

}

?>