<?php
highlight_file(__FILE__);
include("flag.php");
class mylogin{
    var $user;
	var $pass;
	function __construct($user,$pass){
		$this->user=$user;
		$this->pass=$pass;
	}
    function login(){
		if ($this->user=="daydream" and $this->pass=="ok"){
			return 1;
		}
    }
}
$a=unserialize($_GET['Sonder']);
if($a->login())
{
	echo $flag;
}