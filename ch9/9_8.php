<?php

// This example will look for repeated words next to each
// other, regardless of case.  The case insensitivity is
// provided by the i option, which is used to modify the
// expression given to preg_match.

// Here, a function is used to contain common code that
// will be run on each string down below.  
function showMatchResults($str) {
	if (preg_match("/\b(\w+)\s+\\1\b/i", $str)) {
		echo "Match successful: '" . $str . "'\n";
	} else { 
		echo "Match failed: '" . $str . "'\n";
	}
}

showMatchResults("Hello World!");
showMatchResults("The the is repeated.");
showMatchResults("No match here");
showMatchResults("That that is that.");
showMatchResults("Goodbye World!");
	

?>
