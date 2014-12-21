<?php
	$GLOBALS["mods"] = array(
		"Origin" => "countrygamer_core",
		"Weeping Angels" => "weeping-angels",
		"Races For Minecraft" => "racesforminecraft",
		"Owner Emitter" => "owner-emitter",
		"Morph Additions" => "morphadditions",
		"Not Enough Keys" => "notenoughkeys"
	);
	foreach ($GLOBALS["mods"] as $mod) {
		$url = "http://widget.mcf.li/mc-mods/minecraft/" . $mod . ".json";
		$modJson = json_decode(file_get_contents($url), true);
		$GLOBALS["download:" . $mod] = $modJson["download"]["url"] . "#";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<?php
			foreach ($GLOBALS["mods"] as $modName => $modsubname) {
				echo "<button onclick=
					\"window.open('" . $GLOBALS["download:" . $modsubname] . "', '_self')\"
				>" . $modName . "</button><br />";
			}

		?>
	</body>
</html>
