<?php include "includes/head.html"; ?>

	<?php include "includes/banner.html"; ?>

	<main role="main">
		<div class="titleLeft">
			<h1>The Exhibition</h1>
		</div>

		<div id="exhibitionContainer">
			<div class="contentMiddle">
				<h2>04-07 <span class="accent">July</span> 2018</h2>
			</div>
			<div class="threeColRight">
				<address>Business Design Centre<br/> 
				52 Upper Street<br/>
				London<br/>
				N1 0QH</address>
			</div>
		</div>

		<div id="map"></div>
		</div>     

		<nav id="thumbs">
	<a href="images/newdesigners_where_we_are.jpg"><img src="images/newdesigners_where_we_are_small-thumb.jpg" width="550px" height="309px" class="link" alt></a>
	<a href="images/business_centre_map.jpg"><img src="images/business_centre_map_small-thumb.jpg" width="550px" height="309px" class="link" alt></a>
</nav>
<dialog id="cover">
	<button id="closecover">Close</button>
	<img src="" alt>
</dialog>
	</main>

  <!-- The Modal -->
    <?php include "includes/modal_menu.html"; ?>

	<script src="js/navigation.js"></script>
	<script src="js/google-maps.js"></script>
	<script src="js/lightbox.js"></script>
    <script>
      function initMap() {
        var uluru = {lat: 51.535720, lng: -0.105897};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
       var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
	<script src=""></script> 
</body>
</html>
