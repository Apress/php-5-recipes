<?php
  # Recipe 5-4  / Example 3

  function find_weekday($month, $year, $weekday, $offset=1)
  {
    $month_ts = strtotime("$year-$month-01");
    if(--$offset > 0)
      $month_ts = strtotime("+$offset week", $month_ts);
    $month_ts = strtotime($weekday, $month_ts);
    return $month_ts;
  }

  echo date('d M Y', find_weekday(5, 2000, "Friday")) . "<br />";
  echo date('d M Y', find_weekday(5, 2000, "Friday", 1)) . "<br />";
  echo date('d M Y', find_weekday(5, 2000, "Fri", 2)) . "<br />";
  echo date('d M Y', find_weekday(5, 2000, "Friday", 3)) . "<br />";
  echo date('d M Y', find_weekday(5, 2000, "Friday", 4));

?>
