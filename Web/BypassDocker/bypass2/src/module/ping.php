<?php
function Check()
{
    $patterns = [
        'cat' => "服务器检测到可疑字符串cat，启动了查杀程序😋",
        'tac' => "服务器检测到攻击者试图使用'tac'来代替cat绕过防御🥱",
        'less' => "服务器检测到攻击者试图使用'less'来代替cat绕过防御🥱",
        'more' => "服务器检测到攻击者试图使用'more'来代替cat绕过防御🥱",
//        'head' => "服务器检测到攻击者试图使用'head'来代替cat绕过防御🥱",
        'tail' => "服务器检测到攻击者试图使用'tail'来代替cat绕过防御🥱",
        'nl' => "服务器检测到攻击者试图使用'nl'来代替cat绕过防御🥱",
        'od' => "服务器检测到攻击者试图使用'od'来代替cat绕过防御🥱",
//        'sort' => "服务器检测到攻击者试图使用'sort'来绕过检测🥲",
//        'uniq' => "服务器检测到攻击者试图使用'uniq'来绕过检测🥲",
        'file -f' => "该环暂不支持使用'file -f'来读取文件内容😣, 不过也许你可以试试'sh /flag 2>%261'",
        'vim' => "该环暂不支持使用'vim'来读取文件内容😣",
        'vi' => "该环暂不支持使用'vi'来读取文件内容😣",
    ];

    foreach ($patterns as $pattern => $message) {
        if (preg_match("/$pattern/", $_GET['ip'])) {
            echo $message;
            return false;
        }
    }
    return true;
}

$file = fopen("/var/www/html/data/device.txt", "r") or die("Unable to open file!");
$existingData = [];
while (($data = fgetcsv($file, 1000, "|")) !== false) {
    $existingData[] = [$data[0], end($data)];
}
fclose($file);

if (isset($_GET['ip'])) {
    if ($_GET['ip'] !== '') {
        if (Check() !== false) {
            $ip = $_GET['ip'];

            $ipIndex = array_search($ip, array_column($existingData, 0));
            if ($ipIndex !== false) {
                $status = $existingData[$ipIndex][1];
            } else {
                ob_start();
                system("ping -c 2 " . $ip);
                $pingResult = ob_get_clean();
                $status = strpos($pingResult, '2 packets transmitted, 2 packets received, 0% packet loss') !== false ? "在线" : "离线";
                echo $pingResult . "\n";
            }
            echo "系统检测到该设备处于" . $status . "状态";

            $isIP = filter_var($ip, FILTER_VALIDATE_IP);
            if ($isIP !== false && $ipIndex === false) {
                $mac = implode(':', str_split(substr(md5(mt_rand()), 0, 12), 2));
                $deviceType = "none";
                $deviceName = "none";
                $openPort = "80";
                $file = fopen("data/device.txt", "a") or die("Unable to open file!");
                fputcsv($file, [$ip, $mac, $deviceType, $deviceName, $openPort, $status], "|");
            }
        }
    } else echo "请输入目标ip";
} else echo "检测ip是否存活";