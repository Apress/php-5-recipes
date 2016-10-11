<?php
// If the form is being posted to itself, it will take
// the value inside the text box and print it back out
// to the HTML with the smart quotes replaced with straight 
// quotes.
$orig = '“Hello world!”'
$mynewstr = preg_replace('/\x93|\x94/', '"', $orig);
print "$mynewstr\n";
?>
