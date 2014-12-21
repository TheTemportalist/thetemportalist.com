<?php
	$prefix = "http://minecraft.curseforge.com/mc-mods/";
	$GLOBALS["mods"] = array(
		"Origin" => "countrygamer_core",
		"Weeping Angels" => "weeping-angels",
		"Races For Minecraft" => "racesforminecraft",
		"Owner Emitter" => "owner-emitter",
		"Morph Additions" => "morphadditions",
		"Not Enough Keys" => "notenoughkeys";
	);
	echo "for loop<br />";
	foreach ($mods as $mod) {
		$url = "http://widget.mcf.li/mc-mods/minecraft/" . $mod . ".json";
		echo $url . "<br />";
		#$modJson = json_decode(file_get_contents($url), true);
		#$GLOBALS["download:" . $mod] = $modJson["download"]["url"];
	}
	#$GLOBALS["mods"] = $mods;


?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<?php #echo $GLOBALS["origin"]; ?>
	</body>
</html>
