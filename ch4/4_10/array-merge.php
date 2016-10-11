<?php
  # Recipe 4-10 examples (4)
  
  # Example 1
  
<?php
  function array_display($array, $pre=FALSE)
  {
    $tag = $pre ? 'pre' : 'p';
    printf("<%s>%s</%s>\n", $tag, var_export($array, TRUE), $tag);
  }

  $arr1 = array(1, 2, 3);
  $arr2 = array(10, 20, 30);
  $arr3 = array(5, 10, 15, 20);
  
  $comb1 = array_merge($arr1, $arr2);
  $comb2 = array_merge($arr2, $arr1);
  $comb3 = array_merge($arr3, $arr2, $arr1);
  
  array_display($comb1);
  array_display($comb2);
  array_display($comb3);
?>

<?php
  # Example 2
  
  $arr4 = array(10 => 'a', 11 => 'b', 12 => 'c');
  
  array_display(array_merge($arr1, $arr4), TRUE);
  array_display($arr1 + $arr4, TRUE);
?>

<?php
  # Example 3
  $arr5 = array(1 => 'x', 2 => 'y', 3 => 'z');
  
  array_display(array_merge($arr1, $arr5), TRUE);
  array_display($arr1 + $arr5, TRUE);
?>

<?php
  # Example 4

  $dogs1 = array( 'Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                  'Rin-Tin-Tin' => 'Alsatian');

  $dogs2 = array('Ringo' => 'Dachshund', 'Traveler' => 'Setter');

  array_display(array_merge($dogs1, $dogs2), TRUE);
  array_display($dogs1 + $dogs2, TRUE);
?>