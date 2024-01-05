<?php
highlight_file(__FILE__);
class a{
	var $act;
	function action(){
		eval($this->act);
	}
}
$a=unserialize($_GET['Sonder']);
$a->action();