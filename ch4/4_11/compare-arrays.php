<?php
  # Recipe 4-11
  
  function array_eq_ident($arr1, $arr2)
  {
    printf("<p>The two arrays are %sequal.</p>\n",
            $arr1 == $arr2 ? '' : 'not ');

    printf("<p>The two arrays are %sidentical.</p>\n",
            $arr1 === $arr2 ? '' : 'not ');
  }

  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian', 'Snoopy' => 'Beagle');

  $pups = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian', 'Snoopy' => 'Beagle');

  $mutts = array('Lassie' => 'Collie', 'Rin-Tin-Tin' => 'Alsatian',
                 'Bud' => 'Sheepdog','Snoopy' => 'Beagle');

  print "<p>\$dogs and \$pups:</p>\n" ;
  array_eq_ident($dogs, $pups);

  print "<p>\$dogs and \$pups:</p>\n" ;
  array_eq_ident($dogs, $mutts);
?>
<hr />
<?php
  # These are some additional examples that were cut from the book
  # due to consideraitons of space 

  $nums1 = array(2, 4, 6, 8);
  $nums2 = array(4, 8, 6, 2);
  $nums3 = array(1 => 4, 3 => 8, 2 => 6, 0 => 2);
  
  array_eq_ident($nums1, $nums2);
  array_eq_ident($nums1, $nums3);
?>
<hr />
<?php
  # How the >, <, ==, and === operators work with arrays...

  printf("<p>The two arrays are %sthe same.</p>\n",
          $dogs == $pups ? '' : 'not ');

  printf("<p>The two arrays are %sidentical.</p>\n",
          $dogs === $pups ? '' : 'not ');

  printf("<p>\$dogs is %sless than \$pups.</p>\n",
          $dogs < $pups ? '' : 'not ');

  printf("<p>\$dogs is %sgreater than \$pups.</p>\n",
          $dogs > $pups ? '' : 'not ');

  $pups['Laddie'] = 'Collie';

  printf("<p>The two arrays are %sthe same.</p>\n",
          $dogs == $pups ? '' : 'not ');

  printf("<p>\$dogs is %sless than \$pups.</p>\n",
          $dogs < $pups ? '' : 'not ');

  printf("<p>\$dogs is %sgreater than \$pups.</p>\n",
          $dogs > $pups ? '' : 'not ');

  unset($pups['Lassie']);

  printf("<p>The two arrays are %sthe same.</p>\n",
          $dogs == $pups ? '' : 'not ');

  printf("<p>\$dogs is %sless than \$pups.</p>\n",
          $dogs < $pups ? '' : 'not ');

  printf("<p>\$dogs is %sgreater than \$pups.</p>\n",
          $dogs > $pups ? '' : 'not ');

  unset($pups['Snoopy']);

  printf("<p>The two arrays are %sthe same.</p>\n",
          $dogs == $pups ? '' : 'not ');

  printf("<p>\$dogs is %sless than \$pups.</p>\n",
          $dogs < $pups ? '' : 'not ');

  printf("<p>\$dogs is %sgreater than \$pups.</p>\n",
          $dogs > $pups ? '' : 'not ');

  $pups = array('Lassie' => 'Collie', 'Rin-Tin-Tin' => 'Alsatian',
                 'Bud' => 'Sheepdog','Snoopy' => 'Beagle');

  printf("<p>The two arrays are %sthe same.</p>\n",
          $dogs == $pups ? '' : 'not ');

  printf("<p>The two arrays are %sidentical.</p>\n",
          $dogs === $pups ? '' : 'not ');

  printf("<p>\$dogs is %sless than \$pups.</p>\n",
          $dogs < $pups ? '' : 'not ');

  printf("<p>\$dogs is %sgreater than \$pups.</p>\n",
          $dogs > $pups ? '' : 'not ');
?>