<?php

	//sample7_7.php

	//First, dictate a file.
	$binfile = "samplefile4.txt";
	//Now, we use the file_exists() function to confirm its existence.
	if (file_exists ($binfile)){
		//Then open the file for binary read and writing.
		try {
			if ($readfile = fopen ($binfile, "rb+")){
				//Now, we can read an write in binary.
				$curtext = fread ($readfile,filesize($binfile));
				echo $curtext; //Hello World!
	    
				//Then we can write to it.
				fwrite ($readfile, "Hi World!");
    
				//Then we close the file.
				fclose ($readfile);
			}
		} catch (exception $e) {
			echo $e->getmessage();
		}
	} else {
		echo "Sorry, file does not exist.";
	}
?>