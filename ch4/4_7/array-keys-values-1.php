<?php
  # Recipe 4-7 (first example)

  $countries_languages
    = array('Germany' => 'German', 'France' => 'French', 'Spain' => 'Spanish');
  
  printf("<p>Languages: %s.</p>\n", 
          implode(', ', array_values($countries_languages)) );
  
  printf("<p>Countries: %s.</p>\n",
          implode(', ', array_keys($countries_languages)) );
?>