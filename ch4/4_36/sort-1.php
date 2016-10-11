<?php
  # Recipe 4-36 / Example 1
  
  $nums = array(15, 2.2, -4, 2.3, 0);

  sort($nums);

  printf("<pre>%s</pre>\n", var_export($nums, TRUE));

  $words = array('bird', 'fish', 'George', 'Aden');

  sort($words);

  printf("<pre>%s</pre>\n", var_export($words, TRUE));

  $chars = implode('', array_map('chr', range(32, 255)));
  print $chars;



  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian', 'Snoopy' => 'Beagle');

  sort($dogs);
  printf("<pre>%s</pre>\n", var_export($dogs, TRUE));;
?>