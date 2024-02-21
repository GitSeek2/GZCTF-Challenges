<?php
error_reporting(0);
session_start();
class Pisces
{
    public $romance;
    public $fantasy;

    function __wakeup()
    {
        printf("%s\n", __METHOD__);
        $this->fantasy = md5(rand(1, 10000));
        if ($this->romance === $this->fantasy) {
            echo file_get_contents('/flag');
        }
    }
}