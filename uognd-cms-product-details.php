<?php include "uognd-cms-read_product.php"; ?>
<?php include "includes/head_cms.html"; ?>
  <?php include "includes/banner.html"; ?>
	

	<main role="main">
		<?php if(!$formSubmitted) { ?>
		<form name="product-details" id="product-details" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<fieldset name="details" id="details">
				<h3>Edit your product details</h3>

				<label for="productTitle">Product title</label>
				<input type="text" name="productTitle" id="productTitle">

				<br/>

				<label for="heroImage">Hero image</label>
				<input type="file" name="heroImage" id="heroImage">

				<br/>
			</fieldset>

			<fieldset name="buttons" id="buttons">	       
	          <input type="button" value="Cancel" name="cancel" onclick="cancelForm()">
	          <input type="submit" value="Save" name="submit">   
	          <input type="button" value="Add slide" name="add" onclick="addSlide()">
			</fieldset>
		</form>
		<?php } ?>
	</main>



  <!-- The Modal -->
    <?php include "includes/modal_menu.html"; ?>

	<script src="js/navigation.js"></script>
	<script src="js/validateForms.js"></script>
</body>
</html>