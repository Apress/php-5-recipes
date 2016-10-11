<?php
// Example 14-8-4.php
$fp = fopen("http://localhost/14-7-3.php", "rt");
if ($fp) {
  $wddx = "";
  while(!feof($fp)) {
    $wddx .= fread($fp, 4096);
  }
  fclose($fp);
  $wddx = wddx_deserialize($wddx);
  for ($m = 0; $m < 12; $m++) {
    printf("The sale in %s was %d\n", $wddx['months'][$m], $wddx['sales'][$m]);
  }
}
?>
