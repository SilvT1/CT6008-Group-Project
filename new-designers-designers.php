<?php session_start();
include 'includes/db.php';


/**get all designers from designer table, then join all their products from the product table; if no products this comes back as null**/
$sql = "SELECT nd_product_designers.designer_id,product_id,product_title,hero_image,name,email,portfolio_link,picture,mini_bio FROM `nd_product_designers` LEFT JOIN `nd_Product` ON nd_Product.designer_id = nd_product_designers.designer_id";
    
$query = mysqli_query($conn, $sql);

if (!$query) {
  die ('SQL Error: ' . mysqli_error($conn));
}
?>

<?php include "includes/head.html"; ?>
  <?php include "includes/banner.html"; ?>
  
	<main role="main">
		<div class="titleLeft">
			<h1>The Designers</h1>
		</div>
		<div class="contentRight">
		<?php
        $designerID=0;
        $bio="";
        $counter=0;
        //the below 3 associative arrays are to make the hex/chev design
        //we use these holders to then loop through and create the SVG
        //this doesn't need to be associative; it just makes it easier to debug!
        $pictureHolder = array();
        $titleHolder = array();
        $linkHolder = array();

        //because this SVG set is used elsewhere on the site, I decided to put it into one file so that all changes to the svg are made there; actual customisation is done in two loops below labeled "SVG PT 1" and "SVG PT 2"; any changes need to be made in both places
        $SVGText="VIEW";
        include "includes/hex_and_chev_svg_vars.php";


        while ($row = mysqli_fetch_array($query))
        {
            //this checks to close previous designer div if it exists
            if($designerID!=0&&$row['designer_id']!=$designerID) {
              /**--SVG PT 1--**/
              //create the SVG and add it before closing div
              for($i = 0; $i < count($pictureHolder); $i++) {
                $uniqueID=$i.'_'.$designerID;
                $translate = $translateText=0;
                if($i==0){
                  //hexagon
                  $totalSVGPt1=$svgPt1.$uniqueID.$svgPt1b.$pictureHolder[$i].$svgPt1Close;
                  $totalSVGPt2=$svgPt5.'<a xlink:href="'.$linkHolder[$i].'"><title>'.$titleHolder[$i].'</title>'.$svgPt6CloseHexA.$uniqueID.$svgPt6CloseHexAb;
                }else{
                  //chevrons
                  //always appending to the vars...
                  $totalSVGPt1.=$svgPt2Open.$uniqueID.$svgPt2Close.$pictureHolder[$i].$svgPt1Close;
                  $translate=($i-1)*56;
                  $translateText=60+($i*56);
                  $totalSVGPt2.='<a xlink:href="new-designers-product-slide.php?productID='.$linkHolder[$i].'"><title>'.$titleHolder[$i].'</title>'.$svgPolyChev.$svgPolyTranslate.$translate.$svgPolyTranslateClose.$svgPt6CloseChevA1.$uniqueID.$svgPt6CloseChevA2.$translateText.$svgPt6CloseChevA3;
                }
              }
              echo $totalSVGPt1.$totalSVGPt2.$svgPt7CloseSVG;//the total complicated SVG...


              echo '</div>' //close designerPictureRole div
              .'<p>'.$bio.'</p>' //designer bio
              .'</div>'; //close designerHolder div

              $counter=0;
            }

            //this checks to see if it's a new designer
            if($row['designer_id']!=$designerID){
              //reset the arrays
                $pictureHolder = array();
                $titleHolder = array();
                $linkHolder = array();
                $totalSVGPt1=$totalSVGPt2="";

              //reset the vars
                $designerID=$row['designer_id'];
                $bio=$row['mini_bio'];
                  
              echo '<div class="designerHolder">'
              .'<ul id="designerDetails"><li>'.$row['name'].'</li>'
              .'<li><a href="mailto:'.$row['email'].'?Subject=Contacting%20from%20UoGND%20website">'.$row['email'].'</a></li>'
              .'<li><a href="'.$row['portfolio_link'].'">'.$row['portfolio_link'].'</a></li></ul>'
              .'<div class="designerPictureRole">';

              $pictureHolder[0] = $row["picture"];
              $titleHolder[0] = $row['name'];
              $linkHolder[0] = "new-designers.php?designer=".$designerID;
            }
            
            //this loops through the products for the designer
            if($row['hero_image']!=""){
              $counter++;
              $pictureHolder[$counter]=$row['hero_image'];
              $titleHolder[$counter]=$row['product_title'];
              $linkHolder[$counter]=$row['product_id'];
            }
        }

      //create the SVG and add it before closing div
      /**--SVG PT 2--**/
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
          $totalSVGPt2.='<a xlink:href="new-designers-product-slide.php?productID='.$linkHolder[$i].'"><title>'.$titleHolder[$i].'</title>'.$svgPolyChev.$svgPolyTranslate.$translate.$svgPolyTranslateClose.$svgPt6CloseChevA1.$uniqueID.$svgPt6CloseChevA2.$translateText.$svgPt6CloseChevA3;
        }
      }
      echo $totalSVGPt1.$totalSVGPt2.$svgPt7CloseSVG;//the total complicated SVG...

      echo '</div>' //close final designerPictureRole div
      .'<p>'.$bio.'</p>' //final designer bio
      .'</div>'; //close final designer div
    ?>
	</main>


  <!-- The Modal -->
    <?php include "includes/modal_menu.html"; ?>

	<script src="js/navigation.js"></script>
</body>
</html>