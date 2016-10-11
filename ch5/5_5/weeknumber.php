<?php
  # Recipe 5-5  / Example 2

  $mydates = array('2005-01-01', '2005-01-03', '2005-05-22', '2005-05-23', '2005-12-31');
  
  foreach($mydates as $mydate)
    echo date("D d M Y: \w\e\e\k W", strtotime($mydate)) . "<br />\n";
?>