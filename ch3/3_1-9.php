<?php
// Example 3-1-9.php
echo base_convert('123', 10, 10) . "\n";
echo base_convert('42', 10, 2) . "\n";
echo base_convert('83', 10, 8) . "\n";
echo base_convert('291', 10, 16) . "\n";

echo base_convert('558147', 10, 32) . "\n";
echo base_convert('794523', 10, 36) . "\n";

echo base_convert('abcd', 16, 8) . "\n";
echo base_convert('abcd', 16, 2) . "\n";
?>
