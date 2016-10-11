<?php
  # Recipe 4-38

  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian', 'Snoopy' => 'Beagle');

  arsort($dogs);
  printf("<pre>%s</pre>\n", var_export($dogs, TRUE));
?>