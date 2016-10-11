<?php
// Example 3-4-2.php
define('KM', 6364.963);
define('MILES', 3955.00465);

function GetDistance($la1, $lo1, $la2, $lo2, $r = KM) {
  $l1 = deg2rad($la1);
  $l2 = deg2rad($la2);
  $dg = deg2rad($lo2 - $lo1);
  $d = $r * acos(sin($l1) * sin($l2) + cos($l1) * cos($l2) * cos($dg));
  return $d;
}

// Copenhagen
$lat1 = 55.67621;
$long1 = 12.56951;

// Los Angeles
$lat2 =  34.01241;
$long2 = -118.37323;

echo "The distance from Copenhagen to Los Angeles is " . round(GetDistance($lat1, $long1, $lat2, $long2)) . " km\n";
echo "The distance from Copenhagen to Los Angeles is " . round(GetDistance($lat1, $long1, $lat2, $long2, MILES)) . " miles\n";
?>
