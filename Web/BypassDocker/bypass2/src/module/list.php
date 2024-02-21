<?php
$file = fopen("/var/www/html/data/device.txt", "r") or die("Unable to open file!");

echo '<table class="table table-hover table-dark">';
echo '<thead><tr><th>IP</th><th>MAC</th><th>设备名称</th><th>设备类型</th><th>开放端口</th><th>Status</th></tr></thead>';
echo '<tbody>';

while (!feof($file)) {
    $line = fgets($file);
    $data = explode("|", $line);
    if (count($data) == 6) {
        $ip = trim($data[0]);
        $mac = trim($data[1]);
        $deviceName = trim($data[2]);
        $deviceType = trim($data[3]);
        $openPort = trim($data[4]);
        $status = trim($data[5]);
        $statusClass = $status == '在线' ? 'text-success' : 'text-danger';
        echo "<tr><td>$ip</td><td>$mac</td><td>$deviceName</td><td>$deviceType</td><td>$openPort</td><td class=\"$statusClass\">$status</td></tr></tr>";
    }
}
echo '</tbody>';
echo '</table>';
fclose($file);
?>