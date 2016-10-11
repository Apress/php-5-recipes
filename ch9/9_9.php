<?php
// This example uses a negative look ahead, 
// to make sure that the word "world" is not
// found after "hello".

	$regex = "/\bhello\b(?!\sworld\b)/";

	$valid = "hello";
	$invalid = "hello world!";

	if (preg_match($regex, $valid)) {
		echo "Found match:  '" . $valid . "'\n";
	} else {
		echo "No match:  '" . $valid . "'\n";
	}

	if (preg_match($regex, $invalid)) {
		echo "Found match:  '" . $invalid . "'\n";
	} else {
		echo "No match:  '" . $invalid . "'\n";
	}

?>
