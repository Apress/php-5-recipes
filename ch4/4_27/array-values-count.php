<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Number of Speakers, By Country</title>

<style type="text/css">
body  {background-color:#FFF; color:#000;}
</style>

<script type="text/javascript">
</script>

</head>
<body>
<?php
  # Recipe 4-27 / Figure 4-1

  $countries = array( 'USA' => 'English', 'Spain' => 'Spanish',
                      'Brasil' => 'Portuguese', 'UK' => 'English',
                      'Mexico' => 'Spanish', 'Germany' => 'German',
                      'Colombia' => 'Spanish', 'Canada' => 'English',
                      'Russia' => 'Russian', 'Austria' => 'German',
                      'France' => 'French', 'Argentina' => 'Spanish');

  $languages = array_values($countries);
  $language_count = array();

  foreach($languages as $language)
    if(!isset($language_count[$language]))
      $language_count[$language] = 1;
    else
      $language_count[$language]++;

?>
  <table border="2" cellpadding="5" cellspacing="0" align="center">
    <tbody>
      <tr><th>Language</th><th>Number<br />of<br />Countries</th></tr>
<?php
  foreach($language_count as $language => $number)
    print "<tr><td>$language</td><td>$number</td></tr>\n";
?>
    </tbody>
  </table>
</body>
</html>