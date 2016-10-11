<?php
// Example 10-9-1.php
if (!extension_loaded("shmop")) {
  dl("php_shmop.dll");
}

$shm_id = shmop_open(0x123, 'c', 0644, 250);
shmop_write($shm_id, "Data in shared memory", 0);
$value = shmop_read($shm_id, 8, 6);
echo "$value";
shmop_close($shm_id);
sleep(60);
?>
