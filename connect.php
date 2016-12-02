<?php
$host = "localhost";
$db_user = "root";
$db_pass="";
$db_name = "jaiho";

$db = mysql_connect($host,$db_user,$db_pass);
if($db) {
  $select_db= mysql_select_db($db_name);
  if($select_db){

	}

}
else {
echo"connection failed";
}
?>
