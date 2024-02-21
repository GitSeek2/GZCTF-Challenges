<?php
function Check()
{
    $patterns = [
        ' ' => "服务器检测到可疑的空格，启动了查杀程序😋",
        '\t' => "服务器检测到攻击者试图使用制表符'%09'来代替空格绕过防御🥱",
//        '<' => "服务器检测到攻击者试图使用'<'来代替空格绕过防御🥱",
        '\$\{IFS}' => "服务器检测到攻击者试图使用'\${IFS}\$'来代替空格绕过防御🥱",
//        '\$IFS\$9' => "服务器检测到攻击者试图使用'\$IFS\$9'来代替空格绕过防御🥱",
        '\{*}' => "该环暂不支持使用类似{cat,/flag}来代替空格绕过防御🥺",

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