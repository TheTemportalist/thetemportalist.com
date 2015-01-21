<?php

function out($txt) {
	echo $txt . "<br />";
}

$mcv = $_GET["mcv"];
$id = $_GET["id"];
$v = $_GET["v"];

out($mcv);
out($id);
out($v);

$json = json_decode(file_get_contents("http://widget.mcf.li/mc-mods/minecraft/" . $id . ".json"), true);
#echo '<pre>' . print_r($json, true) . '</pre>';
echo '<pre>' . print_r($json['versions'][$mcv][0], true) . '</pre>';

?>
