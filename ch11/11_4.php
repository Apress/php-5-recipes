<?php

	//sample11_4.php

	//A function to add up any number of values.
	function addanything (){
		//Default the return value.
		$total = 0;
		//Get the full list of arguments passed in.
		$args = func_get_args ();
		//Loop through the arguments.
		for ($i = 0; $i < count ($args); $i++){
			//Make sure the value is an integer.
			if (is_int ($args[$i])){
				//And add to it if necessary.
				$total += $args[$i];
			}
		}
		//Then return the total.
		return $total;
	}
	
	//Now, you can pass the function any numbers.
	echo addanything (1,5,7,8,11) . "<br />"; //Outputs 32.
	echo addanything (1,1) . "<br />"; //Outputs 2.
	//It will ignore non-integer values.
	echo addanything (1,1,"Hello World"); //Still outputs 2.
?>