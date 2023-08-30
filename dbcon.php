<?php



$host='localhost';
$user='root';
$pass='';
$database='db1';

$con=mysqli_connect($host,$user,$pass,$database);

if(!$con)
{

    mysqli_connect_error();
}






?>