<?php

	//sample12_18.php

	//Here is an example of retrieving an environmental variable or two.
	echo $_ENV['ProgramFiles'] . "<br />"; //Outputs C:\Program Files.
	echo $_ENV['COMPUTERNAME'] . "<br />"; //Outputs BABINZ-CODEZ.
	echo getenv("COMPUTERNAME") . "<br />"; //Also Outputs BABINZ-CODEZ.
	
	//Now, let's look at reading configuration variables.
	echo ini_get ("post_max_size") . "<br />"; //Outputs 8MB.
	
	//And we can output the entire listing with this function.
	print_r (ini_get_all());
?>