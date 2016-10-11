<?php
  # Recipe 5-7  / Example 1
  
  # NOTE: The output you observe from running this
  # example will NOT match what is shown in the text.

  echo date('r', getlastmod()) . "<br />\n";
  echo date('c', getlastmod()) . "<br />\n";
  echo 'This file was last updated on ' 
        . date('l d F Y, \a\t H:i:s T', getlastmod()) 
        . '.';
?>