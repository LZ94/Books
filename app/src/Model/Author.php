<?php

namespace Bookstore\Api\Model;

class Author
{
    private int $id;

    private string $name;

    private string $email;

    private string $birthDate;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function __toString()
    {
        return "{$this->name} <{$this->email}>";
    }

    public function __construct($id, $name, $email, $birthDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->birthDate = $birthDate;
    }
}