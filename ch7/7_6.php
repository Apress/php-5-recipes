<?php
	
	//sample7_6.php

	$flatfile = "samplefile3.txt";
	//Now, we use the file_exists() function to confirm its existence.
	if (file_exists ($flatfile)){
		//In this case, we will use the file() function to read an entire file
		//into an array.
		$rows = file ($flatfile);
		for ($i = 0; $i < count ($rows); $i++){
			//Now, we use the substr() function to parse out the appropriate parts.
			$item = substr ($rows[$i],0,20);
			$amount = substr ($rows[$i],20,40);
			//Note that we trim the end spaces just in case.
			echo "Item: " . rtrim ($item) . " has " . rtrim ($amount) . " unit (s) left.<br />";
		}
	} else {
		echo "File does not exist.";
	}

?>