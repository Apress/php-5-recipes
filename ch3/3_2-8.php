<?php
// Example 3-2-8.php
function GeneratePassword($min = 5, $max = 8) {
  $ValidChars = "abcdefghijklmnopqrstuvwxyz123456789";
  $max_char = strlen($ValidChars) - 1;
  $length = mt_rand($min, $max);
  $password = "";
  for ($i = 0; $i < $length; $i++) {
    $password .= $ValidChars[mt_rand(0, $max_char)];
  }
  return $password;
}

echo "New Password = " . GeneratePassword() . "\n";
echo "New Password = " . GeneratePassword(4, 10) . "\n";
?>
