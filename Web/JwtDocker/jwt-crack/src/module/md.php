<?php
function getPostAll($file)
{
    $markdown = file_get_contents($file);
    // 按行分割
    $lines = explode("\n", $markdown);
    // 初始化 HTML
    $html = '';
    // 初始化代码块标志
    $inCodeBlock = false;
    // 遍历每一行
    foreach ($lines as $line) {
        $result = mdParse($line, $html, $inCodeBlock);
        $html = $result[0];
        $inCodeBlock = $result[1];
    }
    return $html;
}

function getPost($file, $line_num)
{
    $markdown = file_get_contents($file);
    // 按行分割
    $lines = explode("\n", $markdown);
    // 初始化 HTML
    $html = '';
    // 初始化代码块标志
    $inCodeBlock = false;
    // 遍历每一行
    $i = 0;
    foreach ($lines as $line) {
        $result = mdParse($line, $html, $inCodeBlock);
        $html = $result[0];
        $inCodeBlock = $result[1];
        $i++;
        if ($i === $line_num) break;
    }
    $html .= '<div class="loader"></div>';
    return $html;
}


function mdParse($line, $html, $inCodeBlock)
{
    $processInlineCode = function ($text) {
        if (preg_match('/`(.+?)`/', $text)) {
            $text = preg_replace_callback('/`(.+?)`/', function ($matches) {
                return "<code class='md-inline-code'>" . $matches[1] . "</code>";
            }, $text);
        }
        return $text;
    };

    if (strpos($line, '# ') === 0) {
        $text = substr($line, 1);
        $text = $processInlineCode($text);
        $html .= "<p class='md-h1 text-danger'>$text</p>\n";
    } elseif (strpos($line, '## ') === 0) {
        $text = substr($line, 2);
        $text = $processInlineCode($text);
        $html .= "<p class='md-h2 text-warning'>$text</p>\n";
    } elseif (strpos($line, '### ') === 0) {
        $text = substr($line, 3);
        $text = $processInlineCode($text);
        $html .= "<p class='md-h3 text-info'>$text</p>\n";
    } elseif (strpos($line, '#### ') === 0) {
        $text = substr($line, 4);
        $text = $processInlineCode($text);
        $html .= "<p class='md-h4 text-success'>$text</p>\n";
    } elseif (strpos($line, '> ') === 0) {
        $text = substr($line, 2);
        $text = $processInlineCode($text);
        $html .= "<p class='md-blockquote text-white-50'>$text</p>\n";
    } elseif (strpos($line, '```') === 0) {
        $inCodeBlock = !$inCodeBlock;
        $html .= $inCodeBlock ? "<pre><code id='md-code'>" : "</code></pre>\n";
    } else {
        $line = $processInlineCode($line);
        $html .= $inCodeBlock ? htmlspecialchars($line) . "\n" : "<p class='md-p text-white-50'>$line</p>\n";
    }

    return [$html, $inCodeBlock];
}

?>