<php session_start(); ?>
<?php
include 'db.php';

$sql = "SELECT * 
		FROM $usertable4";
		
$query = mysqli_query($conn, $sql);
$query2 = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
    <meta charset="UTF-8" />
	<title>Contact Us</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
 <link rel="stylesheet" href="CSS/mainStyles.css?v=1.0">
    
    <link rel="stylesheet" type="text/css" href="CSS/model_stylesheet.css">
</head>

<body>
    <div id="banner">
	    <div id="myBtn">
		<img src="www-images/university_of_glos_new_designers_logo.png" width="165px" height="42px" alt="University of Gloucestershire New Designers" style="margin:13px 0 0 18px;"/>
		<!--menu button-->
		<div dir="rtl" class="menucontainer imgMenu" onclick="menuFunction(this)">
			<div id="bar1"></div>
			<div id="bar2"></div>
			<div id="bar3"></div>
		</div>
		</div>
	</div>

    
    <main role="main">
        <div class="titleLeft">
			<h1>Contact Us</h1>
		</div>
    <div id="contentRight">
             <div id="login_form">
               <form action="email_password.php" method="get" class="login100-form validate-form">
				
				<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
				<input class="input100" id="textfield_space" type="email" name="email_field" placeholder="Email"> <br />
				<span class="focus-input100"></span>
				</div>
				
				<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="textfield_space" type="submit" name "read" /> Retrieve password
						</button>
					</div>
				</form> 
            </div>    
	    </div>
	
	
   </main>

	
    <!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Calls Modal content -->
  <?php include "Model_Menu.html"; ?>

</div>
	
	<script src="js/navigation.js"></script>
	<script src="js/model_navigation.js"></script>
	<script src="js/featureDetection.js"></script>
		
    </body>
</html>