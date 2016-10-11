<?php
  # Recipe 5-8  / Example 1
  
  # NOTE: The output you observe from running this
  # example may not match what is shown in the text,
  # depending on your server's time zone settings.
  
  $ts = time();

  echo date('r', $ts) . "<br />\n";
  echo date('r', $ts) . "<br />\n";
  echo strftime("%D %T %Z", $ts) . "<br />\n";
?>
<?php
  # On an Apache server, you can try the following:

/*
  apache_setenv('tz=Europe/Berlin');
  echo date('r', $ts) . "<br />\n";
  echo strftime("%D %T %Z", $ts) . "<br />\n";

  apache_setenv('tz=Australia/Darwin');
  echo date('r', $ts) . "<br />\n";
  echo strftime("%D %T %Z", $ts) . "<br />\n";
*/

  # This may or may not work on Apache or IIS.
  # It depends on the system and server configs.

/*
  setlocale(LC_TIME, 'tz=Australia/Darwin');
  echo date('r', $ts) . "<br />\n";
  echo strftime("%D %T %Z", $ts) . "<br />\n";
*/
?>
