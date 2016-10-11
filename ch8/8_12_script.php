<?php

	//sample8_12.php

	//The first thing we do is check for GD compatibility.
	try {
		//First we create a blank canvas.
		if ($animage = imagecreatefromjpeg ("images/tiger.jpg")){
			//For now, our font will be in black.
			$black = imagecolorallocate ($animage, 0, 0, 0);
			//Now, write to the speech balloon.
			//First, we need to designate the rectangular area we want to write to.
			$topleftx = 479;
			$toplefty = 35;
			$bottomrightx = 741;
			$bottomrighty = 90;
			
			//Give the location of the font you wish to use.
			$verdana = "C:\WINDOWS\Fonts\verdana.ttf";
			
			//Then get the length of the string.
			//First we need to the the width of the font.
			$dimensions = imagettfbbox (14,0,$verdana, $_GET['whattosay']);
			$strlen = ($dimensions[2] - $dimensions[0]);
			//Find the x coordinate to center it.
			$xcoord = (((($bottomrightx - $topleftx) - $strlen) / 2) + $topleftx);
			
			imagettftext($animage, 14, 0, $xcoord, 60, $black, $verdana, $_GET['whattosay']);
			
			//Designate the image.
			imagejpeg ($animage);
			//Then output it.
			header ("Content-type: image/jpeg");
			
			//Lastly, clean up.
			imagedestroy ($animage);
		} else {
			throw new exception ("Sorry, the GD library may not be setup.");
		}
	} catch (exception $e) {
		echo $e->getmessage();
	}
?>