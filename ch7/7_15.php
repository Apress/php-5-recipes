<?php

	//sample7_15.php
	
	//Create a new instance of a recursivedirectoryiterator.
	$di = new RecursiveDirectoryIterator ("sample4");
	
	function dirrecurse ($di){
	
		//Cycle through the directory.
		for ( ; $di->valid(); $di->next()){
			//Ensure that we have a directory and exclude the dots.
			if ($di->isDir() && !$di->isDot()){
				//Output the directories in bold.
				?><span style="font-weight: bold;"><?php echo $di->current(); ?></span><?php
				?><div style="margin-left: 10px;"><?php
				//Check if the current directory has any children.
				if ($di->hasChildren()){
					//And if so, run the function again.
					dirrecurse ($di->getChildren());
				}
				?></div><?php
			//Else, if we have a file.
			} elseif ($di->isFile()){
				//Then echo the file.
				echo $di->current() . "<br />";
			}
		}
		
	}
	
	//Run the recursion.
	dirrecurse ($di);
?>