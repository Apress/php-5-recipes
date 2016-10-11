<?php
	// Open the file with in read-only mode.  This is the same 
	// code as you'll find in 10.5.
	$file = fopen("testfile.csv", "r") or die("Cannot open file!\n");

	// this will be false if you can no longer get a line from
	// the file.
	while ($line = fgets($file, 1024)) {
		preg_match_all("/[^,\"]+|\"([^\"]|\"\")*\"/", $line, $fields);
		// Print out the second first and second fields, just to
		// get an idea that it's working okay.
		echo "First field is:  " . $fields[0][0] . "\n";
		echo "Second field is: " . $fields[0][1] . "\n";
	}
	// Make sure to close the file when you're done!
	fclose($file);

?>
