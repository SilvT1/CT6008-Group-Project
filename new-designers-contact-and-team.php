<?php include "new-designers-send-contact.php"; ?>
<?php
include 'includes/db.php';

$sql = "SELECT * 
    FROM $usertable4";
    
$query = mysqli_query($conn, $sql);

if (!$query) {
  die ('SQL Error: ' . mysqli_error($conn));
}
?>
<?php include "includes/head.html"; ?>
  <?php include "includes/banner.html"; ?>

  <main role="main">
    <div class="titleLeft">
			<h1>The Team</h1>
		</div>
		<div class="contentRight">
      <?php 
        //if the user has already submitted the form they will receive feedback; however, this allows them to resubmit the form.
        if($_GET['feedback']!=""){
          echo "<p>".$_GET['feedback']."</p>";

          //reset the email variables
          $who = $why = $name = $email = $message = $recipient="";
        }
      ?>

    	<form id="contactForm" name="contactForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h3>Contact the Team</h3>
        <fieldset>
          <label for="who_field">Who do you want to contact?</label>
          <select name="who_field" id="who_field" required>
            <option disabled selected value> -- select an option -- </option>
            <option value="media">Media contact</option>
            <option value="web">Web contact</option>
            <option value="product-design">Product design contact</option>
            <option value="web-design">Web design contact</option>
          </select>
          <br/>

          <label for="why_field">Reason for contact?</label>
          <select name="why_field" id="why_field" required>
            <option disabled selected value> -- select an option -- </option>
            <option value="query">I have a question</option>
            <option value="information">I would like some information</option>
            <option value="feedback">I have some feedback</option>
            <option value="problem">I have found a problem</option>
          </select>
          <br/>

          <label for="visitor_name">Your name:</label>
          <input id="visitor_name" name="visitor_name">
          <br />

          <label for="email_field">Your contact email:</label>
          <input id="email_field" type="email" name="email_field">
          <br />
          
          <label for="message_field">Please enter your message here:</label>
          <textarea name="message_field" id="message_field" maxlength="10000"></textarea>
          <br/>
        </fieldset>
          
        <fieldset name="buttons" id="buttons" style="margin-bottom:1em;">  
          <input type="reset" value="Clear form" name="reset">
          <input type="submit" value="Submit" name="submit">
        </fieldset>
    </form>

    <small style="clear:both;"><strong>Please note:</strong> we do not, in any way, record, store or keep the information sent through this form in a database. Your privacy is of the utmost importance to us and your email will be generated directly to the recipient. If you have any questions or queries about this, please do not hesitate to contact the team. Thank you.</small>

    <div id="team">
       <?php
       $counter=0;
        while ($row = mysqli_fetch_array($query))
        {
          $counter++;
          echo '<div class="teamHolder">'
            .'<ul id="teamMemberDetails">'
            .'<li>'.$row['name'].'</li>'
            .'<li>'.$row['role'].'</li>'
            .'<li><a href="mailto:'.$row['email'].'?Subject=Contacting%20from%20UoGND%20website">'.$row['email'].'</a></li>'
            .'<li><a href="'.$row['Portfolio_Link'].'">'.$row['Portfolio_Link'].'</a></li></ul>'
            .'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 110 100" preserveAspectRatio="xMinyMin meet"><defs><pattern id="hexagon'.$counter.'" height="100%" width="100%" patternContentUnits="objectBoundingBox" viewBox="0 0 1 1" preserveAspectRatio="xMidYMid slice"><image height="1" width="1" preserveAspectRatio="xMidYMid slice" xlink:href="images/'.$row["picture"].'" /></pattern></defs><a xlink:href="#" ><title>'.$row['name'].'</title><polygon points="78.25 8 29.75 8 5.5 50 29.75 92 78.25 92 102.5 50 78.25 8" fill="url(#hexagon'.$counter.')"/></a></svg>'
            .'<p>'.$row['mini_bio'].'</p>'
          .'</div>';
        }
    ?>
  </div>
	</main>


  <!-- The Modal -->
    <?php include "includes/modal_menu.html"; ?>

	<script src="js/navigation.js"></script>
</body>
</html>