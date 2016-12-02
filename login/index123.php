<?php
include 'library.php';
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

    <title>Welcome, <?php echo ucfirst($_SESSION['sessionVar']); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">

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

        function onloadpostretrieve() {
            request = $.ajax({
                url: "api/retrieve.php",
                type: "post",
                data: {
                },
                success: function (data) {
                    document.getElementById("feeds").innerHTML = "<div class='row'><div class='col-md-3'>Image</div><div style='text-align: right; float:right;'><button type='button' class='btn btn-primary feed-action-button' onclick='myfun()'>Share</button></div></div>";
                }
            });
        }

        function share() {
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
         
        
        function action() {
            request = $.ajax({
                url: "api/post.php",
                type: "post",
                data: {
                    username: "abc",
                    description: $('#posttext').val(),
                    type: "Action"
                },
                success: function (data) {
                    alert(data);
                }
            });
        }

        function concern() {
            request = $.ajax({
                url: "api/post.php",
                type: "post",
                data: {
                    username: "abc",
                    description: $('#posttext').val(),
                    type: "Concern"
                },
                success: function (data) {
                    alert(data);
                }
            });
        }

        function help() {
            request = $.ajax({
                url: "api/post.php",
                type: "post",
                data: {
                    username: "abc",
                    description: $('#posttext').val(),
                    type: "Help"
                },
                success: function (data) {
                    document.getElementById("#feeds").innerHTML = "<div class='well'><div class='row'><div class='col-md-3'>Image</div><div style='text-align: right; float:right;'><button type='button' class='btn btn-primary feed-action-button' onclick='myfun()'>Share</button></div></div></div><div class='well'><div class='row'><div class='col-md-3'>Image</div><div style='text-align: right; float:right;'><button type='button' class='btn btn-primary feed-action-button' onclick='myfun()'>Share</button></div></div></div><br><div class='well'><div class='row'><div class='col-md-3'>Image</div><div style='text-align: right; float:right;'><button type='button' class='btn btn-primary feed-action-button' onclick='myfun()'>Share</button></div></div></div>"
                }
            });
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

<body onload="onloadpostretrieve()">

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
                <li><a href= "profile.html">Profile</a></li>
                <li><a href="#contact">Timeline</a></li>
                 <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
        <!--</div>-->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="well ">
        <div class="row">
            <div class="col-md-6">

                   <img src="image.gif" width="105px" height="105px"/>
                </div>
              <div class="col-md-6">

                   <p><?php echo ucfirst($_SESSION['sessionVar']); ?></p>

                </div>
            </div>
            
        
                            </div>
            </div>
            <div class="col-md-9">
                <div id="post-feed">
                    <div class="well">
                        <textarea id="posttext" rows="3" placeholder="Share your deed" style="width: 100%; border: 1px solid lightgray"></textarea>
                        <br />
                        <div class="row" style="margin-top:5px;">
                            <div class="col-md-3">
                                <div style="text-align: left; float:left;">
                                    <button type="button" class="btn btn-default feed-action-button">Location</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div style="text-align: right; float:right;">
                                    <button type="button" class="btn btn-primary feed-action-button" onclick="myfun()" >Share</button>

                                    <!-- Indicates a successful or positive action -->
                                    <button type="button" class="btn btn-success feed-action-button">Action</button>

                                    <!-- Contextual button for informational alert messages -->
                                    <button type="button" class="btn btn-info feed-action-button">Concern</button>

                                    <!-- Indicates caution should be taken with this action -->
                                    <button type="button" class="btn btn-warning feed-action-button">Help</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">Sorter</div>
            <div class="col-md-9">
                <div class ="well">
                <div id="others-feed">
                    <div class ="well" id="feeds">
                                <div class="row">
            <div class="col-md-3">Image</div>
<div style="text-align: right; float:right;">
                                    <button type="button" class="btn btn-primary feed-action-button" onclick="myfun()">Share</button>

                                    <!-- Indicates a successful or positive action -->
                                    <button type="button" class="btn btn-success feed-action-button">Action</button>

                                    <!-- Contextual button for informational alert messages -->
                                    <button type="button" class="btn btn-info feed-action-button">Concern</button>

                                    <!-- Indicates caution should be taken with this action -->
                                    <button type="button" class="btn btn-warning feed-action-button">Help</button>
                                </div>
                                    </div> 
                </div> 
                </div>
                </div>
            </div>
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
