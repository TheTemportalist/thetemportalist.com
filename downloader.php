<?php

function out($txt) {
	echo $txt . "<br />";
}

$mcv = $_GET["mcv"];
$id = $_GET["id"];
$file = $_GET["file"];
$rawStatus = $_GET["rawStatus"];

#out($mcv);
#out($id);
#out($file);

$json = json_decode(file_get_contents("http://widget.mcf.li/mc-mods/minecraft/" . $id . ".json"), true);
#echo '<pre>' . print_r($json, true) . '</pre>';
$versions = $json['versions'][$mcv];

out($json['title']);
$matchedVersion = array("title" => $json['title']);
$url = "";

if (strcmp($file, 'latest') == 0) {
	#$url = $versions[0]['url'];
	$matchedVersion = $versions[0];
}
else {
	foreach ($versions as $modVersion) {
		if (strcmp($file . ".jar", $modVersion['name']) == 0) {
#			out("Found " . $modVersion['name']);
			#$url = $modVersion['url'];
			$matchedVersion = $modVersion;
		}
	}
}
#out($url);



if (strcmp($rawStatus, "raw") == 0) {
	if (array_filter($matchedVersion)) {
		out("{");
		echo "<div style='padding-left:20px;'>";
		out("\"name: \"" . $matchedVersion['title'] . "\"");
		out("\"mcv\": \"" . $mcv . "\"");
		out("\"file\": \"" . $matchedVersion['name'] . "\"");
		out("\"url\": \"" . $matchedVersion['url'] . "\"");
		echo "</div>";
		out("}");
	}
	else {
		out("{}");
	}
}
else {
	if (array_filter($matchedVersion)) {
	
	}
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}
exit;

?>
