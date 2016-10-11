<?php
  # Recipe 5-11 / Example 1

  $date1 = '14 Jun 2002';
  $date2 = '05 Feb 2006';

  $ts1 = strtotime($date1);
  $ts2 = strtotime($date2);

  printf("<p>The difference between %s and %s is %d seconds.<p>\n",
          $date1, $date2, $ts2 - $ts1);
?>
