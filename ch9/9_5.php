<?php
// This example will iterate through the array 
// and check the values to see which one is a 
// valid Pascal Case name.

	$values = array(
		"PascalCase", // Valid
		"notPascalCase",  // Invalid
		"not_valid",  // Valid
		"Valid",  // Valid
		"ValidPascalName",  // Valid
		"_notvalid",  // Not Valid
		);

	foreach ($values as $value) {
		if(preg_match("/^([A-Z][a-z]+)+$/", $value)) {
			printf("'%s' is a valid name.\n", $value);	
		} else {
			printf("'%s' is NOT a valid name.\n", $value);	
		}
	}

?>
