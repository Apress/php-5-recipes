<?php

	$theclientstext = "Hello, how are you today? I am fine!";

	if (strlen ($theclientstext) >= 30){
		echo substr ($theclientstext,0,29);
	} else {
		echo $theclientstext;
	}

?>