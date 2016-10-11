<?php

  # Recipe 5-5  / Example 1

  $mydates = array('2005-01-01', '2005-06-30', '2005-12-31');
  
  foreach($mydates as $mydate)
  {
    $ts = strtotime($mydate);
    echo 'Tag Nr ' . date('z', $ts) . ': ' . strftime('%d %B %Y', $ts) . "<br />\n";
    echo date('r', $ts) . "<br />\n";
  }
?>