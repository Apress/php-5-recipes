<?php
  # Recipe 5-9  / Example 3

  if($loc_zh = setlocale(LC_ALL, 'zh_ZH.big5', 'zh_ZH', 'chn', 'chinese'))
  {
    echo "<p>Preferred locale for Chinese on this system is \"$loc_zh\".<br />\n";
    echo '???! ???... ' . strftime('%A %d %B %Y', mktime()) . ".</p>\n";
  }
  else
  {
    echo "<p>Sorry! No Chinese locale available on this system.</p>\n";
    $lc_en = setlocale(LC_TIME, 'en_US', 'english');
    echo "<p>Reverting locale to $lc_en.</p>\n";
  }
?>