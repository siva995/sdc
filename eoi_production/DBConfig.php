<?php
$con = mysqli_connect("localhost","root","siva");
if(!$con){
    die('oops connection problem ! --> '.mysqli_error());
}
$db = mysqli_select_db($con,"eoi");
if(!$db){
    die('oops database selection problem ! --> '.mysqli_error());
}
?>
