<?php include "includes/head_cms.html"; ?>
  <?php include "includes/banner.html"; ?>

	<div class="qrcodeFamily">

		<div class="mobileOnly">
			<h2>Press the QR code to start your scan:</h2>
			<label class="qrcode-text-btn qrcodeFamily"><input type="file" accept="image/*" capture="environment" onclick="return showQRIntro();" onchange="openQRCamera(this);" tabindex="-1" class="qrcodeFamily"></label><input type="text" size="16" placeholder="Designer Details" class="qrcode-text qrcodeFamily"><input type="button" value="Go" class="qrcodeFamily" onclick="navigateToDesigner();">
		</div>

		<p class="nonMobile">
			Sorry, this feature is only available on a mobile device.<br/><br/>
			<a href="/index.php">RETURN HOME</a>
		</div>

	</div>


  <!-- The Modal -->
    <?php include "includes/modal_menu.html"; ?>

	<script src="js/navigation.js"></script>
	<script src="js/QRControl.js"></script>
	<script src="js/qr_packed.js"></script><!-- FL: Copyright 2007 ZXing authors, used under license; see file for details -->

</body>
</html>