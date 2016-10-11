<?php
  # Recipe 5-9  / Example 1
  # (Also Recipe 5-10  / Example 1)

  $ts = mktime();
  echo '<p>' . date('r (T)', $ts) . "</p>\n";

  if($loc_de = setlocale(LC_ALL, 'de_DE@euro', 'de_DE', 'deu_deu'))
  {
    echo "<p>Preferred locale for German on this system is \"$loc_de\".<br />";
    echo 'Guten Morgen! Heute ist ' . strftime('%A %d %B %Y, %H.%M Uhr', $ts) 
    . ".</p>\n";
  }
  else
    echo "<p>Sorry! This system doesn't speak German.</p>\n";
?>