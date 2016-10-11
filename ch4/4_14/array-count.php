<?php
  # Recipe 4-14 (second example)

  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog', 'Rin-Tin-Tin' => 'Alsatian');

  $birds = array('parrot', 'magpie', 'lorakeet', 'cuckoo');

  printf("<p>There are %d dogs and %d birds.</p>", count($dogs), count($birds));

  $birds[] = 'ibis';
  printf("<p>There are %d birds:</p>", count($birds));
  printf("<pre>%s</pre>\n", var_export($birds, TRUE));

  $birds[10] = 'heron';
  unset($birds[3]);
  printf("<p>There are %d birds:</p>", count($birds));
  printf("<pre>%s</pre>\n", var_export($birds, TRUE));
?>