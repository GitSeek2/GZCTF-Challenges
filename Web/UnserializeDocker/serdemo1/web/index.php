<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<?php
error_reporting(0); //关闭错误报告
class happy
{
	protected $file = 'index.php';
	public function __construct($file)
	{
		$this->file = $file;
	}

	function __destruct()
	{
		if (!empty($this->file)) {
			if (strchr($this->file, "\\") === false && strchr($this->file, '/') === false) //过滤了文件名中的\\与/
				show_source(dirname(__FILE__) . '/' . $this->file); //打开文件操作
			else
				die('Wrong filename.');
		}
	}

	function __wakeup()
	{
		$this->file = 'index.php';
	}
	public function __toString()
	{
		return '';
	}
}

if (!isset($_GET['Sonder'])) {
	show_source('index.php');
} else {
	$file = base64_decode($_GET['Sonder']);
	echo unserialize($file);
}
// password in flag.php
