<?php

namespace Bookstore\Api\Controller;

class BaseController
{
  public function __call($name, $arguments)
  {
    $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
  }

  protected function getUriSegments()
  {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode('/', $uri);

    return $uri;
  }

  protected function requestMethod()
  {
    return strtoupper($_SERVER['REQUEST_METHOD']);
  }

  protected function sendOutput($data, $httpHeaders = array())
  {
    header_remove('Set-Cookie');

    if (is_array($httpHeaders) && count($httpHeaders)) {
      foreach ($httpHeaders as $httpHeader) {
        header($httpHeader);
      }
    }

    echo $data;
    exit;
  }
  
  protected function jsonOutput($data)
  {
    $this->sendOutput(
      json_encode($data),
      array('Content-Type: application/json', 'HTTP/1.1 200 OK')
    );
  }

  protected function sendError($message)
  {
    $this->sendOutput(
      json_encode([
        'error' => $message
      ]),
      array('Content-Type: application/json', 'HTTP/1.1 400 Bad Request')
    );
  }
}