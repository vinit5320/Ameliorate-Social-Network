<?php
session_start();
$connect = mysql_connect("localhost", "root", "");
if(!$connect){
die(mysql_error());
}

//Selecting database
$select_db = mysql_select_db("jaiho", $connect);
if(!$select_db){
die(mysql_error());
}

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$database="jaiho";
 
$tbl_name="jaiho_user"; // Table name 



// Connect to server and select databse.
 //mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
 //mysql_select_db("$db_name")or die("cannot select DB");

$connect = mysql_connect("localhost", "root", "");

//Selecting database
$connect = mysql_connect("localhost", "root", "");

?>