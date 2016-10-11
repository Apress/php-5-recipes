<?php
  # Recipe 4-46

  function array_permutations($input, $num)
  {
    $perms = $indexed = $output = array();
    $base = count($input);
    $i = 0;

    foreach($input as $in)
      $indexed[$i++] = $in;

    foreach(range(0,pow($base, $num) - 1) as $i)
      $perms[] = sprintf("%'0{$num}d", base_convert($i, 10, $base));

    $perms = array_filter($perms, 'catch_duplicate_chars');

    foreach($perms as $perm)
    {
      $temp = array();

      foreach(str_split($perm) as $digit)
        $temp[] = $indexed[$digit];

      $output[] = $temp;
    }

    return $output;
  }

  function array_combinations($input, $num)
  {
    $combos = array();
    foreach(array_permutations($input, $num) as $row)
    {
      $copy = $row;
      sort($copy);
      $combos[implode('', $row)] = implode('', $copy);
    }

    return array_keys( array_unique($combos) );
  }
  
  $array_combinations = array_combinations(array('a', 'b', 'c', 'd'), 3);

  $display = '';
  foreach($array_combinations as $row)
    $display .= "$row\n";

  print "<pre>$display</pre>";
  
  # Uncomment the following for an additional example that was cut from the text
  
/*
  $array_combinations = array_combinations(array('A', 'N', 'L', 'D', 'E', 'G', 'N'), 7);

  $display = '';
  foreach($array_combinations as $row)
    $display .= "$row\n";

  print "<pre>$display</pre>";
*/
?>