<?php

class Pisces
{
    public $romance;
    public $fantasy;
}
$f = new Pisces();
$f->romance = &$f->fantasy;
echo serialize($f);