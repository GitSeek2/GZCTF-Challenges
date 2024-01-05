<?php
highlight_file(__FILE__);
class secret{
    private $comm;
    public function __construct($com){
        $this->comm = $com;
    }
    function __destruct(){
        echo eval($this->comm);
    }
}
$param=$_GET['Sonder'];
$param=str_replace("%","daydream",$param);
unserialize($param);