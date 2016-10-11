<?php

	//sample8_8_script.php

	//The first thing we do is check for GD compatibility.
	try {
		//First we create a blank canvas.
		if ($animage = imagecreatefromjpeg ("images/tiger.jpg")){
			
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