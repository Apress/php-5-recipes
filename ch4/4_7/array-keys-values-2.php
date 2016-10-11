<?php
  # Recipe 4-7 (second example)

  function array_values_string($arr)
  {
    return sprintf("(%s)", implode(', ', array_values($arr)));
  }
  
  function array_keys_string($arr)
  {
    return sprintf("(%s)", implode(', ', array_key($arr)));
  }
  
  $countries_languages
    = array('Germany' => 'German', 'France' => 'French', 'Spain' => 'Spanish');
    
  print 'Countries: ';
  print array_keys_string($countries_languages);
  
  print '<br />Languages: ';
  print array_values_string($countries_languages);
?>