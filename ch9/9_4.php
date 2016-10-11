<?php

	$good_ip = "192.168.0.1";
	$bad_ip = "1.334.10.10";

	if (ereg("^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$", $good_ip)) {
		echo "'" . $good_ip . "' is a valid ip address.\n";
	} else {
		echo "'" . $good_ip . "' is an INVALID ip address.\n";
	}

	if (ereg("^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$", $bad_ip)) {
		echo "'" . $bad_ip . "' is a valid ip address.\n";
	} else {
		echo "'" . $bad_ip . "' is a INVALID ip address.\n";
	}

?>
