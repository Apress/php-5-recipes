<?php
  # Recipe 5-11 / Example 3 (first part)

  function date_diff($date1=0, $date2=0, $debug=FALSE)
  {
    $val1 = is_numeric($date1) ? $date1 : strtotime($date1);
    $val2 = is_numeric($date2) ? $date2 : strtotime($date2);

    //  **DEBUG **
    if($debug)
      printf("<p>%s : %s</p>\n", date('r', $val1), date('r', $val2));

    $sec = abs($val2 - $val1);
    $units = getdate($sec);

    //  **DEBUG**
    if($debug)
      printf("<pre>%s</pre>\n", print_r($units, TRUE));

    
    $hours = abs($units["hours"] - (date('Z') / 3600));
    $days = $units["mday"];
    
    while($hours > 23)
    {
      $days++;
      $hours -= 24;
    }
    
    $output = array();
    $base = getdate(0);

    $output["components"] = array(
                              "years"   => $units["year"] - $base["year"],
                              "months"  => --$units["mon"],
                              "days"    => --$days,
                              "hours"   => $hours,
                              "minutes" => $units["minutes"],
                              "seconds" => $units["seconds"]
                            );
                            
    $output["elapsed"] = array(
                                "years"   => $sec / (365 * 24 * 60 * 60),
                                "months"  => $sec / (30 * 24 * 60 * 60),
                                "weeks"   => $sec / (7 * 24 * 60 * 60),
                                "days"    => $sec / (24 * 60 * 60),
                                "hours"   => $sec / (60 * 60),
                                "minutes" => $sec / 60,
                                "seconds" => $sec
                              );
                              
    $output["order"] = $val2 < $val1 ? -1 : 1;

    return $output;
  }
?>