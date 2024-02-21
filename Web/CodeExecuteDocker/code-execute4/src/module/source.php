<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $code = 'echo'.$func.'id:'.$id.';';
    create_function('$func', $code);
} else {
    echo "服务器剩余防御：1层";
}
?>