<?php include("connect.php");

$result = mysql_query("SELECT * FROM posts ");


while($row = mysql_fetch_array($result))
  {
  echo "<link rel='stylesheet' type='text/css' href='css.css'/> ";
  echo "<p>";
  echo  $row['Post_id'];
  echo  $row['Post_body'];
  echo  "<br>";
  echo "</p>";
  }

?> 