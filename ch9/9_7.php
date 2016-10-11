<?php
// This example will build an array of values, then
// iterate through that array and replace each value with
// a formatted version of the number.  The new formatted
// number is echoed out to the screen

	// The regular expression is set to a variable.
	$regex = "/^(\(?\d{3}\)?)?[- .]?(\d{3})[- .]?(\d{4})$/";


	$values = array(
		"8005551234", // (800) 555-1234
		"800.555.1234",  // (800) 555-1234
		"800-555-1234",  // (800) 555-1234
		"800.555.1234",  // (800) 555-1234
		"800 5551234",  // (800) 555-1234
		"5551234",  // () 555-1234
		);

	// Go through each one, and use preg_replace to 
	// reformat the number
	foreach ($values as $value) {
		$formattedValue = preg_replace($regex, "(\\1) \\2-\\3", 
			$value);

		echo $formattedValue . "\n";
	}

?>
