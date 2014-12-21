<?php
	$prefix = "http://minecraft.curseforge.com/mc-mods/";
	$mods = array("countrygamer_core");
	echo "for loop<br />";
	foreach ($mods as $mod) {
		$url = "http://widget.mcf.li/mc-mods/minecraft/" . $mod . ".json";
		echo "  " . $url . "<br />";
		$json = file_get_contents($url);
		echo "  " . $json . "<br />";
	}
	$GLOBALS["origin"] = "origin download url";

?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<?php echo $GLOBALS["origin"]; ?>
	</body>
</html>
