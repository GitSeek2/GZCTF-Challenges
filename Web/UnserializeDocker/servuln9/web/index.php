<?php
//flag is in flag.php
highlight_file(__FILE__);
class Modifier
{
	private $var;
	public function append($value)
	{
		include($value);
		echo $flag;
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
	public function __toString()
	{
		return $this->str->source;
	}
	public function __wakeup()
	{
		echo $this->source;
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
	unserialize($_GET['Sonder']);
}