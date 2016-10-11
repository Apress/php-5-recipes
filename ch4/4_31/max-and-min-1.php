<?php
  # Recipe 4-31 / Example 1
  
  $prices = array(12.95, 24.5, 10.5, 5.95, 7.95);
  
  printf("<p>Highest price: \$%.2f; lowest price: \$%.2f.</p>\n",
          max($prices, min($prices));
?>