<?php


require('dbconfig.php');


if (!empty($_POST))
{

$username = $_POST['username'];
$description = $_POST['description'];
$type = $_POST['type'];
$latitude = 0.00; //Add latitude cordinates
$longitude = 0.00; //Add longitude cordinates
$area = "avd";
$date = date("m.d.y"); 
$timestamp = '';
   
if($username != '' && $description != '' && $type != '')
{   
$insert = mysql_query("INSERT INTO posts (userID,description, date,type,latitude,longitude,area,is_deleted,timestamp) VALUES ('$username','$description','$date','$type','$latitude','$longitude','$area','FALSE','$timestamp')") ;
if($insert){
$arr = array('error' => 0);
echo json_encode($arr);
}
else
{
$arr = array('error' => 1, 'error_message' => 'Inserting in database failed');
echo json_encode($arr);
}
}else{
$arr = array('error' => 1, 'error_message' => 'No post request found');
echo json_encode($arr);

}
}else{
$arr = array('error' => 1, 'error_message' => 'No post request found');
echo json_encode($arr);
}

?>