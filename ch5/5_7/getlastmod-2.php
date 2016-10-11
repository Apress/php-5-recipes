<?php
  # Recipe 5-7  / Example 2
  
  # NOTE: The output you observe from running this
  # example will NOT match what is shown in the text.
  
  $lastmod = filemtime($_SERVER['SCRIPT_FILENAME']);

  echo 'This file was last updated on '
        . date('l d F Y, \a\t H:i:s T', $lastmod)
        . '.';
?>