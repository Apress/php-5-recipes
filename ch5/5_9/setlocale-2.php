<?php
  # Recipe 5-9  / Example 2

  if($loc_ru = setlocale(LC_ALL, 'ru_RU.utf8', 'rus_RUS.1251', 'rus', 'russian'))
  {
    echo "<p>Preferred locale for Russian on this system is \"$loc_ru\".<br />\n";
    echo '&#x0414&#x043E&#x0431&#x0440&#x043E&#x0435 ' 
    . '&#x0423&#x0442&#x0440&#x043E! ' 
    . '&#x0421&#x0435&#x0433&#x043E&#x0434&#x043D&#x044F ' 
    . strftime('%A %d %B %Y', mktime()) . ".</p>\n";
  }
  else
    echo "<p>Couldn't set a Russian locale.</p>\n";
?>