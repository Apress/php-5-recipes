<?php
// This example will build an array of values, then
// iterate through that array and check each value against
// the regular expression.  Each value below is marked
// Valid if it is expected to be valid, and Invalid if it
// and Invalid value.

	// Set up the regular expression as a variable.
	$regex = "/^\\$?(\d{1,3}(,\d{3})*|\d+)\.\d\d$/";

	$values = array(
		"1,000.00", // Valid
		"$100.00",  // Valid
		"$1.0",  // Invalid
		"1,0000.0",  // Invalid
		"$1,000,000.00",  // Valid
		"4",  // Invalid
		"1000.00"  // Valid
		);

	// Now go through the array and use preg_match to 
	// try to find a match in each value
	foreach ($values as $value) {
		if (preg_match($regex, $value)) {
			echo "'" . $value . "' is a valid number.\n";
		} else {
			echo "'" . $value . "' is NOT a valid number.\n";
		}
	}

?>
