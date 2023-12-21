<?php

error_reporting(0);
show_source("cl45s.php");

class wllm {

	public $admin;
	public $passwd;

	public function __construct() {
		$this->admin = "user";
		$this->passwd = "123456";
	}

	public function __destruct() {
		if($this->admin === "admin" && $this->passwd === "ctf") {
			include("flag.php");
			echo $flag;
		} else {
			echo $this->admin;
			echo $this->passwd;
			echo "Just a bit more!";
		}
	}
}

$p = $_GET['Sonder'];
unserialize($p);