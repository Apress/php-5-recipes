<?php
// Example 14-9-3.php
if (!extension_loaded("soap")) {
  dl("php_soap.dll");
}

$client = new 
    SoapClient( 
    "/php/src/googleapi/GoogleSearch.wsdl"
    ); 

$key = "00000000000000000000000000000000";	// Replace with your own key
$phrase = "This bok is about PHP5 features";

$spellcheck = $client->doSpellingSuggestion($key, $phrase); 
echo "The correct spelling is: \"$spellcheck\"\n";
?> 
