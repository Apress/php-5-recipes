<?php

	//sample7_4.php
	
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
				//Close the file since we have no more need to read.
				fclose ($readfile);
				//Increment our counter by 1.
				$curvalue++;
				//Then attempt to open our file for writing, again validating.
				if (is_writable ($file)){
					try {
						if ($writefile = fopen ($file, "w")){
							//Then write the new value to the file.
							fwrite ($writefile, $curvalue);
							//Close the file as we have no more to write.
							fclose ($writefile);
							//Then lastly, output our counter.
							echo $curvalue;
						} else {
							throw new exception ("Sorry, the file could not be opened");    
						}
					} catch (exception $e){
						echo $e->getmessage();
					}
				} else {
					echo "File could not be opened for writing";
				}
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
