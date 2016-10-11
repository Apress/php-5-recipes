<?php
  # Recipe 2-17
  
  $class = 'Shape';

  require_once("./$class.class.php");

  $rc = new ReflectionClass($class);

  print "<pre>";
  Reflection::export($rc);
  print "</pre>";
?>