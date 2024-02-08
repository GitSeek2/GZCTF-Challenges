<?php
function getValue()
{
echo "部分变量的值:\n";
echo "Gemini：";
var_dump(base64_decode($_COOKIE['Gemini']));
}