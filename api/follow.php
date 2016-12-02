<?php

require('dbconfig.php');



if (!empty($_POST))
{
	$followed = $_POST['to_follow'];
	$followedby = $_POST['follower'];
	$timestamp = NOW();
   
	$insert = mysql_query("INSERT INTO jaiho_follow (follow_id,follower_id,timestamp) VALUES ('$followed','$followedby','$timestamp')") ;
	if($insert){
		$arr = array('error' => 0);
		echo json_encode($arr);
	}
	else
	{
		$arr = array('error' => 1);
		echo json_encode($arr);
	}
}else {
	$arr = array('error' => 1);
	echo json_encode($arr);
}
?>