<?php


class Achievement
{
    private $title;
    private $text;
    private $img;

    public function __construct($title, $text, $img)
    {
        $this->title = $title;
        $this->text = $text;
        $this->img = $img;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text): void
    {
        $this->text = $text;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img): void
    {
        $this->img = $img;
    }




}