<?php
include 'flag.php';
class pkshow
{
    function echo_name()
    {
        return "Pk very safe^.^";
    }
}

class acp
{
    protected $cinder;
    public $neutron;
    public $nova;
    function __construct()
    {
        $this->cinder = new pkshow;
    }
    function __toString()
    {
        if (isset($this->cinder))
            return $this->cinder->echo_name();
    }
}

class ace
{
    public $filename;
    public $openstack;
    public $docker;
    function echo_name()
    {
        $this->openstack = unserialize($this->docker);
        $this->openstack->neutron = $heat;
        if ($this->openstack->neutron === $this->openstack->nova) {
            $file = "./{$this->filename}";
            if (file_get_contents($file)) {
                return file_get_contents($file);
            } else {
                return "keystone lost~";
            }
        }
    }
}

if (isset($_GET['Sonder'])) {
    $logData = unserialize($_GET['Sonder']);
    echo $logData;
} else {
    highlight_file(__FILE__);
}
