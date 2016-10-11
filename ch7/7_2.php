<?php

	//sample7_2.php
	
	//First, declare the file we wish to open.
	$file = "samplefile1.txt";
	//Now, we use the file_exists() function to confirm its existence.
	if (file_exists ($file)){
		//Then we attempt to open the file, in this case for reading.
		try {
			if ($readfile = fopen ($file, "r")){
				//Then we can work with the file.
				//Get the current value of our counter by using fread().
				$curvalue = fread ($readfile,filesize($file));
				//Then we can output the results.
				echo $curvalue;
			} else {
				//If it fails, we throw an exception.
				throw new exception ("Sorry, the file could not be opened.");
			}
		} catch (exception $e) {
			echo $e->getmessage();
		}
	} else {
		echo "File does not exist.";
	}	

?>
