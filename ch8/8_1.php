<?php
	
	//sample8_1.php

	//The first thing we do is check for GD compatibility.
	try {
		//First we create a blank canvas.
		if ($animage = imagecreate (200, 200)){
			//Then we can create a new background color for this image.
			$red = imagecolorallocate ($animage, 255, 0, 0);
			//Then we can draw a rectangle on our canvas.
			imagerectangle ($animage, 0, 0, 200, 200, $red);
			//Then we output the new jpg.
			imagejpeg ($animage);
			//And then header the image.
			header ("Content-type: image/jpeg");
			//Finally we destroy our image.
			imagedestroy ($animage);
		} else {
			throw new exception ("Sorry, the GD library may not be setup.");
		}
	} catch (exception $e) {
		echo $e->getmessage();
	}
?>