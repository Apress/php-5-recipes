<?php
	$blankspaceallaround = " somepassword ";
	//This would result in all blank spaces being removed.
	echo trim ($blankspaceallaround) . "<br />";
	//This would result in only the blank space at the beginning being trimmed.
	echo ltrim ($blankspaceallaround) . "<br />";
	//And, as you can imagine, only the blank space at the end would be trimmed here.
	echo rtrim ($blankspaceallaround) . "<br />";
?>