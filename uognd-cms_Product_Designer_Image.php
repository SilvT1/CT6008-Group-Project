<!-- TS: created the submission page -->
<?php include "uognd-cms-submit_product_designer_image.php"; ?>
<?php include "includes/head_cms.html"; ?>
  <?php include "includes/banner.html"; ?>

	<div id="login">
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
	    
           Edit your product designer image
           <input type="file" name="image" id="fileToUpload">
           <input type="submit" value="Update" name="update_product_designer_image">
           
      </form>
      
				
</div>	

	

	
	  <!-- The Modal -->
    <?php include "includes/modal_menu.html"; ?>

	<script src="js/navigation.js"></script>
	<script src="js/validateForms.js"></script>
		
    </body>
</html>