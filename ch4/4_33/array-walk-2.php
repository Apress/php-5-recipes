<?php
  # Recipe 4-33 / Example 2

  function array_display($array, $pre=FALSE)
  {
    $tag = $pre ? 'pre' : 'p';
    printf("<%s>%s</%s>\n", $tag, var_export($array, TRUE), $tag);
  }
  
  function change(&$element, $key, $mark)
  {
    $element = "$mark$key$mark, the $element";
  }

  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian', 'Snoopy' => 'Beagle');
  array_display($dogs, TRUE);

  array_walk($dogs, 'change', '*');
  array_display($dogs, TRUE);
?>