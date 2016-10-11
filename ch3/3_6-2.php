<?php
// Example 3-6-2.php
if (!extension_loaded("gmp")) {
  dl("php_gmp.dll");
}
/*use gmp library to convert base. gmp will convert numbers > 32bit*/
function gmp_convert($num, $base_a, $base_b)
{
       return gmp_strval(gmp_init($num, $base_a), $base_b);
}

echo "12345678987654321 in hex is: " . gmp_convert('12345678987654321', 10, 16) . "\n";
?>
