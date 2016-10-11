<?php
  # Recipe 4-26

  $countries = array( 'USA' => 'English', 'Spain' => 'Spanish',
                      'Brasil' => 'Portuguese', 'UK' => 'English',
                      'Mexico' => 'Spanish', 'Germany' => 'German',
                      'Colombia' => 'Spanish', 'Canada' => 'English',
                      'Russia' => 'Russian', 'Austria' => 'German',
                      'France' => 'French', 'Argentina' => 'Spanish');

  $languages = array_unique($countries);
  printf("<pre>%s</pre>\n", var_export($languages, TRUE));

  $languages = array_unique( array_values($countries) );
  printf("<pre>%s</pre>\n", var_export($languages, TRUE));

  $languages = array_values( array_unique($countries) );
  printf("<pre>%s</pre>\n", var_export($languages, TRUE));
?>