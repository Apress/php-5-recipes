<?php
// Example 3-5-5.php
$number = 1234.56;
setlocale(LC_MONETARY, 'en_US');
echo money_format('%i', $number) . "\n";

setlocale(LC_MONETARY, 'en_DK');
echo money_format('%.2i', $number) . "\n";

$number = -1234.5672;
setlocale(LC_MONETARY, 'en_US');
echo money_format('%(#10n', $number) . "\n";
echo money_format('%(#10i', $number) . "\n";
?>
