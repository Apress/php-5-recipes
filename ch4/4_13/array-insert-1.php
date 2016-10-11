<?php
  # Recipe 4-13

  function array_insert(&$array, $offset, $new)
  {
    array_splice($array, $offset, 0, $new);
  }

  $languages = array('German', 'French', 'Spanish');
  printf("<pre>%s</pre>\n", var_export($languages, TRUE));

  array_insert($languages, 1, 'Russian');
  printf("<pre>%s</pre>\n", var_export($languages, TRUE));

  array_insert($languages, 3, array('Swedish', 'Italian'));
  printf("<pre>%s</pre>\n", var_export($languages, TRUE));

  $languages = array('German', 'French', 'Spanish');
  printf("<pre>%s</pre>\n", var_export($languages, TRUE));

  array_insert($languages, 6, 'Russian');
  printf("<pre>%s</pre>\n", var_export($languages, TRUE));

  $languages = array('German', 'French', 'Spanish');
  printf("<pre>%s</pre>\n", var_export($languages, TRUE));

  $languages[6] = 'Russian';
  printf("<pre>%s</pre>\n", var_export($languages, TRUE));

?>