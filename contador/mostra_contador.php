<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table>
<tr>
<td><b>Visitas Hoje</b></td>
<td>
<?php
$file_count = fopen('counter/count.db', 'rb');
$data = '';
while (!feof($file_count)) $data .= fread($file_count, 4096);
fclose($file_count);
list($today, $yesterday, $total, $date, $days) = split("%", $data);
echo $today;
?>
</td>
</tr>
<tr>
<?php /*?><td><b>Ontem</b></td>
<td>
<?php
echo $yesterday;
?>
</td>
<?php */?></tr>
<tr>
<td><b>Visitas Total</b></td>
<td>
<?php
echo $total;
?>
</td>
</tr>
<tr>
<?php /*?><td><b>Daily average</b></td>
<td>
<?php
echo ceil($total/$days);
?>
</td>
<?php */?></tr>
</table>
</body>
</html>