
<?php






$q = $_GET["value"];

$url = "https://www.googleapis.com/books/v1/volumes?q=insubject:" . $q;

$response = file_get_contents($url);
echo $response;


?>