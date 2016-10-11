<?php
	function searchtext ($haystack, $needle){
		//First, let's deduce whether there is any point in going on with our little
		//string hunting charade.
		if (substr_count ($haystack, $needle) == 0){
			echo "No instances were found of this search query";
		} else {
			//Now, we will go through the haystack, and find out the 
			//different positions that the string occurs at, then output them.
			
			//We will start searching at the beginning.
			$startpos = 0;
			//And we will set a flag to stop searching once there are no more matches.
			$lookagain = true;
						
			//Now, we search while there are still matches.			
			while ($lookagain){
				if ($pos = strpos ($haystack, $needle, $startpos)){
					echo "The search term \"$needle\" was found at position:$pos<br /><br />";
					//We increment the position we are searching in order to continue on.
					$startpos = $pos + 1;
				} else {
					//If there are no more matches then we want to break out of the loop.
					$lookagain = false;
				}
			}
			
			echo "Your search for \"$needle\" within \"$haystack\" returned a total of \"" . substr_count ($haystack, $needle) . "\" matches.";
		}
	}
	
	searchtext ("Hello World!","o");
?>
