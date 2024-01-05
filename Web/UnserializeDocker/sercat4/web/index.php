<?php
class X
{
	public $x = __FILE__;
	function __construct($x)
	{
		$this->x = $x;
	}
	function __wakeup()
	{
		if ($this->x !== __FILE__) {
			$this->x = __FILE__;
		}
	}
	function __destruct()
	{
		highlight_file($this->x);
		//flag is in flag.php
	}
}
if (isset($_REQUEST['Sonder'])) {
	@unserialize($_REQUEST['Sonder']);
} else {
	highlight_file(__FILE__);
}