<?php

function out($txt) {
	echo $txt . "<br />";
}

$mcv = $_GET["mcv"];
$id = $_GET["id"];
$file = $_GET["file"];

out($mcv);
out($id);
out($file);

$json = json_decode(file_get_contents("http://widget.mcf.li/mc-mods/minecraft/" . $id . ".json"), true);
#echo '<pre>' . print_r($json, true) . '</pre>';
$versions = $json['versions'][$mcv];
$url = "";

if (strcmp($file, 'latest') == 0) {
	$url = $versions[0]['url'];
}
else {
	foreach ($versions as $modVersion) {
		if (strcmp($file, $modVersion['name']) == 0) {
			out("Found " . $modVersion['name']);
			$url = $modVersion['url'];
		}
	}
}
out($url);

?>
