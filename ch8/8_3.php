<?php

	//sample8_3.php

	//The first thing we do is check for GD compatibility.
	try {
		//First we create a blank canvas.
		if ($animage = imagecreate (200, 200)){
			//Then we can create a new background color for this image.
			$red = imagecolorallocate ($animage, 255, 0, 0);
			//Then we can draw a rectangle on our canvas.
			imagerectangle ($animage, 0, 0, 200, 200, $red);
			//Now, let's create a circle in the middle of the red rectangle.
			//Let's make it black.
			$black = imagecolorallocate ($animage, 0, 0, 0);
			imagefilledellipse($animage, 100, 100, 150, 150, $black);
			//To make things more interesting, we can add text this time.
			//Let's create a "white" color.
			$white = imagecolorallocate ($animage, 255, 255, 255);
			//Then write on the image.
			imagestring($animage, 5, 48, 95, "Hello World!", $white);
			//Then we output the new png.
			imagepng ($animage);
			//And then header the image.
			header ("Content-type: image/png");
			//Finally we destroy our image.
			imagedestroy ($animage);
		} else {
			throw new exception ("Sorry, the GD library may not be setup.");
		}
	} catch (exception $e) {
		echo $e->getmessage();
	}
?>