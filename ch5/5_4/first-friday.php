<?php
  # Recipe 5-4  / Example 1
  
  # The output you see when running this will not match that in the text.

  $nextmonth = date('Y-' . (date('n') + 1) . '-01');
  $nextmonth_ts = strtotime($nextmonth);
  $firsttue_ts = strtotime("Tuesday", $nextmonth_ts);
  
  echo 'Today is ' . date('d M Y') . '.<br />\n';
  echo 'The first Tuesday of next month is ' . date('d M Y', $firsttue_ts) . '.';
?>
