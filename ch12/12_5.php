<?php

	//sample12_5.php

	//We will assume that this scripts main focus is to validate against a blank entry.
	if (trim ($_POST['yourname']) == ""){
		header ("Location: sample12_5.html");
		exit;
	}
	//If we have a value, then it would do something with said value. Like, say, output it.
	echo $_POST['yourname'];
	
?>