<?php


class User
{
    private $email;
    private $password;

    private $name;
    private $surname;
    private $bio;
    private $avatar;

    /**
     * User constructor.
     * @param $email
     * @param $password
     * @param $name
     * @param $surname
     */
    public function __construct($email, $password, $name, $surname)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
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