<?php

	//sample11_5.php

	//Function that will take in a set of values, calculate them, then return the values.
	function addandsubtract ($firstvalue, $secondvalue){
		//The first thing we need to do is add the values.
		$firstreturnvalue = ($firstvalue + $secondvalue);
		$secondreturnvalue = ($firstvalue - $secondvalue);
		
		//Now, you declare an array.
		$myarray = array ();
		
		//Then put the two return values into the first two indexes of the array.
		$myarray[0] = $firstreturnvalue;
		$myarray[1] = $secondreturnvalue;
		
		//Then we can return the entire array.
		return $myarray;
	}
	
	//Now, when you call the function, it will return the two values in array format.
	$myarray = array ();
	$myarray = addandsubtract (10, 3);
	
	echo $myarray[0] . "<br />"; //Will echo 13.
	echo $myarray[1]; //Will echo 7.
?>