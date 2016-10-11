<?php

	echo soundex ("Apress") . "<br />";
	echo soundex ("ahhperess") . "<br />";
	
	echo soundex ("Lee") . "<br />";
	echo soundex ("lhee") . "<br />";
	
	echo soundex ("babin") . "<br />";
	echo soundex ("bahbeen") . "<br />";
	
	//Now, say I wanted to buy a xylophone online but had no idea how to spell it.
	echo soundex ("xylophone") . "<br />";
	
	//Here is a common mispelling no doubt.
	echo soundex ("zilaphone");
	//Note, how the end 3 numbers are the same?  That could be used to perform a match!
	
?>