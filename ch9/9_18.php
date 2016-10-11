<?php

// This example will match valid GUID/UUIDs in
// the format specified at http://en.wikipedia.org/wiki/GUID

$uuid = "B15BC71E-D94C-11D9-9D71-000A95B70106";
$bad = "E34B13ED-D94C-11D9-9628-Z00A95B70106";

function printResults($str) {
	// Alternatively, you could also add [0-9a-f]{32} with |
	// to look for either format--with or without dashes.
	if (eregi("^[0-9a-f]{8}(-[0-9a-f]{4}){3}-[0-9a-f]{12}$", $str)) {
		printf("'%s' is a valid GUID/UUID.\n", $str);
	} else {
		printf("'%s' is NOT a valid GUID/UUID.\n", $str);
	}
}

printResults($uuid);
printResults($bad);

?>
