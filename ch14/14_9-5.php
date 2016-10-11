<?php
// Example 14-9-5.php
if (!extension_loaded("soap")) {
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled", "0");
$client = new SoapClient("http://localhost/php5/books.wsdl");

$search = $client->doMyBookSearch("Test"); 
var_dump($search);
?> 
