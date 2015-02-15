<?php

echo "Notify me!\n";
$data = file_get_contents('php://input');
#echo $entityBody;
$dir = './jenkin_logs/';
$log = "Database Log:\n";
if (strlen($data) != 0){
	$json = json_decode($data);
	$name = $json['name'];
	$url = $json['build']['full_url'];
	$number = $json['build']['number'];
	$status = $json['build']['status'];

	$fileName = $name . '_' . $number . '_' . $status;
	file_put_contents(($dir . $fileName . '_').date("j.n.Y").'.txt', $data, FILE_APPEND);
	
	if ($status === 'SUCCESS') {
		$db = new PDO('mysql:host=localhost;dbname=thetemportalist', "thetemportalist", "XXX");
		$log .= $db;
		
	}

}
echo "End";
file_put_contents(($dir . '_').date("j.n.Y").'.txt', $log, FILE_APPEND);

?>
