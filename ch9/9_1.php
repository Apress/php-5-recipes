<?php
// This example will build an array of values, then
// iterate through that array and replace each value with
// a formatted version of the number.  The new formatted
// number is echoed out to the screen

	// The regular expression is set to a variable.
	$regex = "/^[\w\d!#$%&'*+-\/=?^`{|}~]+(\.[\w\d!#$%&'*+-\/=?^`{|}~]+)*@([a-z\d][-a-z\d]*[a-z\d]\.)+[a-z][-a-z\d]*[a-z]$/";

	$values = array(
		"user@example.com",			 // Valid
		"first.last@mail.example.com",  // Valid
		"user",						 // Invalid
		"user@example",				 // Invalid
		"user_name@my_example_com",	 // Invalid
		"user0203@example.com",		 // Valid
		);

	// Go through each one, and use preg_replace to 
	// reformat the number
	foreach ($values as $value) {
		if (preg_match($regex, $value)) {
			printf("Found valid address:   %s\n", $value);
		} else {
			printf("INVALID address:   %s\n", $value);
		}
	}

?>
