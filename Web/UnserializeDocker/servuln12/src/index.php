<?php
highlight_file(__FILE__);
class TestObject {
    public function __destruct() {
		include('flag.php');
        echo $flag;
    }
}
$filename = $_POST['Sonder'];
$boo1=1;
$black_list=['php','file','glob','data','http','ftp','zip','https','ftps','phar'];
foreach($black_list as $item){
	$front=substr($filename,0,strlen($item));
	if ($front==$item){
		$boo1=0;
	}
}
if (isset($filename) and $boo1){
	echo md5_file($filename);
}
//upload.php