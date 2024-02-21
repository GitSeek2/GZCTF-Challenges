<?php
error_reporting(0);
$date = date('Y-m-d H:i');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xml = file_get_contents('php://input');
    $doc = new DOMDocument();
    if ($xml) {
        $doc->loadXML($xml, LIBXML_NOENT | LIBXML_DTDLOAD);
        $comment = simplexml_import_dom($doc);
        $username = $comment->username;
        $text = $comment->text;
        $comment = "---\nuser: $username\ntext: $text\ndate: $date\n";
        file_put_contents('../data/comment.txt', $comment, FILE_APPEND);
        echo "发布成功";
    } else {
        echo "无效请求";
    }
}
?>