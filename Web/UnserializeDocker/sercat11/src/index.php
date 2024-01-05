<?php
show_source(__FILE__);
error_reporting(0);
class Hacker
{
    private $exp;
    private $cmd;

    public function __toString()
    {
        call_user_func('system', "cat /flag");
    }
}

class A
{
    public $hacker;
    public function __toString()
    {
        echo $this->hacker->name;
        return "";
    }
}
class C
{
    public $finish;
    public function __get($value)
    {
        $this->finish->hacker();
        echo 'nonono';
    }
}
class E
{
    public $hacker;

    public function __invoke($parms1)
    {
        echo $parms1;
        $this->hacker->welcome();
    }
}

class H
{
    public $username = "admin";
    public function __destruct()
    {
        $this->welcome();

    }
    public function welcome()
    {
        echo "welcome~ " . $this->username;
    }
}

class K
{
    public $func;
    public function __call($method, $args)
    {
        call_user_func($this->func, 'welcome');
    }
}

class R
{
    private $method;
    private $args;

    public function welcome()
    {
        if ($this->key === true && $this->finish1->name) {
            if ($this->finish->finish) {
                call_user_func_array($this->method, $this->args);
            }
        }
    }
}

function nonono($a)
{
    $filter = "/system|exec|passthru|shell_exec|popen|proc_open|pcntl_exec|system|eval|flag/i";
    return preg_replace($filter, '', $a);
}

$a = $_POST["Sonder"];
if (isset($a)) {
    unserialize(nonono($a));
}