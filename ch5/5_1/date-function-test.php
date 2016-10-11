<?php
  # Recipe 5-1  / Example 2
  
  # NOTE: When you run this example, do NOT expect the output 
  # to match that shown in the text!
  
  $time = time();
  $formats = array(
                    'U', 
                    'r', 
                    'c', 
                    'l, F jS, Y, g:i A', 
                    'H:i:s D d M y', 
                    'm/j/y g:i:s a O (T)'
                  );

  foreach($formats as $format)
    echo "<p><b>$format</b>: " . date($format) . "</p>\n";
?>