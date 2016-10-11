<?php
  # Recipe 4-16

  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'German Shepherd', 'Snoopy' => 'Beagle');

  foreach($dogs as $name => $breed)
    print "$name is a $breed.<br />\n";

  $birds = array('parrot', 'magpie', 'lorakeet', 'cuckoo');

  foreach($birds as $bird)
    print "$bird ";

  print "<br />";

  $birds[] = 'ibis';
  $birds[10] = 'heron';
  unset($birds[3]);

  foreach($birds as $bird)
    print "$bird ";
?>