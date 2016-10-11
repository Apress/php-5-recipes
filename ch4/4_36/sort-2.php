<?php
  # Recipe 4-36  / Example 2

  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian', 'Snoopy' => 'Beagle');

  asort($dogs);
  printf("<pre>%s</pre>\n", var_export($dogs, TRUE));
?>