<?php include "uognd-cms-read_designer_update.php"; ?>
<?php include "includes/head.html"; ?>
  <?php include "includes/banner.html"; ?>
  
	<main role="main">
		<div id="cms-display">
		  <?php echo $feedback; ?>
	      <h1>Welcome <?php echo $name;?></h1>          
	      <p><?php      
	          if ( isset($_SESSION['message']) ) {
	              echo $_SESSION['message'];              
	              unset( $_SESSION['message'] );
	          }  else {
	          //if no error, then display user data        
	      ?></p>
	      <?php
		    	$designerID=0;
		        $d_name=$d_number=$d_email=$d_link=$d_bio="";//set from database
		        $counter=0;
		        $maxProducts=3;


		        //because this SVG set is used elsewhere on the site, I decided to put it into one file so that all changes to the svg are made there; actual customisation is done in the final loop below labeled "SVG PT 1"; any changes need to be made in both places
		        $SVGText="VIEW";
		        include "includes/hex_and_chev_svg_vars.php";


		        while ($row = mysqli_fetch_array($query)) {	
		        	//this just ensures that the hexagon is only made once
		        	if($row['designer_id']!=$designerID){
		            	$designerID=$row['designer_id'];
		                $d_name=$row['name'];
		                $d_number=$row['phone_number'];
		                $d_email=$row['email'];
		                $d_link=$row['portfolio_link'];
		                $d_bio=$row['mini_bio'];
						  
						$pictureHolder[0] = $row["picture"];
						$titleHolder[0] = $row['name'];
						$linkHolder[0] = "/CMS_ProductDesignerImage.php";
					}
		            
		            //this loops through the products for the designer
		            if($row['hero_image']!=""){
		              $counter++;
		              $pictureHolder[$counter]=$row['hero_image'];
		              $titleHolder[$counter]=$row['product_title'];
		              $linkHolder[$counter]=$row['product_id'];
		            }
		        }

				echo '<div class="designerBioImageHolder">';
		        //create the SVG and add it before closing div
				/**--SVG PT 1--**/
				for($i = 0; $i < count($pictureHolder); $i++) {
					$uniqueID=$i.'_'.$designerID;
					$translate = $translateText=0;
					if($i==0){
					  //hexagon
					  $totalSVGPt1=$svgPt1.$uniqueID.$svgPt1b.$pictureHolder[$i].$svgPt1Close;
					  $totalSVGPt2=$svgPt5.'<a xlink:href="'.$linkHolder[$i].'"><title>'.$titleHolder[$i].'</title>'.$svgPt6CloseHexA.$uniqueID.$svgPt6CloseHexAb;
					}else{
					  //one of the chevrons
					  //always appending...
					  $totalSVGPt1.=$svgPt2Open.$uniqueID.$svgPt2Close.$pictureHolder[$i].$svgPt1Close;
					  $translate=($i-1)*56;
					  $translateText=60+($i*56);
					  $totalSVGPt2.='<a xlink:href="uognd-cms-product-details?productID='.$linkHolder[$i].'"><title>'.$titleHolder[$i].'</title>'.$svgPolyChev.$svgPolyTranslate.$translate.$svgPolyTranslateClose.$svgPt6CloseChevA1.$uniqueID.$svgPt6CloseChevA2.$translateText.$svgPt6CloseChevA3;
					}
				}
				echo $totalSVGPt1.$totalSVGPt2.$svgPt7CloseSVG;//the total complicated SVG...

		   		echo '</div>'; //close final designerBioImageHolder div
			}//close 'message' isset if 

			if($counter<$maxProducts){ ?>

			<a href="/uognd-cms-product-details.php" title="Add new product"><img src="/www-images/cms/add_product.svg" title="Add a product" alt="Add a product" id="addProduct" style="	width:6vw;clear:right;margin-top:12%;margin-left:-<?echo ($maxProducts-$counter)*10;?>vw;"/></a>

			<? }//close add product if ?>

			<h3 style="clear:left;margin-top:2em;">Your personal details:</h3>

			<form id="designerBio" name="designerBio" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<fieldset name="1" id="1">		
		      		<label for="name_field">Name</label>
					<input id="name_field" type="text" name="name_field" value="<?php echo $d_name;?>" class="<?php echo $errorClass; ?>" required>
					<br />

		      		<label for="phone_field">Contact number</label>
					<input id="phone_field" type="tel" name="phone_field" value="<?php echo $d_number;?>" class="<?php echo $errorClass; ?>">
					<br />	

		      		<label for="email_field">Email</label>
					<input id="email_field" type="email" name="email_field" value="<?php echo $d_email;?>" class="<?php echo $errorClass; ?>" required>
					<br />	

		      		<label for="link_field">Portfolio link</label>
					<input id="link_field" name="link_field" value="<?php echo $d_link;?>" class="<?php echo $errorClass; ?>">
				</fieldset>
		        	
				<fieldset name="2" id="2">		
					<label for="bio">Bio (maximum 600 characters)</label>
					<textarea name="bio" id="bio" maxlength="600"><?php echo $d_bio; ?></textarea>
				</fieldset>
	      

				<fieldset name="buttons" id="buttons">	
					<input type="submit" value="Submit" name="submit">
					<input type="button" value="Cancel (logout)" name="logout" id="logout">
				</fieldset>
			</form>
		</div>
	</main>


  <!-- The Modal -->
    <?php include "includes/modal_menu.html"; ?>

	<script src="js/navigation.js"></script>
	<script src="js/validateForms.js"></script>
	<script>logout.addEventListener("click",function(){window.location.href = '/logout.php';});</script>
</body>
</html>