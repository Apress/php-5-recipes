<?php
  # Recipe 4-18

  # First example

  $array = array('name' => 'Bill', 'age' => 32, 1 => '25 Main St.',
                 2 => 'Apt. 24', 'city' => 'San Francisco', 'state' => 'CA');

  print "<p>Using foreach:</p>\n<p>";
  foreach($array as $element)
    print("&middot; $element<br />\n");
  print "</ul>\n";

  print "<p>Using for:</p>\n<p>";
  $limit = count($array);
  for($i = 0; $i < $limit; $i++)
    printf("&middot; %s<br />\n", $array[$i]);
  print "</p>\n";

  # Second example

  print "<p>Using for:</p>\n<p>";
  $limit = count($array);
  for($i = 0; $i < $limit; $i++)
    if( isset($array[$i]) )
      printf("&middot; %s<br />\n", $array[$i]);
  print "</p>\n";
?>