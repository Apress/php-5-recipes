<?php
  # Recipe 4-25

  function array_display($array, $pre=FALSE)
  {
    $tag = $pre ? 'pre' : 'p';
    printf("<%s>%s</%s>\n", $tag, var_export($array, TRUE), $tag);
  }

  $fruits = array('red' => 'apple', 'yellow' => 'banana', 'green' => 'lime');

  $colours = array_keys($fruits);
  $flavours = array_values($fruits);

  array_display($fruits);
  array_display($colours);
  array_display($flavours);

  $fruits = array (
                    'apple' => array('colour' => 'red', 'texture' => 'crisp'),
                    'banana' => array('colour' => 'yellow', 'texture' => 'creamy'),
                    'lime' => array('colour' => 'green', 'texture' => 'pulpy')
                  );

  $names = array_keys($fruits);
  $qualities = array_values($fruits);

  array_display($fruits, TRUE);
  array_display($names, TRUE);
  array_display($qualities, TRUE);

  $animals = array(1 => 'dog', 3 => 'rabbit', 4 => 'monkey', 8 => 'cat');
  $pets = array_values($animals);

  array_display($animals);
  array_display($pets);
?>