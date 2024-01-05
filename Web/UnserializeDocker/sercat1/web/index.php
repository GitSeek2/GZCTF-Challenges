<?php
class Demo
{
	private $file = 'index.php';
	public function __construct($file)
	{
		$this->file = $file;
	}
	function __destruct()
	{
		echo @highlight_file($this->file, true);
	}
	function __wakeup()
	{
		if ($this->file != 'index.php') {
			//the secret is in the flag.php
			$this->file = 'index.php';
		}
	}
}
if (isset($_GET['Sonder'])) {
	$var = base64_decode($_GET['Sonder']);
	if (preg_match('/[oc]:\d+:/i', $var)) {
		die('stop hacking!');
	} else {
		@unserialize($var);
	}
} else {
	highlight_file("index.php");
}