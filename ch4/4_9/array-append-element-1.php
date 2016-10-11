<?php
  # Recipe 4-9 (first example)

  $languages = array(); // create a new, empty array
  
  $languages[] = 'German';
  $languages[] = 'French';
  $languages[] = 'Spanish';
  
  printf("<p>Languages: %s.</p>\n", implode(', ', $languages));
?>