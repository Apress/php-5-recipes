<?php
	//sample1_6.php

	//Here we create then call a simple function that outputs something.
	function helloworld (){
		echo "Hello World!<br />";
	}
	//We call it as easy as this:
	helloworld();
	
	//Creating and calling a function that accepts arguments is just as easy.
	function saysomething ($something){
		echo $something . "<br />";
	}
	Saysomething ("Hello World!"); //This would output "Hello World!"

	//And of course we can have our function return something as well.
	function addvalues ($firstvalue, $secondvalue){
		return $firstvalue + $secondvalue;
	}
	$newvalue = addvalues (1,3); 
	echo $newvalue; //Would echo "4".

?>