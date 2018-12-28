<?php include "uognd-cms-read_login.php"; ?>
<?php include "includes/head_cms.html"; ?>
  <?php include "includes/banner.html"; ?>

	<div id="login">
       <img src="www-images/cms/uognd_logo_teal.svg" width="75%" />
      
      	<!--validate form on this page, rather than navigating elsewhere whilst avoiding potential XSS-->
      	<form id="loginForm" name="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateLogin()" method="post">
			<fieldset>
          		<label for="email_field">Email</label>
				<input id="email_field" type="email" name="email_field" value="<?php echo $inputuser;?>" class="<?php echo $errorClass; ?>" required>
				<br />
				
          		<label for="password_field">Password</label>
				<input id="password_field" type="password" name="password_field" class="<?php echo $errorClass; ?>" required>
				<br />
				
          		<input type="submit" value="Sign in" name="submit">
				<p><?php echo $loginErr; ?></p>
			</fieldset>
		</form> 

		<a href="/uognd-cms-forgot_password.php" title="Forgot password" style="text-align:left; margin:1em;"><p>Forgot password?</p></a>
	</div>
	

  <!-- The Modal -->
    <?php include "includes/modal_menu.html"; ?>

	<script src="js/navigation.js"></script>
	<script src="js/validateForms.js"></script>
</body>
</html>