<?php

echo "Notify me!<br />";
$data = file_get_contents('php://input');
#echo $entityBody;
$dir = './jenkin_logs/';
$date = 'date';#.date("j.n.Y");
$log = "Database Log:\n";
$log = $log . 'String length: ' . (strlen($data) != 0);
if (strlen($data) != 0) {
	$json = json_decode($data);
	$name = $json['name'];
	$url = $json['build']['full_url'];
	$number = $json['build']['number'];
	$status = $json['build']['status'];

	$fileName = $name . '_' . $number . '_' . $status;
	file_put_contents($dir . $fileName . '_' . $date . '.txt', $data);
	
	if ($status === 'SUCCESS') {
		$db = new PDO('mysql:host=localhost;dbname=thetemportalist', "thetemportalist", "XXX");
		$log .= $db;
		
	}

}
echo "End";
file_put_contents($dir . 'Log_' . $date . '.txt', $date . ':\n' . $log . '\n', FILE_APPEND);

?>
