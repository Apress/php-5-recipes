<?php
  # Recipe 4-42 / Main example

  function evenfirst($i, $j)
  {
    $value = 0;

    if($i % 2)$value++;
    if($j % 2)$value--;

    if($value == 0)
      $value = $i < $j;

    return $value;
  }

  $clothes = array( 'hats' => 75, 'coats' => 32, 'shoes' => 102,
                    'gloves' => 15, 'shirts' => 51, 'trousers' => 44);

  usort($clothes, 'evenfirst');

  var_export($clothes);

  # Extensions/Variations follow...

  $clothes = array( 'hats' => 75, 'coats' => 32, 'shoes' => 102,
                    'gloves' => 15, 'shirts' => 51, 'trousers' => 44);

  uasort($clothes, 'evenfirst');

  var_export($clothes);

  printf("<p>Most items: %s; least items: %s.</p>\n",
          max($clothes), min($clothes));

  $clothes = array( 'hats' => 75, 'coats' => 32, 'shoes' => 102,
                    'gloves' => 15, 'shirts' => 51, 'trousers' => 44);
  $names = array_keys($clothes);
  $items = array_values($clothes);
  array_multisort($items, $names);
  $num = count($clothes) - 1;

  printf("<p>Most items: %s (%d); least items: %s (%d).</p>\n",
          $names[$num], $items[$num], $names[0], $items[0]);
?>