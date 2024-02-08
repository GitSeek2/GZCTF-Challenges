<?php
function filter($params)
{
    $safe = array("flag", "/");
    return str_replace($safe, "hack", $params);
}

class Scorpio
{
    var $hobby;
    var $trait = 'Mystery';

    function __construct($hobby)
    {
        $this->hobby = $hobby;
    }
}

if (isset($_REQUEST['Scorpio'])) {
    $data = new Scorpio($_REQUEST['Scorpio']);
    var_dump($data);
    $serData = serialize($data);
    $profile = unserialize(filter($serData));
    if ($profile->trait === 'escaping') {
        echo file_get_contents("/flag");
    }
} else echo "系统检测发现该处漏洞，进行攻击测试\n";
?>