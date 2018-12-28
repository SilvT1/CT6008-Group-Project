<?php
session_start();
    
	$inputDesignerId = $_SESSION['_id'];
    $inputName = $_GET['name_field']; 
    $inputContactNumber = $_GET['contact_number_field'];
	$inputEmail = $_GET['email_field']; 
    $inputPortfolioLink = $_GET['portfolio_field'];
	$inputMiniBio = $_GET['bio_field'];
	//Sample Database Connection Syntax for PHP and MySQL.
	
	//Connect To Database
	
	$hostname="localhost";
	$username="";
	$password="";
	$dbname="";
	$usertable="";
	$designer_email = "";
	$designer_password = "";
	$designer_id = "";
	$designer_name = "";
	
	
	$connection = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
	mysqli_select_db($connection, $dbname);
	
	if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


	# Check If Record Exists
	
	$sql = "UPDATE $usertable SET name='$inputName', phone_number='$inputContactNumber', email='$inputEmail', 
	portfolio_link='$inputPortfolioLink', mini_bio='$inputMiniBio'  WHERE designer_id='$inputDesignerId'";


if (mysqli_query($connection, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($connection);
?>
