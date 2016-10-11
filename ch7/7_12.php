<?php

	//sample7_12.php

  function outputfiles ($allowedtypes, $thedir){
	  
    //First, we ensure that the directory exists.
    if (is_dir ($thedir)){
	    
	  //Now, we scan the files in this directory using scandir.
	  $scanarray = scandir ($thedir);
	  
	  //Then we begin parsing the array.
	  //Since scandir() counts the "." and ".." file navigation listings
	  //as files, we should not list them.
	  for ($i = 0; $i < count ($scanarray); $i++){
		if ($scanarray[$i] != "." && $scanarray[$i] != ".."){
			
		  //Now, we check to make sure this is a file, and not a directory.
		  if (is_file ($thedir . "/" . $scanarray[$i])){
			  
			//Now, since we are going to allow the client to edit this file,
		    //we must check if it is read and writable.
		    if (is_writable ($thedir. "/" . $scanarray[$i]) && is_readable($thedir . "/" . $scanarray[$i])){
			    
			  //Now, we check to see if the file type exists within our allowed type array.
			  $thepath = pathinfo ($thedir . "/" . $scanarray[$i]);
			  if (in_array ($thepath['extension'], $allowedtypes)){
				  
				//If the file follows our stipulations, then we can proceed to output it.
		        echo $scanarray[$i] . "<br />";
			  }
		    }
	      }
	    }
	  }
    } else {
	  echo "Sorry, this directory does not exist.";
    }
  }
  //We then call the function pointed to the directory we want to look through.
  //In this case we pass it an array with allowed file extensions.
  //We want them to only edit .txt files.
  $allowedtypes = array ("txt","html");
  echo outputfiles ($allowedtypes, "sample2");
?>