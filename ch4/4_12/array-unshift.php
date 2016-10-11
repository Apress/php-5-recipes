<?php
  # Recipe 4-12

  $prices = array(5.95, 10.75, 11.25);
  
  printf("<p>%s</p>\n", implode(', ', $prices));
  
  array_unshift($prices, 10.85);
  printf("<p>%s</p>\n", implode(', ', $prices));
  
  array_unshift($prices, 3.35, 17.95);
  printf("<p>%s</p>\n", implode(', ', $prices));
?>