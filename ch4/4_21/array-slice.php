<?php
  # Recipe 4-21

  $languages = array( 'French', 'German', 'Russian', 'Chinese',
                      'Hindi', 'Quechua', 'Spanish', 'Hausa');
  printf("<pre>Original array:\n%s</pre>\n", var_export($languages, TRUE));

  $slice1 = array_slice($languages, 2, 4);
  printf("<pre>Slice 1:\n%s</pre>\n", var_export($slice1, TRUE));

  $slice2 = array_slice($languages, 2, 4, TRUE);
  printf("<pre>Slice 2:\n%s</pre>\n", var_export($slice2, TRUE));

  $slice3 = array_slice($languages, -6, -2, TRUE);
  printf("<pre>Slice 3:\n%s</pre>\n", var_export($slice3, TRUE));

  $last3 = array_slice($languages, -3);
  printf("<p>Last 3: %s</p>\n", var_export($last3, TRUE));

  $last3 = array_slice($languages, -3, 3, TRUE);
  printf("<p>Last 3: %s</p>\n", var_export($last3, TRUE));
?>