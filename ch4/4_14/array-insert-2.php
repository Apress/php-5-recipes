<?php
  # Recipe 4-14 (first example)

  function array_insert(&$array, $offset, $new)
  {
    array_splice($array, $offset, 0, $new);
  }

  $languages1 = array('German', 'French', 'Spanish');

  array_insert($languages1, 6, 'Russian');
  printf("<pre>%s</pre>\n", var_export($languages1, TRUE));

  $languages2 = array('German', 'French', 'Spanish');
  $languages[6] = 'Russian';

  printf("<pre>%s</pre>\n", var_export($languages2, TRUE));
?>