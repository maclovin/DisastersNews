<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>Disasters News</title>
    <link href="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/mobile/themes/iphone/iphone.css" rel="stylesheet"></link>
 	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojo/dojo.xd.js" djConfig="isDebug:true, parseOnLoad:true"></script>
	<script type="text/javascript">
		// Use the lightweight parser
		dojo.require("dojox.mobile.parser");
		// Require Dojo mobile
		dojo.require("dojox.mobile");
		//Require the compat if the client isn't Webkit-based
		dojo.requireIf(!dojo.isWebKit,"dojox.mobile.compat");
	</script>
	<style>
		#top {
			text-align:center;
		}
		a {
			text-decoration:none;
			color:#000;
		}
	</style>
	<?php
		require("yql.php");
		
		$xmldoc = yql("select * from feed where url='http://www.gdacs.org/XML/RSS.xml'");	

	?>
    </head>
    <body>
 		<div id="settings" dojoType="dojox.mobile.View" selected="True">
		
			<h1 dojoType="dojox.mobile.Heading">Disasters News</h1>
			
			<ul dojoType="dojox.mobile.RoundRectList" id="top">
				<img src="app_logo.png" width="200px">
				<li dojoType="dojox.mobile.ListItem" moveTo="News">
					View
				</li>
			</ul>
		
		</div>
		
		<div id="News" dojoType="dojox.mobile.View">
		
			<h1 dojoType="dojox.mobile.Heading" back="Settings" moveTo="settings">News</h1>
			
			<ul dojoType="dojox.mobile.RoundRectList">
				<?php
					foreach ($xmldoc->results->item as $item) {
						$namespaces = $item->getNameSpaces(true);
						$gdas = $item->children($namespaces['gdas']);
						$geo = $item->children($namespaces['geo']);
						$asgard = $item->children($namespaces['asgard']);
						
						if($gdas->alertLevel == "Green") {
				?>
					<li dojoType="dojox.mobile.ListItem" icon="green_light.png" rightText="">
				<?php			
					}
					else {
				?>
					<li dojoType="dojox.mobile.ListItem" icon="red_light.png" rightText="">
				<?php
					}
				?>
						<?php echo '<a href="view.php?id=' . $asgard->ID . '">' . substr($item->title, 0, 25) . '</a>'; ?>
					</li>
				<?php } ?>
			</ul>
		
		</div>
		<div style="text-align:center;">RHoK</div>
    </body>
</html>