<!-- TS: created the code to submit the images -->
<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION != 0 ) {
    $d_id = $_SESSION['_id'];
    $name = $_SESSION['designer_name'];
    $email = $_SESSION['designer_email'];
}
else {
    // Makes it easier to read
    $_SESSION['message'] = "Session isn't picking up name or email!";
}
?>
<?php
$inputHeroTitle = $_POST['product_title_field']; 

include 'includes/db.php';

$sql1 = "SELECT * 
		FROM nd_product_designers WHERE designer_id = '$designer_id';";
$sql2 = "SELECT * FROM `nd_slide` INNER JOIN nd_Product ON nd_slide.product_ID = nd_Product.product_id INNER JOIN nd_product_designers ON nd_Product.designer_id = nd_product_designers.designer_id where nd_product_designers.designer_id = '$designer_id' ";
$sql4 = "SELECT * 
		FROM nd_Product WHERE designer_id = '$designer_id';";

		
$query = mysqli_query($conn, $sql1);
$query2 = mysqli_query($conn, $sql2);
$query4 = mysqli_query($conn, $sql4);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}


$msg = "";
if (isset($_POST['update_product_designer_image'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

  	// image file directory
  	$target = "images/d$d_id/".basename($image);
  	
    $sql3 = "UPDATE `nd_product_designers` SET `picture`='d$d_id/$image' WHERE `designer_id` = '$d_id'";
    
    $query3 = mysqli_query($conn, $sql3);
    
  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
   

  
  
  
  
  
  
?> 