<?php
  # "Removing Elements" introductory example
  
  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'German Shepherd', 'Snoopy' => 'Beagle');

  printf("<pre>%s</pre>\n", var_export($dogs, TRUE));

  unset($dogs['Rin-Tin-Tin']);
  printf("<pre>%s</pre>\n", var_export($dogs, TRUE));
?>