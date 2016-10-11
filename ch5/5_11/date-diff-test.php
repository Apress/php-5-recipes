<?php
  # Recipe 5-11 / Example 3 (second part)

  require('./date-diff.php');
  
  $arrived = mktime(11, 30, 0, 6, 9, 2002);
  $departed = mktime(17, 20, 0, 6, 22, 2002); 

  $holiday = date_diff($arrived, $departed);

  printf("<pre>%s</pre>\n", print_r($holiday, TRUE)); 
  
  $components = $holiday["components"];
  
  $output = array();
  
  foreach($components as $period => $length)
    if($length > 0)
      $output[] = "$length $period";
  
  printf("<p>My holiday in Auckland began on %s, and lasted %s.</p>\n", 
          date('l, jS F Y', $arrived), implode($output, ', '));
?>