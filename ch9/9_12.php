<?php
// Open a file in which to search for lines that may contain 
// odd numbers of quotes.
	$file = fopen("oddquotes.txt", "r") or die("Cannot open file!\n");

	// lineNbr is used to keep track of the current line number
	// so the user can get an informational message.
	$lineNbr = 0;

	// This will be false if you can no longer get a line from
	// the file.
	while ($line = fgets($file, 1024)) {
		$lineNbr++;
		if (preg_match("/^[^\"]*\"([^\"]*|([^\"]*\"[^\"]*\"[^\"]*)*)$/", 
			$line)) {
			echo "Found match at line " . $lineNbr . ":  " . $line;
		}
	}
	// Make sure to close the file when you're done!
	fclose($file);

?>
