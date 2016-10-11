<?php

	//sample12_7.php

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
			$outputname = "myimage";
			header ("Content-type: image/jpeg");
			//This will force a download.
			header("Content-disposition: attachment; filename=".$outputname.".jpg");
			print $f;
		} else {
			throw new exception ("Sorry, file path is not valid.");
		}
	} catch (exception $e){
		echo $e->getmessage();
	}
	
?>