<?php
  # Recipe 4-33 / Example 1

  function array_display($array, $pre=FALSE)
  {
    $tag = $pre ? 'pre' : 'p';
    printf("<%s>%s</%s>\n", $tag, var_export($array, TRUE), $tag);
  }

  function modify(&$element)
  {
    $element *= 1.5;
  }

  $array = array(10, -3.5, 2, 7);
  array_display($array, TRUE);

  array_walk($array, 'modify');
  array_display($array, TRUE);
?>