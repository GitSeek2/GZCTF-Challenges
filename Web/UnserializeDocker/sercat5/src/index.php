<?php
show_source(__FILE__);
class test
{
    public $a;
    public $b;
    public $c;
    public function __construct()
    {
        $this->a = 1;
        $this->b = 2;
        $this->c = 3;
    }
    public function __wakeup()
    {
        $this->a = '';
    }
    public function __destruct()
    {
        $this->b = $this->c;
        eval($this->a);
    }
}
$a = $_GET['Sonder'];
if (!preg_match('/test":3/i', $a)) {
    die("你输入的不正确！！！搞什么！！");
}
$bbb = unserialize($_GET['Sonder']);