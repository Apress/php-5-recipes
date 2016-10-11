<?php
// Example 10-8-2.php
include 'cache.inc';

$cache = new Cache('data');
if ($cache->Check()) {
  echo "Retreiving values from cache\n";
  $arr = $cache->GetValue('arr');
  $fruits = $cache->GetValue('fruits');
  print_r($arr);
}
else {
  $arr = array("apple", "orange", "apricot");
  $fruits = sizeof($arr);
  $cache->SetValue('arr', $arr);
  $cache->SetValue('fruits', $fruits);
  $cache->Save();
  echo "Values are storred in cache\n";
}
?>