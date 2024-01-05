<?php
//flag is in flag.php
class Modifier
{
	protected $var;
	public function append($value)
	{
		include($value);
	}
	public function __invoke()
	{
		$this->append($this->var);
	}
}

class Show
{
	public $source;
	public $str;
	public function __construct($file = 'index.php')
	{
		$this->source = $file;
		echo 'Welcome to ' . $this->source . "<br>";
	}
	public function __toString()
	{
		return $this->str->source;
	}

	public function __wakeup()
	{
		if (preg_match("/gopher|http|file|ftp|https|dict|\.\./i", $this->source)) {
			echo "hacker";
			$this->source = "index.php";
		}
	}
}

class Test
{
	public $p;
	public function __construct()
	{
		$this->p = array();
	}

	public function __get($key)
	{
		$function = $this->p;
		return $function();
	}
}

if (isset($_GET['Sonder'])) {
	@unserialize($_GET['Sonder']);
} else {
	$a = new Show;
	highlight_file(__FILE__);
}