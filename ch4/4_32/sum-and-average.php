<?php
  # Recipe 4-32
  
  function array_average($array)
  {
    $retval = FALSE;

    if(is_array($array) && count($array))
      $retval = array_sum($array) / count($array);

    return $retval;
  }

  $scores = array('Bill' => 87.5, 'Jan' => 94.8, 'Terry' => 80.0,
                  'Andy' => 91.5, 'Lisa' => 95.5);

  printf("<p>%d scores, totalling %.2f and averaging %.2f.</p>",
          count($scores), array_sum($scores), array_average($scores));

?>