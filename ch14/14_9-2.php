<?php
// Example 14-9-2.php
if (!extension_loaded("soap")) {
  dl("php_soap.dll");
}

$client = new 
    SoapClient( 
    "/php/src/googleapi/GoogleSearch.wsdl"
    ); 

$options = array(
  "key" => "00000000000000000000000000000000",	// Replace with your own key
  "phrase" => "This bok is about PHP5 features"
);

$search = $client->__soapCall("doSpellingSuggestion", $options); 
echo "The correct spelling is: \"$spellcheck\"\n";
?> 
