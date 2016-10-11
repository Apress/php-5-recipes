<?php
  # Recipe 4-20 (second example)
  
  $languages = array( 'French', 'German', 'Russian', 'Chinese',
                      'Hindi', 'Quechua', 'Spanish', 'Hausa');

  printf("<pre>Original array:\n%s</pre>\n", var_export($languages, TRUE));


  $num = 2;
  
  $removed1 = array_remove($languages, 0, $num);
  $removed2 = array_remove($languages, count($languages) - $num, $num);

  printf("<p>Removed (start): %s<br />Removed (end): %s<br />Remaining: %s</p>\n",
          var_export($removed1, TRUE),
          var_export($removed2, TRUE),
          var_export($languages, TRUE));
?>