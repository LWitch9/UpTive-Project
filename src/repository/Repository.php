<?php

require_once __DIR__.'/../../Database.php';

class Repository
{
    protected $database;

    /**
     * Repository constructor.
     * @param $database
     */
    public function __construct()
    {
        $this->database = new Database();
    }


}