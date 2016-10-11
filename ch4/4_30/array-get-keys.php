<?php
  # Recipe 4-30

  $countries = array( 'USA' => 'English', 'Spain' => 'Spanish',
                      'Brasil' => 'Portuguese', 'UK' => 'English',
                      'Mexico' => 'Spanish', 'Germany' => 'German',
                      'Colombia' => 'Spanish', 'Canada' => 'English',
                      'Russia' => 'Russian', 'Austria' => 'German',
                      'France' => 'French', 'Argentina' => 'Spanish');
                      
  # prototype: mixed array_get_keys(mixed $search, array $array)
  
  function array_get_keys($search, $array)
  {
    $keys = array(); # array to contain keys for output
    
    foreach($array as $key => $value) # traversing the array...
      if($value == $search) # if the current value matches $search
        $keys[] = $key; # append the current key to the output array
    
    if(count($keys) == 0) # if no keys were appended to $keys
      $keys = FALSE; # set its value to boolean FALSE
  
    return $keys;
  }
  
  $language = 'Spanish';
  $spoken = array_get_keys($language, $countries);
  
  printf("<p>Countries where %s is spoken: %s.</p>\n",
          $language,
          $spoken ? implode(', ', $spoken) : 'None');
  
  $language = 'Tagalog';
  $spoken = array_get_keys($language, $countries);
  
  printf("<p>Countries where %s is spoken: %s.</p>\n",
          $language,
          $spoken ? implode(', ', $spoken) : 'None');
?>