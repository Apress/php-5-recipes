<?php
  # Recipe 4-24

  $colours = array('red', 'yellow', 'green');

  $flavours = array('apple', 'banana', 'lime');
  $tastes = array('sweet', 'sour');
  $name = 'lemon';
  $prices = array();

  $arrays = array('name' => $name, 'prices' => $prices,
                        'flavours' => $flavours, 'tastes' => $tastes);

  foreach($arrays as $key => $value)
  {
    if($fruits = @array_combine($colours, $value))
      printf("<pre>%s</pre>\n", var_export($fruits, TRUE));
    else
      printf("<p>Couldn't combine \$colours and \$%s.</p>", $key);
  }
?>