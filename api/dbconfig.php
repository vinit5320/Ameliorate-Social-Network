<?php 

//Connecting to database
$connect = mysql_connect("localhost", "root", "");
if(!$connect){
die(mysql_error());
}

//Selecting database
$select_db = mysql_select_db("jaiho", $connect);
if(!$select_db){
die(mysql_error());
}
?>