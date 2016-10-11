<?php
  # Recipe 4-40
  
  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian', 'Snoopy' => 'Beagle');

  array_reverse($dogs);
  printf("<pre>%s</pre>\n", var_export($dogs, TRUE));
?>
