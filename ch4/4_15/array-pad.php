<?php
  # Recipe 4-15 (second example)

  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian');
  $birds = array('parrot', 'magpie', 'lorakeet', 'cuckoo');

  $pups = array_pad($dogs, 6, 'mutt');
  $more_birds = array_pad($birds, 6, 'some bird');

  printf("<p>Pups:</p><pre>%s</pre>\n", var_export($pups, TRUE));
  printf("<p>More birds:</p><pre>%s</pre>\n", var_export($more_birds, TRUE));

  $pups = array_pad($dogs, -6, 'mutt');
  $more_birds = array_pad($birds, -6, 'some bird');

  printf("<p>Pups:</p><pre>%s</pre>\n", var_export($pups, TRUE));
  printf("<p>More birds:</p><pre>%s</pre>\n", var_export($more_birds, TRUE));

  printf("<p>Dogs:</p><pre>%s</pre>\n", var_export($dogs, TRUE));
  printf("<p>Birds:</p><pre>%s</pre>\n", var_export($birds, TRUE));

?>