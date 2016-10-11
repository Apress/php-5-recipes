<?php
  # Recipe 5-6

  //  takes a 2- or 4-digit year,
  //  returns 1 or 0
  function is_leap_year($year)
  {
    $ts = strtotime("$year-01-01-");
    return date('L', $ts);
  }

  //  test the function
  for($i = 2000; $i <= 2010; $i++)
  {
    $output = "$i is ";
    if( !is_leap_year($i) )
      $output .= "not ";
    $output .= "a leap year.<br />\n";
    
    echo $output;
  }
?>