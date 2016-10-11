<?php
	//sample1_3.php

	//Set up a standard array.
	$myarray = array("1","2","3");
	//You can access values from the array as simple as this:
	echo $myarray[0]; //Would output "1".
	//Or with a for loop.
	for ($i = 0; $i < count ($myarray); $i++){
		echo $myarray[$i] . "<br />";
	}	

	//Setting up an associative array is similarily easy.
	$myassocarray = array ("mykey" => 'myvalue', "another" => 'one');
	//And there is the handy while, each method for extracting info from
	//associative arrays.
	while ($element = each ($myassocarray)) {
		echo "Key - " . $element['key'] . " and Value - " . $element['value'] . "<br />";
	}

?>