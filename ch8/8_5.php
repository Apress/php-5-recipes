<?php

	//sample8_5.php

	//The first thing we do is check for GD compatibility.
	try {
		//First we create a blank canvas.
		if ($animage = imagecreate (500, 500)){
			//Now, let's allocate our background color and line color.
			//Here is the way to do it with RGB.
			$white = imagecolorallocate ($animage, 255, 255, 255);
			//And here is an example with HEX.
			$black = imagecolorallocate ($animage, 0x00, 0x00, 0x00);
			//Now, let's draw the rectange over our background, and surround
			//it with a black line.
			imagefilledrectangle ($animage, 0, 0, 500, 500, $black);
			imagefilledrectangle ($animage, 1, 1, 498, 498, $white);
			//Now, let's create some more colors for our title.
			$blue = imagecolorallocate ($animage, 0, 0, 255);
			$green = imagecolorallocate ($animage, 0, 255, 0);
			//Now, let's center the text at the top of our image.
			$title = "A Sample Poll";
			imagestring ($animage, 4, ((500 - (strlen($title) * imagefontwidth(4))) / 2), 5, $title, $blue);
			$copy = "Copyright Lee Babin";
			imagestring ($animage, 4, ((500 - (strlen($copy) * imagefontwidth(4))) / 2), 25, $copy, $green);
			
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