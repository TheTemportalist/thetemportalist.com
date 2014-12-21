<?php
	$prefix = "http://minecraft.curseforge.com/mc-mods/";
	$mods = array("countrygamer_core");
	echo "for loop<br />";
	foreach ($mods as $mod) {
		echo $mod . "<br />";
	}
	$GLOBALS["origin"] = "origin download url";

?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<?php echo $GLOBALS["origin"]; ?>
	</body>
</html>
