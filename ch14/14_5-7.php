<?php
// Example 14-5-7.php
$books = simpleXML_load_file("books.xml");
foreach($books as $book) {
  echo $book->title . " - ";
  echo "book_id = $book[book_id]\n";
}
?>
