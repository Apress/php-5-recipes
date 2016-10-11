<?php
// Example 16-4-2.php
$file_name = 'http://php.net/index.php'; 
$fp = fopen($file_name, 'r');
if ($fp) {
  $data = '';
  while (!feof($fp)) {
    $data .= fread($fp, 4096);
  }
  fclose($fp);
}
echo $data;
?>
