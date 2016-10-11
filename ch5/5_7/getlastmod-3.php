<?php
  # Recipe 5-7  / Example 3
  
  # NOTE: The output you observe from running this
  # example will NOT match what is shown in the text.
  
  $file = "testfile.html";
  echo "The file <b>$file</b> was last updated on "
        . date('l d F Y, \a\t H:i:s T', filemtime("./$file"))
        . '.';
?>