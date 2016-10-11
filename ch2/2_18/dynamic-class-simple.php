<?php
  # An extra example to accompany Recipe 2-18
  
  $class = 'Shape';

  require_once("./$class.class.php");

  $object = new $class();

  print "<pre>print_r(\$class):";
  print_r($class);
  print "</pre>\nprint_r(\$object):<pre>";
  print_r($object);
  print '</pre>';

  printf("get_class_methods():<pre>%s</pre>\n", print_r(get_class_methods($class), TRUE));
  printf("get_class_vars():<pre>%s</pre>\n", print_r(get_class_vars($class), TRUE));
  printf("get_object_vars():<pre>%s</pre>\n", print_r(get_object_vars($object), TRUE));

  $rc = new ReflectionClass($class);
?>
<pre>
<?php
  Reflection::export($rc);
?>
</pre>