<?php


class User
{
    private $email;
    private $password;
    private $salt;

    private $name;
    private $surname;
    private $bio;
    private $avatar;




    public function __construct($email, $password, $name, $surname, $bio=null, $avatar=null, $salt =null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->salt = $salt;
        $this->name = $name;
        $this->surname = $surname;
        $this->bio = $bio;
        $this->avatar = $avatar;
    }

    public function getSalt(): ?mixed
    {
        return $this->salt;
    }

    public function setSalt(?mixed $salt): void
    {
        $this->salt = $salt;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function setBio($bio): void
    {
        $this->bio = $bio;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
    }
}