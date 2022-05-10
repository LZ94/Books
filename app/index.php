<?php
require 'bootstrap.php';

use Bookstore\Api\Controller\BookstoreController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ((isset($uri[1]) && $uri[1] != 'books')) {
  header("HTTP/1.1 404 Not Found");
  exit();
}

$controller = new BookstoreController();

$strMethod =  (isset($uri[2])) ? 'getAction' : 'listAction';
$controller->{$strMethod}();