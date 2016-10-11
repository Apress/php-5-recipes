<?php
// Example 10-7-1.php
$fruits = array('apple', 'orange', 'pear', 'apricot', 'apple', 'apricot', 'orange', 'orange');
$fruit_count = array();
foreach ($fruits as $i=>$fruit) {
  if (isset($fruit_count[$fruit])) {
    $fruit_count[$fruit]++;
  }
  else {
    $fruit_count[$fruit] = 1;
  }
}
asort($fruit_count);
foreach ($fruit_count as $fruit=>$count) {
  echo "$fruit = $count\n";
}
?>
