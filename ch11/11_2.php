<?php

	//sample11_2.php

	//A function to return the sum of three values.
	function addvalues ($value1 = 0, $value2 = 0, $value3 = 0){
		//Now the function takes the three values and adds them.
		$total = $value1 + $value2 + $value3;
		return $total;
	}
	
	//Now, if you forget a value or two, it will still work.
	echo addvalues (1) . "<br />"; //Echoes a 1.
	//If you pass all the arguments, you will still get a valid result.
	echo addvalues (1,2,3); //Echoes a 6.
?>