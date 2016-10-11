<?php
  # Recipe 4-37 / Example 2

  $nums = array(15, 2.2, -4, 2.3, 0);
  asort($nums);
  printf("<pre>%s</pre>\n", var_export($nums, TRUE));
  ksort($nums);
  printf("<pre>%s</pre>\n", var_export($nums, TRUE));
?>