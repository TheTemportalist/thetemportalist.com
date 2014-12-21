<?php
	$prefix = "http://minecraft.curseforge.com/mc-mods/";
	$mods = array("countrygamer_core");
	echo "for loop<br />";
	foreach ($mods as $mod) {
		$url = "http://widget.mcf.li/mc-mods/minecraft/" . $mod . ".json";
		$modJson = json_decode(file_get_contents($url), true);
		echo "  " . $modJson["download"] . "<br />";
	}
	$GLOBALS["origin"] = "origin download url";

?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<?php echo $GLOBALS["origin"]; ?>
	</body>
</html>
