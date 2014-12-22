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
	/*
	foreach ($GLOBALS["mods"] as $mod) {
		$url = "http://widget.mcf.li/mc-mods/minecraft/" . $mod . ".json";
		$modJson = json_decode(file_get_contents($url), true);
		$GLOBALS["download:" . $mod] = $modJson["download"]["url"] . "#";
	}
	*/
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

		<!-- HEADER -->
		<div align="center">
			<img src="resources/TheTemportalist.png" style="width:437.5px; height:112.5px;">
		</div>

		<!-- DROP DOWN -->
		<div style="width: 100%;">
			<button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="button dropdown">Dropdown Button</button>
			<br>
			<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true" tabindex="-1">
			  <li><a href="#">This is a link</a></li>
			  <li><a href="#">This is another</a></li>
			  <li><a href="#">Yet another</a></li>
			</ul>
		</div>

		<br />

		<!-- SIDE BAR AND MAIN -->
		<div style="width: 100%; display: table;">
			<div style="display: table-row">
				<!-- SIDE BAR -->
				<div style="width: 20%; display: table-cell;">
					SIDEBAR
				</div>
				<!-- MAIN -->
				<div style="display: table-cell; overflow: auto;">
					MAIN
				</div>
			</div>
		</div>

	</body>
</html>
