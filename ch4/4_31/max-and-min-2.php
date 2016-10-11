<?php
  # Recipe 4-31 / Example 2
  
  $clothes = array( 'hats' => 75, 'coats' => 32, 'shoes' => 102,
                    'gloves' => 15, 'shirts' => 51, 'trousers' => 44);

  uasort($clothes, 'evenfirst');
  var_export($clothes);
  
  printf("<p>Most items: %d; least items: %d.</p>\n",
          max($clothes), min($clothes));
?>