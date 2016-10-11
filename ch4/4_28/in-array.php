<?php
  # Recipe 4-28

  $countries = array( 'USA' => 'English', 'Spain' => 'Spanish',
                      'Brasil' => 'Portuguese', 'UK' => 'English',
                      'Mexico' => 'Spanish', 'Germany' => 'German',
                      'Colombia' => 'Spanish', 'Canada' => 'English',
                      'Russia' => 'Russian', 'Austria' => 'German',
                      'France' => 'French', 'Argentina' => 'Spanish');

  $language = 'Spanish';
  printf("<p>%s of our visitors speak %s.</p>\n",
        in_array($language, $countries) ? 'Some' : 'None',
        $language);
  $language = 'Swahili';
  printf("<p>%s of our visitors speak %s.</p>\n",
        in_array($language, $countries) ? 'Some' : 'None',
        $language);
?>