<?php
// Example math.php
define('RAND_MAX', mt_getrandmax());

class Math {
  static $pi = M_PI;
  static $e = M_E;
  
  static function pi() {
    return M_PI;
  }
  static function intval($val) {
    return intval($val);
  }
  static function floor($val) {
    return floor($val);
  }
  static function ceil($val) {
    return ceil($val);
  }
  static function round($val, $decimals = 0) {
    return round($val, $decimals);
  }
  static function abs($val) {
    return abs($val);
  }
  static function floatval($val) {
    return floatval($val);
  }
  static function rand($min = 0, $max = RAND_MAX) {
    return mt_rand($min, $max);
  }
  static function min($var1, $var2) {
    return min($var1, $var2);
  }
  static function max($var1, $var2) {
    return max($var1, $var2);
  }
}

$a = 3.5;

echo "Math::\$pi = " . Math::$pi . "\n";
echo "Math::\$e = " . Math::$e . "\n";
echo "Math::intval($a) = " . Math::intval($a) . "\n";
echo "Math::floor($a) = " . Math::floor($a) . "\n";
echo "Math::ceil($a) = " . Math::ceil($a) . "\n";
echo "Math::round(Math::\$pi, 2) = " . Math::round(Math::$pi, 2) . "\n";
echo "Math::abs(-$a) = " . Math::abs(-$a) . "\n";
echo "Math::floatval($a) = " . Math::floatval($a) . "\n";
echo "Math::rand(5, 25) = " . Math::rand(5, 25) . "\n";
echo "Math::rand() = " . Math::rand() . "\n";
echo "Math::min(2, 28) = " . Math::min(3, 28) . "\n";
echo "Math::max(3, 28) = " . Math::max(3, 28) . "\n";
?>
