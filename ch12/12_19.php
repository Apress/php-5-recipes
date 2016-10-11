<?php

	//sample12_19.php

	//Setting an environment variable in php is as easy as assigning it.
	echo $_ENV['COMPUTERNAME'] . "<br />"; // Echoes BABINZ-CODEZ.
	$_ENV['COMPUTERNAME'] = "Hello World!";
	echo $_ENV['COMPUTERNAME'] . "<br />"; //Echoes our new COMPUTERNAME.
	//Of course the change is only relevant for the current script.
	
	//Setting a configuration variable is the same in that it only is in effect for
	//the duration of the script.
	echo ini_get ('post_max_size'); //Echoes 8MB.
	
	//Then we set it to 200M for the duration of the script.
	ini_set('post_max_size','200M');
	
	//Any files that are to be uploaded in this script will be ok up to 200M.
?>