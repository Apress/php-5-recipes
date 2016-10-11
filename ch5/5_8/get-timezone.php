<?php
  # Recipe 5-8  / Example 2
  
  # NOTE: The output you observe from running this example
  # will very likely NOT match what is shown in the text.

  echo 'Output of <code>mktime()</code>: ' . mktime() . ".<br>\n";
  echo 'Output of <code>gmmktime()</code>: ' . gmmktime() . ".<br>\n";
  echo 'Local time zone: ' . date('O') . ".<br>\n";
?>