<?php

	//sample12_6.php

	//The location of the image.
	$path = "images/winter.jpg";
	try {
		if (is_file ($path)){
			if ($file = fopen($path, 'rb')) {
				while(!feof($file) and (connection_status()==0)) {
					$f .= fread($file, 1024*8);
				}
				fclose($file);
			}
			//Use the header function to output an image of .jpg.
			header ("Content-type: image/jpeg");
			print $f;
		} else {
			throw new exception ("Sorry, file path is not valid.");
		}
	} catch (exception $e){
		//Create a dynamic error message.
		$animage = imagecreate (500, 500);
		$red = imagecolorallocate ($animage, 255, 0, 0);
		$white = imagecolorallocate ($animage, 255, 255, 255);
		imagefilledrectangle ($animage, 0, 0, 500, 500, $white);
		imagestring ($animage, 4, ((500 - (strlen($e->getmessage()) * imagefontwidth(4))) / 2), 5, $e->getmessage(), $red);
		imagejpeg ($animage);
		header ("Content-type: image/jpeg");
		imagedestroy ($animage);
	}
	
?>