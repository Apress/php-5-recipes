<?php
// Example 14-9-4.php
if (!extension_loaded("soap")) {
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("books.wsdl");

function doMyBookSearch($bookTitle) {
  return array(
    "bookTitle" => "MyBook", 
    "bookYear" => 2005, 
    "bookAuthor" => "sdfkhsdkfjsdk"
  );
}

$server->AddFunction("doMyBookSearch");
$server->handle();
?>
