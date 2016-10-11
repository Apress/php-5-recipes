<?php
// Example 10-7-1a.php
$fruits = array('apple', 'orange', 'pear', 'apricot', 'apple', 'apricot', 'orange', 'orange');
$fruit_count = array();
foreach ($fruits as $i=>$fruit) {
  @$fruit_count[$fruit]++;
}
asort($fruit_count);
foreach ($fruit_count as $fruit=>$count) {
  echo "$fruit = $count\n";
}
?>
