<?php
  # Recipe 4-29

  $countries = array( 'USA' => 'English', 'Spain' => 'Spanish',
                      'Brasil' => 'Portuguese', 'UK' => 'English',
                      'Mexico' => 'Spanish', 'Germany' => 'German',
                      'Colombia' => 'Spanish', 'Canada' => 'English',
                      'Russia' => 'Russian', 'Austria' => 'German',
                      'France' => 'French', 'Argentina' => 'Spanish');

  $country = 'Kazakhstan';
  printf("<p>%s of our visitors are from %s.</p>\n",
        array_key_exists($country, $countries) ? 'Some' : 'None',
        $country);

  $country = 'Argentina';
  printf("<p>%s of our visitors are from %s.</p>\n",
        array_key_exists($country, $countries) ? 'Some' : 'None',
        $country);

  # Extra example cut from text for reasons of space
  
  # (Illustrates that using the string value for a numerical
  # index might not get you the result that you'd expect...)

  $birds = array('parrot', 'magpie', 'lorakeet', 'cuckoo');
  printf("<p>%s</p>\n", array_key_exists('2', $birds) ? 'TRUE' : 'FALSE');
  printf("<p>%s</p>\n", array_key_exists(2, $birds) ? 'TRUE' : 'FALSE');
?>