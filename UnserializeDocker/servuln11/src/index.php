<?php
highlight_file(__FILE__);
class TestObject {
    public function __destruct() {
		include('flag.php');
        echo $flag;
    }
}
$filename = $_POST['Sonder'];
if (isset($filename)){
	echo md5_file($filename);
}
//upload.php