<?php
  # Recipe 5-13
  
  # NOTE: Much of the output from the example
  # will not match what is shown in the text.

  //  file: date_ext_test.php
  //  some tests for the DateExtended class
  
  include("Date-Extended.class.inc.php");

  $today = new DateExtended();
  
  printf("<p>Current date and time (long toLocaleString()): %s.</p>\n", 
          $today->toLocaleString(TRUE));
  printf("<p>Current date and time (parent toLocaleString()): %s.</p>\n", 
          $today->toLocaleString());
  printf("<p>Current date and time (ISO format): %s.</p>\n", 
          $today->toISOString());
  printf("<p>Current UTC date and time: %s %s %s %s %s</p>\n", 
          $today->getUTCDayShortName(),
          $today->getUTCDate(),
          $today->getUTCMonthShortName(),
          $today->getUTCFullYear(),
          $today->getUTCClockTime());
          
  printf("<p>Today is %s (%s).</p>\n", 
          $today->getDayFullName(),
          $today->getDayShortName());

  printf("<p>Today is %s %s, %d.</p>\n",
        $today->getOrdinalDate(),
        $today->getMonthFullName(),
        $today->getFullYear());

  printf("<p>12-hour time: %s.</p>\n", $today->getClockTime(TRUE, TRUE, FALSE));

  printf("<p>24-hour time: %s (%s).</p>\n", 
          $today->getClockTime(TRUE, TRUE, TRUE, '.'),
          $today->getTimeZoneName());
  
  echo "<p>";
  for($year = 2000; $year <= 2010; $year++)
  {
    printf("%s is %sa leap year.<br />\n",
            $year,
            DateExtended::isLeapYear($year) ? '' : 'not ');
  }
  echo "</p>";
  
  $past = new DateExtended(1997, 6, 4, 15, 30, 45);
  printf("<p>Past date is %s.</p>\n", $past->toLocaleString(TRUE));
  
  $diff = $today->getDifference($past);
  
  $components = $diff["components"];
  
  $output = array();
  
  foreach($components as $period => $length)
    if($length > 0)
      $output[] = "$length $period";
  
  printf("<p>Difference in dates is: %s.</p>", implode($output, ', '));
  printf("<p>Difference in dates is: %s years.</p>", $diff["elapsed"]["years"]);
?>