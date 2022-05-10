<?php

namespace Bookstore\Api\Model;

use Bookstore\Api\Model\Author;

class Book
{
    private int $id;

    private string $title;

    private Author $author;

    private string $description;

    private float $price;

    private string $cover;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCover()
    {
        return $this->cover;
    }

    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    public function __toString()
    {
        return $this->title;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author . '',
            'description' => $this->description,
            'price' => $this->price,
            'cover' => $this->cover,
        ];
    }

    public function fromArray(array $data)
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->author = $data['author'];
        $this->description = $data['description'];
        $this->price = $data['price'];
        $this->cover = $data['cover'];
    }

    public function __construct($id, $title, $author, $description, $price, $cover)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->description = $description;
        $this->price = $price;
        $this->cover = $cover;
    }
}