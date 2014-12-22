<?php
	// que and save all my mods and their corresponding curseforge names
	$GLOBALS["mods"] = array(
		"Origin" => "countrygamer_core",
		"Weeping Angels" => "weeping-angels",
		"Races For Minecraft" => "racesforminecraft",
		"Owner Emitter" => "owner-emitter",
		"Morph Additions" => "morphadditions",
		"Not Enough Keys" => "notenoughkeys"
	);
	// Run through each of the mods and get the download url
	foreach ($GLOBALS["mods"] as $mod) {
		$url = "http://widget.mcf.li/mc-mods/minecraft/" . $mod . ".json";
		$modJson = json_decode(file_get_contents($url), true);
		$GLOBALS["download:" . $mod] = $modJson["download"]["url"] . "#";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The Temportalist</title>
		<link type="text/css" rel="stylesheet" href="index.css" />
	</head>
	<body>
		<?php
			// iterate through all mods and create buttons for them
			/*
			foreach ($GLOBALS["mods"] as $modName => $modsubname) {
				echo "<button onclick=
					\"window.open('" . $GLOBALS["download:" . $modsubname] . "')\"
				>" . $modName . "</button><br />";
			}
			*/
		?>

		<div align="center">
			<img src="resources/TheTemportalist.png" style="width:437.5px; height:112.5px;">
		</div>

		<div id="sidebar">

		</div>

		<div id="body">
			this is the body
		</div>

	</body>
</html>
