<?php

	//sample11_8.php

	//A function to add two values.
	function addvalues ($firstvalue = 0, $secondvalue = 0){
		return $firstvalue + $secondvalue;
	}
	
	//A function to subtract two values.
	function subtractvalues ($firstvalue = 0, $secondvalue = 0){
		return $firstvalue - $secondvalue;
	}
	
	//A function to multiply two values.
	function multiplyvalues ($firstvalue = 0, $secondvalue = 0){
		return $firstvalue * $secondvalue;
	}
	
	//And let's assume these are the values you want to work with.
	$firstvalue = 10;
	$secondvalue = 3;

	//Let's say this value represents a user submitted value.
	$whattodo = "addvalues";
		
	//You can then call the function as a variable.
	echo $whattodo($firstvalue, $secondvalue) . "<br />";
	
	//Let's say this value represents a user submitted value.
	$whattodo = "subtractvalues";
		
	//You can then call the function as a variable.
	echo $whattodo($firstvalue, $secondvalue) . "<br />";
	
	//Let's say this value represents a user submitted value.
	$whattodo = "multiplyvalues";
		
	//You can then call the function as a variable.
	echo $whattodo($firstvalue, $secondvalue) . "<br />";
	
?>