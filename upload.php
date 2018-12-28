<?php
session_start();

$inputDesignerId = $_SESSION['_id'];
$inputHeroTitle = $_POST['product_title_field']; 

$hostname="localhost";
$username="";
$password="";
$dbname="";
$usertable="";
$usertable2="";
$usertable3="";
$designer_email = "";
$designer_password = "";
$designer_picture = "";



$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}




$msg2 = "";
if (isset($_POST['upload_slide'])) {
  	// Get image name
  	$image1 = $_FILES['image1']['name'];
  	$image2 = $_FILES['image2']['name'];
  	$image3 = $_FILES['image3']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

  	// image file directory
  	$target1 = "Images/$designer_id/".basename($image1);
  	$target2 = "Images/$designer_id/".basename($image2);
  	$target3 = "Images/$designer_id/".basename($image3);
  	
  	$image1Directory = "Images/$designer_id/$image1";
  	$image2Directory = "Images/$designer_id/$image2";
  	$image3Directory = "Images/$designer_id/$image3";
  	
  	
  	$product_Text_1 = $_POST['text1'];
  	$product_Text_2 = $_POST['text2'];
  	$product_Text_3 = $_POST['text3'];
  	
  	
  	$inputElement1Conent = $product_Text_1; 
  	if ( empty($product_Text_1) ) $inputElement1Conent = $image1Directory;
  	
  	$inputElement2Conent = $product_Text_2; 
  	if ( empty($product_Text_2) ) $inputElement2Conent = $image2Directory;
  	
  	$inputElement3Conent = $product_Text_3;  	
    if ( empty($product_Text_3) ) $inputElement3Conent = $image3Directory;
    
    $inputProductId = $_POST['product_identifier'];
    $_SESSION["product_identifier"] = $inputProductId;
    $product_identifier2 =  $_SESSION["product_identifier"];
    
    $inputElement1Type = $_POST['one']; 
    $inputElement2Type = $_POST['two'];  
    $inputElement3Type = $_POST['three']; 
  	
  	
  	$sql5 = "INSERT INTO nd_slide(slide_id, product_ID, element_1_Type, element_1_Content, element_2_Type, element_2_Content, element_3_Type, element_3_Content) VALUES (default, $product_identifier2, '$inputElement1Type', '$inputElement1Conent','$inputElement2Type', '$inputElement2Conent','$inputElement3Type','$inputElement3Conent')";
  	
  	$query5 = mysqli_query($conn, $sql5);
    
  	if (move_uploaded_file($_FILES['image1']['tmp_name'], $target1)) {
  		$msg2 = "Image uploaded successfully";
  	}else{
  		$msg2 = "Failed to upload image";
  	}
  	
  	if (move_uploaded_file($_FILES['image2']['tmp_name'], $target2)) {
  		$msg2 = "Image uploaded successfully";
  	}else{
  		$msg2 = "Failed to upload image";
  	}
  	
  	if (move_uploaded_file($_FILES['image3']['tmp_name'], $target3)) {
  		$msg2 = "Image uploaded successfully";
  	}else{
  		$msg2 = "Failed to upload image";
  	}
  }
?> 
