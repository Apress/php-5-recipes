<?php

	//sample7_9.php

	//First, dictate a file.
	$afile = "samplefile6.txt";
	//Now, we use the file_exists() function to confirm its existence.
	if (file_exists ($afile)){
		try {
			$charcounter = 0;
			$wordcounter = 0;
			//We default the paragraph counter to 1, as there is bound to be at least 1 line.
			$paragraphcounter = 1;
			$haveanewline = false;
			if ($readfile = fopen ($afile, "r")){
				while (!feof ($readfile)){
					$curchar = fgetc ($readfile);
					$charcounter++;
					//If we have a blank character, the that's a word.
					if ($curchar == " "){
						$wordcounter++;
					}
					//If we have a new line, then we increment the counter.
					if ($curchar == "\n"){
						$paragraphcounter++;
					}
				}
				//Now, we close the file.
				fclose ($readfile);
				//And output our results.
				echo "Number of characters: " . $charcounter . "<br />";
				echo "Number of words: " . $wordcounter . "<br />";
				echo "Number of paragraphs: " . $paragraphcounter;
			} else {
				throw new exception ("Sorry, the file could not be opened");    
			}
		} catch (exception $e){
			echo $e->getmessage();
		}
	} else {
		echo "Sorry, file does not exist.";
	}

?>