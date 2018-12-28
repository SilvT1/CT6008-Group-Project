<?php
/* Database connection settings */
$hostname="";
$username="";
$password="";
$dbname="";

$usertable="";
$usertable2="";
$usertable3="";
$usertable4="";

$designer_email = "";
$designer_password = "";
$designer_picture = "";
$designer_id = "";
$designer_name = "";



$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
