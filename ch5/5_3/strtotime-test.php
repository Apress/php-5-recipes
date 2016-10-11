<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>*strtotime()* Example (Recipe 5-3)</title>
</head>
<body>

  <!--  Example code in text starts here  -->
<table>
<?php
  # Recipe 5-3

  $mydates = array(
                    "now", "today", "tomorrow", "yesterday",
                    "Thursday", "this Thursday", "last Thursday", 
                    "+2 hours", "-1 month", "+10 minutes", 
                    "30 seconds", "+2 years -1 month", "next week", 
                    "last month", "last year", "2 weeks ago",
                    "next Friday"
                  );
  
  foreach($mydates as $mydate)
    echo "<tr><td>$mydate:</td><td>" . date('r', strtotime($mydate)) . "</td></tr>\n";
?>
</table>
  <!--  Code shown in text ends -->
  
</body>
</html>