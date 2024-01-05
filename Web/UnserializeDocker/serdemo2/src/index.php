<?php
show_source('index.php');
class test1
{
	public $varr;

	function __construct(){
		$this->varr = "index.php";
	}
	function __destruct(){
		if (file_exists($this->varr)){
			echo "<br />文件" . $this->varr . "存在<br />";
		}
	}
}

class test2
{
	public $varr;
	public $obj;

	function __construct()
	{
		$this->varr = '123456';
		$this->obj = null;
	}
	function __toString(){
		$this->obj->execute();
		return $this->varr;
	}

	function __destruct(){
		echo "<br />这是f2的析构函数<br />";
	}
}

class test3
{
	public $varr;

	function execute(){
		eval($this->varr);
	}
	function __destruct(){
		echo "<br />这是f3的析构函数<br />";
	}
}

if (isset($_GET['Sonder'])) {
	unserialize($_GET['Sonder']);
}


