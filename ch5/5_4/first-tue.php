<?php
  # Recipe 5-4  / Example 2
  
  # The output you see when running this will not match that in the text.
  
  echo 'Today is ' . date('d M Y') . '.';
  
  for($i = 1; $i <= 12; $i++)
  {
	  $nextmonth = date('Y-' . (date('n') + $i) . '-01');
	  $nextmonth_ts = strtotime($nextmonth);
	  $firsttue_ts = strtotime("Tuesday", $nextmonth_ts);
	  
	  echo '<br />The first Tuesday of ' . date('F', $firsttue_ts) 
	    . ' is ' . date('d M Y', $firsttue_ts) . '.';
  }
?>
