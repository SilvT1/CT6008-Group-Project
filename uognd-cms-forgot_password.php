<?php include "uognd-cms-email_password.php"; ?>
<?php include "includes/head_cms.html"; ?>
  <?php include "includes/banner.html"; ?>

	<div id="login">
       <img src="www-images/cms/uognd_logo_teal.svg" width="75%" />

      	<!--validate form on this page, rather than navigating elsewhere whilst avoiding potential XSS-->
      	<form id="forgotPassword" name="forgotPassword" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return forgotPassword()" method="post">
			<fieldset>
          		<label for="email_field">Email</label>
				<input id="email_field" type="email" name="email_field" value="<?php echo $inputuser;?>" class="<?php echo $errorClass; ?>" required>
				<br />
				
          		<input type="submit" value="Retrieve password" name="submit">
				<p style="margin-top:1em;"><?php echo $loginErr; ?></p>
			</fieldset>
		</form>
	</div>
	

  <!-- The Modal -->
    <?php include "includes/modal_menu.html"; ?>

	<script src="js/navigation.js"></script>
	<script src="js/validateForms.js"></script>
</body>
</html>