<?php

echo "Notify me!";
$data = file_get_contents('php://input');
#echo $entityBody;
if (strlen($data) != 0){
	$json = json_decode($data);
	$name = $json['name'];
	$url = $json['build']['full_url'];
	$number = $json['build']['number'];
	$status = $json['build']['status'];

	$dir = './jenkin_logs/';
	$fileName = $name . '_' . $number . '_' . $status;
	file_put_contents(($dir . $fileName . '_').date("j.n.Y").'.txt', $data, FILE_APPEND);

	if ($status === 'SUCCESS') {
		$log = "Database Log:\n";
		$db = new PDO('mysql:host=localhost;dbname=thetemportalist', "thetemportalist", "XXX");
		$log .= $db;

		file_put_contents(($dir . $fileName . '_').date("j.n.Y").'.txt', $log, FILE_APPEND)
	}

}

?>
