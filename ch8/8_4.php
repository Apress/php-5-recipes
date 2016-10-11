<?php

	//sample8_4.php

	//The first thing we do is check for GD compatibility.
	try {
		//First we create a blank canvas.
		if ($animage = imagecreate (500, 500)){
			//Now, let's allocate our background color and line color.
			$white = imagecolorallocate ($animage, 255, 255, 255);
			$black = imagecolorallocate ($animage, 0, 0, 0);
			//Now, let's draw the rectange over our background, and surround
			//it with a black line.
			imagefilledrectangle ($animage, 0, 0, 500, 500, $black);
			imagefilledrectangle ($animage, 1, 1, 498, 498, $white);
			
			//Designate the image.
			imagepng ($animage);
			//Then output it.
			header ("Content-type: image/png");
			//Lastly, clean up.
			imagedestroy ($animage);
		} else {
			throw new exception ("Sorry, the GD library may not be setup.");
		}
	} catch (exception $e) {
		echo $e->getmessage();
	}
?>