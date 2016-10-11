<?php
  # Recipe 4-35 / Example 2

  function array_display($array, $pre=FALSE)
  {
    $tag = $pre ? 'pre' : 'p';
    printf("<%s>%s</%s>\n", $tag, var_export($array, TRUE), $tag);
  }
  
  $arr = array(2, 'two', 0, 'NULL', NULL, 'FALSE', FALSE, 'empty', '');
  $copy = array_filter($arr);
  $reindexed = array_values($copy);

  print '<p>Original:</p>';
  array_display($arr, TRUE);
  print '<p>Filtered:</p>';
  array_display($copy, TRUE);
  print '<p>Filtered and re-indexed:</p>';
  array_display($reindexed, TRUE);
?>