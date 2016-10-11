<?php
  # Recipe 4-19
  
  $languages = array('French','German','Russian','Chinese','Hindi', 'Quechua');

  printf("<p>Original array:</p><pre>%s</pre>\n", var_export($languages, TRUE));

  $removed = array_shift($languages);
  printf("<p>Using array_shift():<br />Removed element: %s</p><pre>%s</pre>\n",
          $removed, var_export($languages, TRUE));
          
  $removed = array_pop($languages);
  printf("<p>Using array_pop():<br />Removed element: %s</p><pre>%s</pre>\n",
          $removed, var_export($languages, TRUE));
          
  unset( $languages[count($languages) - 1] );
  printf("<p>Using unset() and count():</p><pre>%s</pre>\n",
          var_export($languages, TRUE));
?>