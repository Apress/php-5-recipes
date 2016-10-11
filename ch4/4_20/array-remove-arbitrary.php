<?php
  # Recipe 4-20 (first example)

  function array_remove(&$array, $offset, $length=1)
  {
    return array_splice($array, $offset, $length);
  }

  $languages = array( 'French', 'German', 'Russian', 'Chinese',
                      'Hindi', 'Quechua', 'Spanish', 'Hausa');

  printf("<p>Original array:</p><pre>%s</pre>\n", var_export($languages, TRUE));


  $removed = array_remove($languages, 2);
  printf("<p>Removed: %s<br />Remaining:</p><pre>%s</pre>\n",
          var_export($removed, TRUE), var_export($languages, TRUE));
          

  $removed = array_remove($languages, 0, 3);
  printf("<p>Removed: %s<br />Remaining:</p><pre>%s</pre>\n",
          var_export($removed, TRUE), var_export($languages, TRUE));
?>