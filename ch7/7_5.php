<?php

	//sample7_5.php

	//First, find the comma separated file.
	$commafile = "samplefile2.txt";
	//Now, we use the file_exists() function to confirm its existence.
	if (file_exists ($commafile)){
		//In this case, we will use the file() function to read an entire file
		//into an array.
		$rows = file ($commafile);
		for ($i = 0; $i < count ($rows); $i++){
			//We use the explode function to break the current row into the sum
			//of its comma delimited parts.
			$exprow = explode (",", $rows[$i]);
			//Normally at this point you would insert the data into a database
			//or convert it into XML.  In this case, for brevity, we will simply
			//output it.
			echo "ID: " . $exprow[0] . "<br />";
			echo "Name: " . $exprow[1] . "<br />";
			echo "Author: " . $exprow[2] . "<br />";
			echo "<hr />";
		}
	} else {
		echo "File does not exist.";
	}
	//Reading the data back into a comma delimited file is just as easy.
	//Generally you would do this from a database, but in this case, we 
	//will create a set of arrays to output.
	$idarray = array ("1","2","3");
	$namearray = array ("Book 1","Book 2","Book 3");
	$authorarray = array ("An Author","Another Author","Yet Another Author");
	  
	$newfile = "samplefile2.txt";
	//We will open it in such a way that it creates a new file if one
	//does not exist.
	try {
		if ($readfile = fopen ($newfile, "w")){
			//We then go through the array and write a line at a time.
			for ($i = 0; $i < count ($idarray); $i++){
				$writestring = $idarray[$i] . "," . $namearray[$i] . "," . $authorarray[$i] . "\n";
				fwrite ($readfile, $writestring);
			}
			fclose ($readfile);
		} else {
			//If it fails, we throw an exception.
			throw new exception ("Sorry, the file could not be opened.");
		}
	} catch (exception $e) {
		echo $e->getmessage();
	}
?>