<?php
error_reporting(0);
class dxg
{
	function fmm()
	{
		return "nonono";
	}
}

class lt
{
	public $impo = 'hi';
	public $md51 = 'weclome';
	public $md52 = 'to CSSEC';
	function __construct()
	{
		$this->impo = new dxg;
	}
	function __wakeup()
	{
		$this->impo = new dxg;
		return $this->impo->fmm();
	}

	function __toString()
	{
		if (isset($this->impo) && md5($this->md51) == md5($this->md52) && $this->md51 != $this->md52)
			return $this->impo->fmm();
	}
	function __destruct()
	{
		echo $this;
	}
}

class fin
{
	public $a;
	public $url = 'https://www.yuque.com/cssec/wiki';
	public $title;
	function fmm()
	{
		$b = $this->a;
		$b($this->title);
	}
}

if (isset($_GET['Sonder'])) {
	$Data = unserialize($_GET['Sonder']);
} else {
	highlight_file(__FILE__);
}