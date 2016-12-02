<?php


require('dbconfig.php');


if (!empty($_POST))
{
$username = $_POST['username'];
$password = $_POST['password'];
   
$result = mysql_query("SELECT * from jaiho_user where username like '$username' AND password like '$password'") ;
$num=mysql_numrows($result);


if($num>0){

$arr = array('error' => 0);
echo json_encode($arr);
}
else
{

$arr = array('error' => 1);
echo json_encode($arr);
}
}else{

}
?>