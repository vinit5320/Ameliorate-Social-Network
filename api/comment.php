<?php


require('dbconfig.php');

if (!empty($_POST))
{
	$postid = $_POST['postid'];
	$comment_desc = $_POST['comment'];
	$userid = $_POST['username'];
	$timestamp = NOW();
	if($comment_desc != '' && $userid != ''){ 
		$insert = mysql_query("INSERT INTO jaiho_comment (postid,comment,userid,timestamp) VALUES ('$postid','$comment_desc','$userid','$timestamp')") ;
		if($insert){
		$arr = array('error' => 0);
		echo json_encode($arr);
		}
	else
	{
		$arr = array('error' => 1);
		echo json_encode($arr);
	}
	}else{
		$arr = array('error' => 1);
		echo json_encode($arr);
	}
}else {
	$arr = array('error' => 1);
	echo json_encode($arr);
}
?>