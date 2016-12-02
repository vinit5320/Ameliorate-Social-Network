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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
<link rel="stylesheet" type="text/css" href="mycss.css">
    <title>App to share good deeds</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link href="myscss.css" rel="stylesheet">
	<link href="css.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        function myfun() {
            alert("hey");
            request = $.ajax({
                url: "api/post.php",
                type: "post",
                data: {
                    username: "abc",
                    description: $('#posttext').val(),
                    type: "Share"
                },
                success: function (data) {
                    alert(data);
                }
            });
        }
function sync(){
		var n1=document.getElementById('actualtxt');
		var n2=document.getElementById('actiontxt');
		var n3=document.getElementById('concerntxt');
		var n4=document.getElementById('helptxt');
		n2.value=n1.value;
		n3.value=n1.value;
		n4.value=n1.value;
		}		  
		
    </script>
    <style>
        body {
            padding-top: 50px;
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
        .feed-action-button {
            width: 80px !important;
        }
		
		
    </style>
</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!--<div class="container">-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Jai Ho</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">Profile</a></li>
                <li><a href="#contact">Timeline</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
        <!--</div>-->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="well">
				
                    
               <center>
			     <br> <b><?php echo $mainname; ?></b><br>
                  <?php
                  $rsphone = mysql_query("SELECT phone FROM jaiho_user WHERE username = '$usrname'");
                  while($row= mysql_fetch_array( $rsphone )) 
                  { 
                  echo $row['phone']; 
                  } 

	?><br>
	
	<?php
                  $rsdob = mysql_query("SELECT dob FROM jaiho_user WHERE username = '$usrname'");
                  while($row= mysql_fetch_array( $rsdob )) 
 { 
    echo $row['dob']; 
    echo"<br>";
 } 

	// Close the database connection
	mysql_close();
	?>	
			         <?php
	include("connect.php");
	$q=mysql_query("SELECT * FROM profile_pic");
   while($row=mysql_fetch_assoc($q)){
	
	if($row['image']==""){
	
	echo "<img class='image' width='200' height='200' src='img/default.jpg'>";
	}
	else{
	
	echo"<img width='200px' height='200px' src='img/".$row['image']."'>";
	echo"<br>";
	}
}
?>
<a href='profile_pic.php' >click Here</a>
                </div>
            </div>
            <div class="col-md-9">
                <br><br><br><br><div id="post-feed">
                    <div class="well">
                        
			<textarea name="post" id="actualtxt" onkeyup="sync()" style="width: 100%; " rows="3" maxlength="100"></textarea	>
					
                        <br />
                        <div class="row" style="margin-top:5px;">
                            <div class="col-md-3">
                                <div style="text-align: left; float:left;">
                                    <button type="button" class="btn btn-default feed-action-button">Location</button>
                                </div>
                            </div>
                            <div class="col-md-9">

                                <div style="text-align: right; float:right;">
                                    <form method='POST' action='insert.php'>
									<input type='text' hidden style="width:80px; position:relative; top:10%; left:60%; z-index:-199;" name="type"  value="Action">
									<input type='text' hidden style="width:80px; position:relative; top:10%; left:20%; z-index:-199;"id="actiontxt" name="post2">									
									<button type="submit" id="action" class="btn btn-primary feed-action-button" style="position:absolute; top: 0%; left: 46%;">Action</button>
									</form>
									<form method='POST' action='insert.php'>
									<input type='text' hidden name="type" style="width:80px; position:relative; top:10%; left:70%; z-index:-199" value="Concern">
									<input type='text'  hidden id="concerntxt" style="width:80px; position:relative; top:10%; left:30%; z-index:-199;" name="post2">
									<button type="submit" id="action" class="btn btn-primary feed-action-button" style="position:absolute; top: 0%; left: 60%;">Concern</button>
									</form>
									<form method='POST' action='insert.php'>
									<input type='text' hidden name="type" style="width:80px; position: relative; top:10%; left:70%; z-index:-199" value="Help">
									<input type='text' hidden id="helptxt" style="width:80px; position:relative; top:10%; left:30%; z-index:-199;" name="post2">
									<button type="submit" id="action" class="btn btn-primary feed-action-button" style="position:absolute; top: 0%; left: 74%;">Help</button>
									</form>
                                
								</div>
                            </div>
</div>
                        </div>
                        
                    </div>


            
</div>
</div>

<div class='row'>
<div class='col-md-3'>
<div class='well'>
				
               <br><br><h3><form method="POST" action="index1.php"><input type='text' name="type" hidden value="Deeds"><button type='submit' onclick='deeds()'>Deeds</button></form></h3>
				<br><br><h3><form method="POST" action="index1.php"><input type='text' name="type" hidden value="Action"><button type='submit' >Call For Action</button></form></h3>
					<br><br><h3><form method="POST" action="index1.php"><input type='text' name="type" hidden value="Help"><h3><button type='submit' >Help</button></form></h3>
					<br><br><h3><form method="POST" action="index1.php"><input type='text' name="type" hidden value="Concern"><button type='submit' >Raise A Concern</button></form></h3>
					
<br><br>
        </div></div>
                




<?php
if(isset($_POST['type'])){ $p = $_POST['type']; }
else{

$p='Deeds';
}
if($p=='Action'){
$result = mysql_query("SELECT * FROM posts  WHERE type = 'Action' ORDER BY id DESC");
}
	else if($p=='Help'){
	$result = mysql_query("SELECT * FROM posts  WHERE type = 'Help' ORDER BY id DESC");
	}
		else if($p=='Concern'){
		$result = mysql_query("SELECT * FROM posts  WHERE type = 'Concern' ORDER BY id DESC");
		}
			else{
			$result = mysql_query("SELECT * FROM posts ORDER BY id DESC");
			}

while($row = mysql_fetch_array($result))
  {
	
  if ($row['type'] == 'Action')
									{
									$color= "red";
									}
  if ($row['type'] == 'Concern')
									{
									$color= "blue";
									}
  if ($row['type'] == 'Help')
									{
									$color= "green";
									}
 echo"  <div class='col-md-3'>";
 echo"       </div>"; 
  
echo"<div class='col-md-9'>";
               echo" <div id='post-feed'>";
                    echo"<div class='well'>";
                        
			
                        echo"<br />";
                        echo"<div class='row' style='margin-top:5px;'>";
                          echo"  <div class='col-md-3'>";
   
										echo  "<font color=".$color.">".$row['description']."</font>";
                     echo"       </div>";
                     echo"            <div class='col-md-11'>";
				
								  
                               echo" <div style='text-align: right; float:right;'>";
                                   echo" <button type='button' class='btn btn-primary feed-action-button' onclick='myfun()'>Share</button>";

                                    echo"   <button type='button' class='btn btn-success feed-action-button'>Im in</button>";

                                   
                            echo"    </div>";
                       echo"     </div>";
echo"</div>";
echo"                        </div>";
                        
echo"                    </div>";


            
echo"</div>";
}

?>
 
        
            
            
        </div>
		</div>
   
    <!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
