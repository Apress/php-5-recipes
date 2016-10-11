<?php
  # Recipe 5-10 / Example 2

  $ts_au = mktime();
  $ts_de = $ts_au - (9 * 3600);

  echo 'Good evening from Brisbane, where it\'s ' . date('H:m \o\n l d m Y', $ts_au) 
        . ".<br />";

  setlocale(LC_ALL, 'de_DE', 'german');

  echo 'Guten Morgen aus Berlin. Hier ist es ' 
        . strftime('%H:%M Uhr, am %A dem %d %B %Y', $ts_de) . '.';
?>
