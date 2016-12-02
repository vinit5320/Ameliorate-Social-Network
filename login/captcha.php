<?php
session_start();
//random string generator function
function random($length){
//create a or array string called chars
        $chars ="abcdefghijklmnopqrstuvwxyz23456789";
         $str = "";
        //is the variable which is equal to the length of the string called chars
        $size = strlen($chars);
        for($i=0; $i<$length; $i++){
             $str .= $chars[rand(0, $size-1)];

    }
    return $str;
}
//the gd image adaptor in xampp
$cap = random(7);
$_SESSION['real'] = $cap;
$image = imagecreate(100, 20);
$background = imagecolorallocate($image, 0, 0, 0);
$foreground = imagecolorallocate($image, 255, 255, 255);
//this is going to write our string in the image
imagestring($image, 5,5,1,$cap,$foreground);
header("Content-type: image/jpeg");
imagejpeg($image);
?>