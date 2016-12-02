<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body  id="backgroundTest">
  <section class="container">
    <div class="login">
      <h1>Fill details to register</h1>
      <form method="post" action="?act=register">
        <p><input type='text' name='name' size='30' placeholder='Full Name'></p>
        <p><input type='text' name='username' size='30' placeholder='Desired Username'></p>
        <p><input type='password' name='password' size='30' placeholder='Password'></p>
        <p><input type='password' name='password_conf' size='30' placeholder='Retype Password'></p>
        <p><input type='text' name='email' size='30' placeholder='Email Address'></p>
        <p><input type='number' name='phone' size='30' placeholder='Contact Number'></p>
         <p><input type='number' name='dob' size='30' placeholder='Date Of Birth'></p>
		<p>CAPTCHA :<img src= 'captcha.php'><input type='text' name='captcha' placeholder="Re-enter CAPTCHA"></p>
        
		<p class="submit"><input type="submit" name="commit" value="Register User"></p>
      </form>
    </div>

    <div class="login-help">
      <p>To Login as an existing user <a href="index.html">click here.</a>.</p>
    </div>
  </section>

  
</body>
</html>

<?php
//This function will display the registration form
function register_form(){

$date = date('D, M, Y');
//echo "<form action='?act=register' method='post'><table><tr><td>"
 //   ."Full Name:</td><td> <input type='text' name='name' size='30'></td></tr>"
//	."<tr><td>Username: </td><td><input type='text' name='username' size='30'></td></tr>"
//    ."<tr><td>Password: </td><td><input type='password' name='password' size='30'></td></tr>"
//    ."<tr><td>Confirm your password: </td><td><input type='password' name='password_conf' size='30'></td></tr>"
//    ."<tr><td>Email: </td><td><input type='text' name='email' size='30'></td></tr>"
//    ."<tr><td>Phone: </td><td><input type='number' name='phone' size='30'></td></tr>"
//    ."<tr><td>Date Of Birth: </td><td><input type='number' name='dob' size='30'></td></tr>"
//    ."<tr><td><img src= 'captcha.php'> </td><td> <input type='text' name='captcha'></td></tr></table><br>* Enter the Captcha too validate.<br>"
//    ."<input type='hidden' name='date' value='$date'>"
 //   ."<input type='submit' value='Register'>"
  //  ."</form>";

}

//This function will register users data
function register(){

//Connecting to database
$connect = mysql_connect("localhost", "root", "");
if(!$connect){
die(mysql_error());
}

//Selecting database
$select_db = mysql_select_db("jaiho", $connect);
if(!$select_db){
die(mysql_error());
}

//Collecting info
$name = $_REQUEST['name'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$pass_conf = $_REQUEST['password_conf'];
$email = $_REQUEST['email'];

$guess = $_POST['captcha'];
$phone= $_REQUEST['phone'];
$dob=$_REQUEST['dob'];

//Here we will check do we have all inputs filled

if(empty($username)){
die("Please enter your username!<br>");
}

if(empty($password)){
die("Please enter your password!<br>");
}

if(empty($pass_conf)){
die("Please confirm your password!<br>");
}

if(empty($email)){
die("Please enter your email!");
}

if(empty($dob)){
die("Please enter your Date of Birth!");
}

$real = (isset($_SESSION['real'])) ? $_SESSION['real'] : "";


if (empty($guess))
{ 
    die("Please enter the correct CAPTCHA.<br>");
} 
/*if ($real != $guess){
    die("things are bad");
}
if (!empty($guess) && $guess !== $real)
{
    die("Please enter the correct CAPTCHA.<br>");
}*/

//Let's check if this username is already in use

$user_check = mysql_query("SELECT username FROM users WHERE username='$username'");
$do_user_check = mysql_num_rows($user_check);

//Now if email is already in use

$email_check = mysql_query("SELECT email_address FROM users WHERE email_address='$email'");
$do_email_check = mysql_num_rows($email_check);

//Now display errors

if($do_user_check > 0){
die("Username is already in use!<br>");
}

if($do_email_check > 0){
die("Email is already in use!");
}

//Now let's check does passwords match

if($password != $pass_conf){
die("Passwords don't match!");
}


//If everything is okay let's register this user

$insert = mysql_query("INSERT INTO jaiho_user (name,dob,username,password,email,phone) VALUES ('$name','$dob','$username','$password','$email','$phone')");
if(!$insert){
die("There's little problem: ".mysql_error());
}
else
{

header("location:thanks.php?name=$name&username=$username");

}

}
$act = isset($_GET['act']) ? $_GET['act'] : '';
switch($act){

default;
register_form();
break;

case "register";
register();
break;


}
 
?> 