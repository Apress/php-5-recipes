<?php
	//sample1_2.php

	//You could assign an integer value this way:
	$myint = 10;
	//Then you could simply output it as so:
	echo $myint . "<br />";
	//But in order to MAKE SURE the value is an integer, it is more
	//practical to do it like this:
	echo (int) $myint . "<br />";
	//That way, when something like this occurs:
	$myint = 10 / 3;
	//You can still retain an integer value like this:
	echo (int) $myint . "<br />"; //echos a 3.
  
	//Let's say you live in Canada and want to add GST tax to your amount.
	$thenumber = 9.99 * 1.07;
	//If you simply outputted this, the value would be skewed.
	echo "$" . $thenumber . "<br />"; //Ouputs $10.6893
	//In order to show the value as a dollar amount, we can do this:
	echo "$" . sprintf ("%.2f", $thenumber); //Ouputs $10.69

?>