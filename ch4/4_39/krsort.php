<?php
  # Recipe 4-39

  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian', 'Snoopy' => 'Beagle');

  ksort($dogs);
  printf("<pre>%s</pre>\n", var_export($dogs, TRUE));
?>
