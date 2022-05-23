<?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "my_db";

$con = @mysqli_connect($sname, $uname, $password, $db_name) OR die(mysqli_connect_error());

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection Failed!";
	exit();
}