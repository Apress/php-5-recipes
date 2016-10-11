<?php
	$astring = "Hello\nWorld\n\nHow are you?";
	echo nl2br ($astring) . "<br />";
	
	$textblock = "See spot run, run spot run.  See spot roll, run spot roll!";
	echo wordwrap ($textblock, 20, "<br />");
?>