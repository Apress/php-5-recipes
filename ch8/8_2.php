<?php

	//sample8_2.php

	//The first thing we do is check for GD compatibility.
	try {
		//First we create a blank canvas.
		if ($animage = imagecreate (200, 200)){
			//Then we can create a new background color for this image.
			$red = imagecolorallocate ($animage, 255, 0, 0);
			//Then we can draw a rectangle on our canvas.
			imagerectangle ($animage, 0, 0, 200, 200, $red);
			//To make things more interesting, we can add text this time.
			//Let's create a "white" color.
			$white = imagecolorallocate ($animage, 255, 255, 255);
			//Then write on the image.
			imagestring($animage, 5, 45, 50, "Hello World!", $white);
			//Then we output the new gif.
			imagegif ($animage);
			//And then header the image.
			header ("Content-type: image/gif");
			//Finally we destroy our image.
			imagedestroy ($animage);
		} else {
			throw new exception ("Sorry, the GD library may not be setup.");
		}
	} catch (exception $e) {
		echo $e->getmessage();
	}
?>