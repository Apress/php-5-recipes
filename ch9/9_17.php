<?php
// This array holds different passwords, some good and
// some bad.  The script will iterate through the 
// array and use a regular expression to find the good
// passwords.

	$values = array(
		"password",    // Bad
		"P4ssw0rd",    // Good
		"XRokzX0z12k", // Good`
		"I5NB5YzW",    // Good
		"secret",      // Bad
		"12345",       // Bad
		);


	// Go through the array of values and look at each password 
	// to see if it's a good one or not.
	foreach ($values as $value) {
		if (! preg_match( '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,16}/', $value)) {
			printf("Bad password:  '%s'\n", $value);
		} else { 
			printf("Good password:  '%s'!\n", $value);
		}
	}
?>
