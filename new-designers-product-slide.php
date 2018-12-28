<?php
session_start();

include 'includes/db.php';
$whichProduct = $_GET['productID'];

$sql = "SELECT * 
		FROM nd_slide where product_id = $whichProduct";

		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

<?php include "includes/head.html"; ?>

  <?php include "includes/banner.html"; ?>
  
  
	 <div class="productSlide">
	    <?php

    		while ($row = mysqli_fetch_array($query))
    		
    		{ echo '<div class="row column1">';
    		
    		 if($row['element_1_type']!='file'){
        		    echo '<div class="';
        		    switch ($layout) {
        		        case 1:
        		        case 3:
        		           echo "column1";
        		            break;
        		       case 2:
        		            echo "column3";
        		            break;
        		        case 6:
        		        case 4 :
        		        case  5:
        		           echo "column2";
        		        break;} '">
        		        echo '.$row['element_1_content'].'</div>';
    		    } else
    		    {
        		    echo '<div class="';
        		    switch ($layout) {
        		        case 1:
        		        case 3:
        		           echo "column1";
        		            break;
        		        case 2:
        		            echo "column3";
        		            break;
        		        case 6:
        		        case 4 :
        		        case  5:
        		           echo "column2";
        		        break;}'">
        		        <img src ='.$row["images/element_1_content"].' /></div>';
    		    };
    		  
    		  if($row['element_2_type']!='file'){
        		    echo '<div class="';
        		    switch ($layout) {
        		        case 1:
        		        case 3:
        		           echo "column1";
        		            break;
        		        case 2:
        		            echo "column3";
        		            break;
        		        case 6:
        		           case 4 :
        		        case  5:
        		           echo "column2";
        		        break;} '">
        		        echo '.$row['element_2_content'].'</div>';
    		    } else
    		    {
        		    echo '<div class="';
        		    switch ($layout) {
        		        case 1:
        		        case 3:
        		           echo "column1";
        		            break;
        		      case 2:
        		            echo "column3";
        		            break;
        		        case 6:
        		           case 4 :
        		        case  5:
        		           echo "column2";
        		        break;} '">
        		        <img src ='.$row["images/element_2_content"].' /></div>';
    		    };
    		    
    		  if($row['element_1_type']!='file'){
        		    echo '<div class="';
        		    switch ($layout) {
        		        case  1:
        		        case 3:
        		           echo "column1";
        		            break;
        		        case 2:
        		            echo "column3";
        		            break;
        		        case 6:
        		        case 4 :
        		        case 5:
        		           echo "column2";
        		        break;}
        		     '">
        		        echo '.$row['element_1_content'].'</div>';
    		    } else
    		    {
        		    echo '<div class="';
        		    switch ($layout) {
        		        case 1:
        		        case 3:
        		           echo "column1";
        		            break;
        		        case 2:
        		            echo "column3";
        		            break;
        		        case  6:
        		        case 4 :
        		        case  5:
        		           echo "column2";
        		        break;
        		    }'">
        		        <img src ='.$row["images/element_1_content"].' /></div>';
    		    };
    		}
		?>
	</div>

	


  <!-- The Modal -->
    <?php include "includes/modal_menu.html"; ?>

    <script src="js/navigation.js"></script>
</body>
</html>