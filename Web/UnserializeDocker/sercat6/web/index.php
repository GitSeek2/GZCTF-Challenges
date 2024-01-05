<head><meta charset="utf-8"></head>
<?php
include 'flag.php';
error_reporting(0);

highlight_file(__FILE__);

class body
{

	private $want, $todonothing = "i can't get you want,But you can tell me before I wake up and change my mind";

	public function __construct($want)
	{
		$About_me = "When the object is created,I will be called";
		if ($want !== " ")
			$this->want = $want;
		else
			$this->want = $this->todonothing;
	}
	function __wakeup()
	{
		$About_me = "When the object is unserialized,I will be called";
		$but = "I can CHANGE you";
		$this->want = $but;
		echo "C1ybaby!";

	}
	function __destruct()
	{
		$About_me = "I'm the final function,when the object is destroyed,I will be called";
		echo "So,let me see if you can get what you want\n";
		if ($this->todonothing === $this->want)
			die("鲍勃,别傻愣着!\n");
		if ($this->want == "I can CHANGE you")
			die("You are not you....");
		if ($this->want == "flag.php" or is_file($this->want)) {
			die("You want my heart?No way!\n");
		} else {
			echo "You got it!";
			highlight_file($this->want);
		}
	}
}

class unserializeorder
{
	public $CORE = "人类最大的敌人,就是无序. Yahi param vaastavikta hai!<BR>";
	function __sleep()
	{
		$About_me = "When the object is serialized,I will be called";
		echo "We Come To HNCTF,Enjoy the ser14l1zti0n <BR>";
	}
	function __toString()
	{
		$About_me = "When the object is used as a string,I will be called";
		return $this->CORE;
	}
}
$obj = new unserializeorder();
echo $obj;
$obj = serialize($obj);

if (isset($_GET['Sonder'])) {
	$ywant = @unserialize(@$_GET['Sonder']);
	echo $ywant;
}