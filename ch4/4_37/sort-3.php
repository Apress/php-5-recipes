<?php
  # Recipe 4-37 / Example 1

  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian', 'Snoopy' => 'Beagle');

  ksort($dogs);
  printf("<pre>%s</pre>\n", var_export($dogs, TRUE));
  krsort($dogs);
  printf("<pre>%s</pre>\n", var_export($dogs, TRUE));
?>
