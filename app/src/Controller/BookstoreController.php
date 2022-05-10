<?php

namespace Bookstore\Api\Controller;

class BookstoreController extends BaseController
{
    public function listAction()
    {
      if ($this->requestMethod() === 'GET') {
        return $this->jsonOutput(
          $this->mockBooks()
        );
      } else {
        $this->sendError('Method not allowed');
      } 
    } 

    public function getAction()
    {
      if ($this->requestMethod() === 'GET') {
        $id = $this->getUriSegments()[2];

        $book = new \Bookstore\Api\Model\Book(
          $id,
          'Book ' . $id,
          new \Bookstore\Api\Model\Author(
            $id,
            'Author ' . $id,
            "author{$id}@bookstore.com",
            '1970-01-01'
          ),
          "Description {$id}",
          10.00,
          "cover-{$id}.jpg"
        );           

        return $this->jsonOutput(
          $book->toArray()
        );
      } else {
        $this->sendError('Method not allowed');
      } 
    }

    private function mockBooks() {
      $books = [];

      for ($i = 1; $i <= 5; $i++) {
        $book = new \Bookstore\Api\Model\Book(
          $i,
          'Book ' . $i,
          new \Bookstore\Api\Model\Author(
            $i,
            'Author ' . $i,
            "author{$i}@bookstore.com",
            '1970-01-01'
          ),
          "Description {$i}",
          10.00,
          "cover-{$i}.jpg"
        );

        $books[] = $book->toArray();
      }

      return $books;
    }
}