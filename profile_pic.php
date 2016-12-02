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

if(isset($_POST['submit'])){
  move_uploaded_file($_FILES['file']['tmp_name'],"img/".$_FILES['file']['name']);
  $q=mysql_query("UPDATE profile_pic SET image = '".$_FILES['file']['name']."'WHERE username = '".$_SESSION['sessionVar']."'");


}
?>
<html>
<head>

  <script>
  function confirm() {
    location.href="profile.php";
  }

  </script>


</head>
<body>
  <center>
    ADD ONLY JPG FILES
    <br>
    <form action=""  method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <input type="submit" name="submit">
      <?php
      $p=mysql_query("SELECT * FROM profile_pic");
      while($row=mysql_fetch_assoc($p)){
        if($row['username']== $_SESSION['sessionVar']){


          if($row['image']!="")
          {
            echo "<input type='submit' name='submit' value='default'>";
          }
        }
      }
      ?>

    </form>
    <button name="confirm" onclick="confirm()">confrirm</button>
    <br>
    <?php


    $q=mysql_query("SELECT * FROM profile_pic");
    while($row=mysql_fetch_assoc($q)){
      if($row['username']== $_SESSION['sessionVar']){


        if($row['image']==""){

          echo "<img width='500' height='500' src='img/default.jpg'>";

        }
        else{

          echo"<img width='500' height='500' src='img/".$row['image']."'>";
          echo"<br>";


        }

      }
    }
    ?>
    <br>

  </center>
</body>
</html>
