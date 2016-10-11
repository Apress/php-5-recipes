<?php
  # Recipe 4-34 / Example 1

  function array_display($array, $pre=FALSE)
  {
    $tag = $pre ? 'pre' : 'p';
    printf("<%s>%s</%s>\n", $tag, var_export($array, TRUE), $tag);
  }

  function calc_sqrt($num)
  {
    $i = $num < 0 ? 'i' : '';
    return sqrt( abs($num) ) . $i;
  }

  $values = array(3, 8, -3, 0, 14, -4);

  $roots = array_map('calc_sqrt', $values);

  print '<p>Values:</p>';
  array_display($values, TRUE);

  print '<p>Square roots:</p>';
  array_display($roots, TRUE);
?>