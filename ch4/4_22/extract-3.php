<?php
  # Recipe 4-22 / Example 3

  $points = array('home' => 21, 'away' => 13);

  extract($points, EXTR_REFS|EXTR_PREFIX_ALL, 'pts');

  $pts_home -= 4;
  $pts_away += 6;

  printf("<pre>%s</pre>", var_export($points, TRUE));
?>