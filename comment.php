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
		$id = $_REQUEST['id'];
	?>
    </head>
    <body>
 		<div id="settings" dojoType="dojox.mobile.View" selected="True">
		
			<h1 dojoType="dojox.mobile.Heading">Disasters News</h1>
			
			<ul dojoType="dojox.mobile.RoundRectList" id="top">
				<form method="post" action="post.php">
					<?php echo '<input type="hidden" name="id_disaster" value="' . $id . '">'; ?>
					Name:<br>
					<input type="text" name="name" size="40"><br>
					E-mail<br>
					<input type="text" name="email" size="40"><br>
					Comment:<br>
					<textarea rows="5" cols="40" name="comment"></textarea><br>
					<p>
						<input type="submit" value="Post">
					</p>
				</form>
			</ul>
		
		</div>
		
		<div style="text-align:center;">RHoK</div>
    </body>
</html>