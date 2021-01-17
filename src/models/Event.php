<?php

class Event
{

    private $activity;
    private $location;
    private $date;
    private $time;
    private $message;

    public function __construct($activity, $location, $date, $time, $message)
    {

        $this->activity = $activity;
        $this->location = $location;
        $this->date = $date;
        $this->time = $time;
        $this->message = $message;
    }


    public function getActivity()
    {
        return $this->activity;
    }

    public function setActivity($activity): void
    {
        $this->activity = $activity;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location): void
    {
        $this->location = $location;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time): void
    {
        $this->time = $time;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message): void
    {
        $this->message = $message;
    }


}