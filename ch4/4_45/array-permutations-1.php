<?php
  # Recipe 4-45 / Example 1

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

  function catch_duplicate_chars($val)
  {
    $arr = str_split($val);
    return $arr == array_unique($arr);
  }

  $test = array_permutations(array('a', 'b', 'c'), 2);

  $display = '';
  foreach($test as $row)
    $display .= implode('', $row) . "\n";

  print "<pre>$display</pre>";

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
?>