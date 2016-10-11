<?php
  # Recipe 4-22 / Example 2

  $scores = array(91, 56, 87, 79);
  extract($scores, EXTR_PREFIX_ALL, 'score');

  print "<p>$score_0</p>";
  print "<p>$score_1</p>";
  print "<p>$score_2</p>";
  print "<p>$score_3</p>";
?>