<?php
// Example 14-9-1.php
if (!extension_loaded("soap")) {
  dl("php_soap.dll");
}

$client = new 
    SoapClient( 
    "/php/src/googleapi/GoogleSearch.wsdl"
    ); 

$options = array(
  "key" => "00000000000000000000000000000000",	// Replace with your own key
  "q" => "soap site:php.net",
  "start"  => 0,
  "maxResults" => 5,
  "filter" => false,
  "restrict" => "",
  "safeSearch" => false,
  "lr" => "",
  "ie" => "",
  "oe" => ""
);

$search = $client->__soapCall("doGoogleSearch", $options); 
foreach($search->resultElements as $result) {
  echo $result->summary . "\n";
  echo $result->snippet . "\n";
  echo $result->URL . "\n";
}
?> 
