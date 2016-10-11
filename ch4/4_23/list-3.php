<?php
  # Recipe 4-23 / Example 3
  
  $scores = array(88, 75);

  @list($maths, $english, $history) = $scores;

  @printf("<p>Maths: %d; English: %d; History: %d; Biology: %d.</p>\n",
          $maths, $english, $history, $biology);
?>