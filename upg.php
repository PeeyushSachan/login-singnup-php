<?php


session_start();


 $gender=$_POST["gender"];

 $name=$_POST["name"];

 require('dbcon.php');
if(isset($_FILES['photo']))
{

$targetdir="uploads/";
$targetFile=$targetdir.basename($_FILES["photo"]["name"]);

if(move_uploaded_file($_FILES["photo"]["tmp_name"],$targetFile))

{
    require('dbcon.php');
}
$semail=  $_SESSION['email'];


$sql="update login set photo='$targetFile', gender='$gender',name='$name' where email='$semail' ";

mysqli_query($con,$sql );

header('location:upgrade.php');

$_SESSION['upgrade']="updated sucessful";



}









?>