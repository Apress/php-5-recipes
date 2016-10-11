<?php
	// The test string has two words in quotes.  The 
	// greedy matching will replace everything from
	// the first to the last quotes.
	$teststring = '"Hello" and "Goodbye."';
	// This result will contain 
	// "***" 
	// because everything from the first to the last " is replaced.
	$greedyresult = preg_replace('/".*"/', '"***"', $teststring);
	// This  result will be:
	// "***" and "***"
	// because the match stops at the first " found.
	$nongreedyresult = preg_replace('/".*?"/', '"***"', $teststring);
	echo "Original: $teststring\n";
	echo "Greedy Replace: $greedyresult\n";
	echo "Non-Greedy Replace: $nongreedyresult\n";
?>
