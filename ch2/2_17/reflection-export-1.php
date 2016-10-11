<?php
  # Recipe 2-17
  
  // file: reflection-export-1.php
  // simple Reflection::export() example
  // include class file
  
  require_once('./Shape.class.php');
  
  // create new instance of ReflectionClass
  $rc = new ReflectionClass('Shape');
  
  ?><pre><?php
  
  // dump class info
  Reflection::export($rc);
  
?></pre>