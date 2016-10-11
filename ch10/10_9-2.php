<?php
// Example 10-9-2.php
if (!extension_loaded("shmop")) {
  dl("php_shmop.dll");
}

$shm_id = shmop_open(0x123, 'a', 0, 0);
if ($shm_id) {
  $value = shmop_read($shm_id, 0, 100);
  echo "$value";
  shmop_close($shm_id);
}
?>
