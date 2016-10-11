<?php
// Example 3-3-4.php
define('BAR_LIN', 1);
define('BAR_LOG', 2);

function ShowChart($arrData, $iType = BAR_LIN, $iHeight = 200) {
  echo '<table border=0><tr>';
  
  $max = 0;
  foreach($arrData as $y) {
    if ($iType == BAR_LOG) {
      $y = log10($y);
    }
    if ($y > $max) $max = $y;
  }
  $scale = $iHeight / $max;
  
  foreach($arrData as $x=>$y) {
    if ($iType == BAR_LOG) {
      $y = log10($y);
    }
    $y = (int)($y*$scale);
    echo "<td valign=bottom>
            <img src=dot.png width=10 height=$y>
          </td>
          <td width=5>&nbsp;</td>";
  }
  echo '</tr></table>';
}

$arrData = array(
  150,
  5,
  200,
  8,
  170,
  50,
  3
);

echo '<html><body>';

echo 'Show chart with linear scale';
ShowChart($arrData, BAR_LIN);

echo '<br>Show chart with logarithmic scale';
ShowChart($arrData, BAR_LOG);

echo '</body></html>';
?>