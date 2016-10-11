<?php
  # Recipe 5-12
  
  # NOTE: Much of the output from the example
  # will not match what is shown in the text.
  
  require("./Date.class.inc.php");

  $today = new Date();
  
  printf("<p>Current date and time: %s</p>\n", $today->toLocaleString());

  echo "<p>'Get' methods:</p>";

  printf("<p>Month: %d.</p>\n", $today->getMonth());
  printf("<p>Day of month: %d.</p>\n", $today->getDate());
  printf("<p>Day of Week: %d.</p>\n", $today->getDay());
  printf("<p>Year: %d.</p>\n", $today->getFullYear());
  printf("<p>Hours: %d.</p>\n", $today->getHours());
  printf("<p>Minutes: %d.</p>\n", $today->getMinutes());
  printf("<p>Seconds: %d.</p>\n", $today->getSeconds());
  
  echo "<p>UTC 'get' methods used on the same <code>Date()</code> instance...</p>";

  printf("<p>UTC Month: %d.</p>\n", $today->getUTCMonth());
  printf("<p>UTC Day of month: %d.</p>\n", $today->getUTCDate());
  printf("<p>UTC Day of Week: %d.</p>\n", $today->getUTCDay());
  printf("<p>UTC Year: %d.</p>\n", $today->getUTCFullYear());
  printf("<p>UTC Hours: %d.</p>\n", $today->getUTCHours());
  printf("<p>UTC Minutes: %d.</p>\n", $today->getUTCMinutes());
  printf("<p>UTC Seconds: %d.</p>\n", $today->getUTCSeconds());
  
  $timezone = $today->getTimeZoneOffset();
  printf("Value returned by <code>getTimeZoneOffset()</code>: %d", 
         $timezone);

  $date = "Sat, 5 April 2003 15:15:25 +1000";
  $timestamp = Date::parse($date);
  printf("<p>Test date: %s; <code>Date::parse()</code> yields: %d.</p>\n", 
          $date, Date::parse($date));

  printf("<p><code>Date::UTC()</code> method: %d</p>\n", Date::UTC(2002, 3, 4, 23, 30));

  printf("<p>Using <code>toUTCString()</code>: %s</p>", $today->toUTCString());

  echo "<p>Now for some 'set' methods...</p>";

  echo "<p>Let's try advancing the date by one day... :";
  $today->setDate($today->getDate() + 1);
  echo $today->toLocaleString() . "</p>";

  echo "<p>Now let's try advancing that date by one year... :";
  $today->setFullYear($today->getFullYear() + 1);
  echo $today->toLocaleString() . "</p>";

  echo "<p>Now we're going to set the month for that date to 0 (January):";
  $today->setMonth(0);
  echo $today->toLocaleString() . ".</p>\n";

  echo "<p>Now we're going to set the month for that date to 13 
        (should be February of the following year):";
  $today->setMonth(13);
  echo $today->toLocaleString() . ".</p>\n";
  
  echo "<p>Now for <code>setMinutes()</code> and <code>setSeconds()</code>:</p>\n";
  echo "<p>Test code: <code>\$today->setMinutes(30); 
        \$today->setSeconds(45);</code>.</p>\n";

  $today->setMinutes(30); 
  $today->setSeconds(45);
  
  printf("<p>Date is now: %s.</p>\n", $today->toLocaleString());

  echo "<p>Using the <code>toString()</code> method 
        on the same date yields: " . $today->toString() . ".</p>\n";

  echo "Finally, let's try some other ways to call the constructor...</p>";

  echo "First, the RFC-formatted date <code>24 Sept 2005</code>: ";
  $myBirthday = new Date("24 Sept 2005");
  echo $myBirthday->toString() . "</p>.\n";

  echo "<p>And now we'll try it with<br />
        <code>\$xmas2k = new Date(2000, 11, 25);</code> 
        followed by<br />
        <code>echo \$xmas2k->toLocaleString();</code><br />
        and then<br />
        <code>echo \$xmas2k->toUTCString();</code>...</p>";
  $xmas2k = new Date(2000, 11, 25);
  echo "<p>" . $xmas2k->toLocaleString() . "</p>";
  echo "<p>" . $xmas2k->toUTCString() . "</p>";
  
  echo "<p>Now for some UTC methods, using <code>\$xmas2k</code>...</p>\n";
  
  echo "Calling <code>\$xmas2k->setUTCDate(30);</code></p>\n";
  $xmas2k->setUTCDate(30);
  printf("<p>UTC date: %s; local date: %s</p>\n", 
          $xmas2k->toUTCString(), 
          $xmas2k->toLocaleString());

  echo "Calling <code>\$xmas2k->setUTCHours(48);</code></p>\n";
  $xmas2k->setUTCHours(48);
  printf("<p>UTC date: %s; local date: %s</p>\n", 
          $xmas2k->toUTCString(), 
          $xmas2k->toLocaleString());

  echo "Calling <code>\$xmas2k->setUTCFullYear(2008);</code></p>\n";
  $xmas2k->setUTCFullYear(2008);
  printf("<p>UTC date: %s; local date: %s</p>\n", 
          $xmas2k->toUTCString(), 
          $xmas2k->toLocaleString());
?>
