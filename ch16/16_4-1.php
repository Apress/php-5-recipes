<?php
// Example 16-4-1.php
$file_name = 'somefile.ext'; 
$fp = fopen($file_name, 'rb');
if ($fp) {
  $data = fread($fp, filesize($file_name));
  fclose($fp);
}
?>
