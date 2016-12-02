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
<link rel="stylesheet" type="text/css" href="btn.css">
    
     <title>Welcome, <?php echo $mainname; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link href="btn.css" rel="stylesheet">
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
		.feed-action-button2 {
            width: 120px !important;
        }
    </style>
</head>

<body class="body">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!--<div class="container">-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="ame_logo.jpg" height="50px" width="200px">
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
			<li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
                <li><a href="index1.php">Home</a></li>
                <li class='active'><a href="profile.php">Profile</a></li>
                <li><a href="#contact">Timeline</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
        <!--</div>-->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    
               <center> <?php
	include("connect.php");
	$q=mysql_query("SELECT * FROM profile_pic WHERE username like '$_SESSION[sessionVar]'");
   while($row=mysql_fetch_assoc($q)){
	
	if($row['image']==""){
	
	echo "<img class='image' width='400' height='400' src='img/default.jpg'>";
	}
	else{
	
	echo"<img width='400px' height='400px' src='img/".$row['image']."'>";
	
	}
}
?>     
<br>
<a href='profile_pic.php' >Click Here To Change The Profile Picture</a>
	
                </div>
            </div>
            <div class="col-md-12">
                <br><div id="post-feed">
                    <div class="well">
					<b><font size='5'>
					<center>
					Name : <? echo $mainname;
					?>
					
					<br>
				<!-- DATE OF BIRTH-->	Date Of Birth : <?php
                  $rsdob = mysql_query("SELECT dob FROM jaiho_user WHERE username = '$usrname'");
                  while($row= mysql_fetch_array( $rsdob )) 
                 { echo $row['dob']; 
				  echo"<br>";
                  } 	?>
				  <!-- DATE OF BIRTH-->	Mobile Number : <?php
                  $rsdob = mysql_query("SELECT phone FROM jaiho_user WHERE username = '$usrname'");
                  while($row= mysql_fetch_array( $rsdob )) 
                 { echo $row['phone']; 
				  
                  } 	?>
				 </center> 
				 </font>
				 </b>
                     
			  <br />
                        <div class="row" style="margin-top:5px;">
                            <div class="col-md-3">
                                <div style="text-align: left; float:left;">
                                   
                                </div>
                            </div>
                            <div class="col-md-9">

                                <div style="text-align: right; float:right;">
                                   
                               
								</div>
                            </div>
</div>
                        </div>
                        
                    </div>


            
</div>
</div><div class="row">
<div class="col-md-3"><div class="well">
                   	SORTER
             <br><br><h3><form method="POST" action="profile.php"><input type='text' name="type" hidden value="Deeds"><button type='submit' class='btn btn-info feed-action-button2'>All</button></form></h3>
				<br><br><h3><form method="POST" action="profile.php"><input type='text' name="type" hidden value="Action"><button width='200px' type='submit' class='btn btn-warning feed-action-button2'>Call For Action</button></form></h3>
				<br><br><h3><form method="POST" action="profile.php"><input type='text' name="type" hidden value="Concern"><button type='submit'class='btn btn-success feed-action-button2' >Raise A Concern</button></form></h3>
<br><br>
                </div></div>
                

<?php

if(isset($_POST['type'])){ $p = $_POST['type']; }
else{

$p='Deeds';
}
if($p=='Action'){
$result = mysql_query("SELECT * FROM posts  WHERE type = 'Action' AND userID = '$usrname' ORDER BY id DESC");
}
	else if($p=='Help'){
	$result = mysql_query("SELECT * FROM posts  WHERE type = 'Share' AND userID = '$usrname' ORDER BY id DESC");
	}
		else if($p=='Concern'){
		$result = mysql_query("SELECT * FROM posts  WHERE type = 'Concern' AND userID = '$usrname' ORDER BY id DESC");
		}
			else{
			$result = mysql_query("SELECT * FROM posts WHERE userID = '$usrname' ORDER BY id DESC");
			}

while($row = mysql_fetch_array($result))
  {
  if ($row['type'] == 'Action')
									{
									$color= "orange";
									}
  if ($row['type'] == 'Concern')
									{
									$color= "green";
									}
  if ($row['type'] == 'Share')
									{
									$color= "blue";
									}
 echo"  <div class='col-md-3'>";
 echo"       </div>"; 
  
echo"<div class='col-md-9'>";
               echo" <div id='post-feed'>";
                    echo"<div class='well'>";
                        
			
                        echo"<br />";
                        echo"<div class='row' style='margin-top:5px;'>";
                          echo"  <div class='col-md-3'>";
									echo "<font size=4><b>".$row['name']."</b></font>";
									echo "<br>";
									echo $row['timestamp'];
									
									
									
                     echo"       </div>";
                     echo"            <div class='col-md-11'>";
				echo  "<font size=4 color=".$color.">".$row['description']."</font>";
								  
                               echo" <div style='text-align: right; float:right;'>";
                                   echo" <button type='button' class='btn btn-primary feed-action-button' onclick='myfun()'>Share</button>";


                                   
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
