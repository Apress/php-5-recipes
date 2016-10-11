<?php
// Example 16-4-3.php
$file_name = "16.3.2.php";
$fp = fopen($file_name, 'r');
if ($fp) {
  $data = fread($fp, filesize($file_name));
  fclose($fp);

  $file_name = "ftp://user:pass@ftp.somedomain.com/home/user/$file_name"; 
  $fp = fopen($file_name, 'wt');
  if ($fp) {
    echo 'writing data';
    fwrite($fp, $data);
    fclose($fp);
  }
}
?>
