<?php

class Fun
{
    private $func = 'call_user_func_array';

    public function __call($f, $p)
    {
        call_user_func($this->func, $f, $p);
    }
}

class Test
{
    public function __call($f, $p)
    {
        echo file_get_contents('/flag');
    }

    public function __wakeup()
    {
        echo "serialize me?";
    }
}

class A
{
    public $a;

    public function __get($p)
    {
        if (preg_match("/Test/", get_class($this->a))) {
            return "No test in Prod\n";
        }
        return $this->a->$p();
    }
}

class B
{
    public $p;

    public function __destruct()
    {
        $p = $this->p;
        echo $this->a->$p;
    }
}

if (isset($_REQUEST['begin'])) {
    unserialize($_REQUEST['begin']);
}
?>