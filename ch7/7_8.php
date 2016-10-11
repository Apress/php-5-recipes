<?php

	//sample7_8.php

	//First, dictate a file.
	$afile = "samplefile5.txt";
	//Now, we use the file_exists() function to confirm its existence.
	if (file_exists ($afile)){
		//Read it using the file() function.
		$rows = file ($afile);
		//We can then use the count() function to tell us the number of lines.
		echo count ($rows) . " lines in this file"; //Outputs 4 in this case
	} else {
		echo "Sorry, file does not exist.";
	}
	
?>