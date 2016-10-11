<?php
// Example 14-8-2.php
$fp = fopen("http://localhost/14-7-1.php", "rt");
if ($fp) {
  $wddx = "";
  while(!feof($fp)) {
    $wddx .= fread($fp, 4096);
  }
  fclose($fp);
  echo utf8_decode(wddx_deserialize($wddx));
}
?>
