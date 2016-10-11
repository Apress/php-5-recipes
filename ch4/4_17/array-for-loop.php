<?php
  # Recipe 4-17
  
  $birds = array('parrot', 'magpie', 'lorikeet', 'cuckoo');
  $limit = count($birds);

  for($i = 0; $i < $limit; $i++)
    printf("<p>(%d) %s.</p>\n", $i, ucfirst($birds[$i]));
?>