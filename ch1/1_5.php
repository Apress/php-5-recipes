<?php
	//sample1_5.php

	$email = "lee@babinplanet.ca"; 
	echo preg_match("/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+[a-zA-Z0-9_-]$/",$email); //Would return 1 (true).
	echo "<br />";
	$bademail = "leebabin.ca";
	echo preg_match("/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+[a-zA-Z0-9_-]$/",$bademail); //Would return 0 (false).

?>