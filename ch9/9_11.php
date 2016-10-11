<?php
	// Open the file with the fopen command.  The $file variable
	// holds a handle to the file that will be used when 
	// getting the line from the file.
	$file = fopen("testfile.txt", "r") or die("Cannot open file!\n");

	// this will be false if you can no longer get a line from
	// the file.
	while ($line = fgets($file, 1024)) {
		if (preg_match("/Hello( World!)?/", $line)) {
			echo "Found match:  " . $line;
		} else {
			echo "No match: " . $line;
		}
	}
	// Make sure to close the file when you're done!
	fclose($file);

?>
