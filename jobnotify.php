<?php

echo "Notify me!<br />";
$data = file_get_contents('php://input');
#echo $entityBody;
$dir = './jenkin_logs/';
$date = date("n.j.Y");
$log = "Database Log:" . PHP_EOL;
$log = $log . 'String length: ' . strlen($data);

file_put_contents($dir . 'Input.txt', strlen($data) . PHP_EOL . $data, FILE_APPEND);

if (strlen($data) > 0) {
	$json = json_decode($data);
	$name = $json['name'];
	$url = $json['build']['full_url'];
	$number = $json['build']['number'];
	$status = $json['build']['status'];

	$log .= 'Found data ' . $name . ' ' . $number . ' ' . $status; 

	$fileName = $name . '_' . $number . '_' . $status;
	file_put_contents($dir . $fileName . '_' . $date . '.txt', $data, FILE_APPEND);
	
	#if ($status === 'SUCCESS') {
	#	$db = new PDO('mysql:host=localhost;dbname=thetemportalist', "thetemportalist", "XXX");
	#	$log .= $db;
		
	#}

}
echo "End";
file_put_contents($dir . 'Log_' . $date . '.txt', $date . ':' . PHP_EOL . $log . PHP_EOL, FILE_APPEND);

?>
