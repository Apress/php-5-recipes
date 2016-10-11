<?php
  # Recipe 4-31 / Example 3
  
  $clothes = array( 'hats' => 75, 'coats' => 32, 'shoes' => 102,
                    'gloves' => 15, 'shirts' => 51, 'trousers' => 44);

  $names = array_keys($clothes);
  $items = array_values($clothes);

  array_multisort($items, $names);

  $num = count($clothes) - 1;

  printf("<p>Most items: %s (%d); least items: %s (%d).</p>\n",
          $names[$num], $items[$num], $names[0], $items[0]);
?>