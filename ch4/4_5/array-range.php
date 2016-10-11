<?php
  # Recipe 4-5

  function array_list($array)         #  save a bit of typing
  {
    printf("<p>(%s)</p>\n", implode(', ', $array) );
  }
     
  $arr1 = range(5, 11);               # integer start/end
  array_list($arr1);
     
  $arr2 = range(0, -5);               # count backwards
  array_list($arr2);
     
  $arr3 = range(3, 15, 3);            # use $step to skip intervals of 3    
  array_list($arr3);
     
  array_list( range(20, 0, -5) );     # stepping backwards
  array_list( range(2.4, 3.1, .1) );  # fractional values  
  array_list( range('a', 'f') );      # produce a sequence of characters  
  array_list( range('M', 'A', -2) );  # skip every other letter going backwards
?>