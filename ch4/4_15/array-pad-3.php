<?php
  # Recipe 4-15 (third example)

  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian');

  $pups = array_pad($dogs, 6, 'mutt');

  printf("<p>Pups:</p><pre>%s</pre>\n", var_export($pups, TRUE));

  $pups = array_pad($dogs, -6, 'mutt');

  printf("<p>Pups:</p><pre>%s</pre>\n", var_export($pups, TRUE));

  printf("<p>Dogs:</p><pre>%s</pre>\n", var_export($dogs, TRUE));
?>