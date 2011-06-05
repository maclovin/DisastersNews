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
		require("mysqlclass.php");
		require("yql.php");
		
		$id_disaster = $_REQUEST['id'];
		$xmldoc = yql("select * from feed where url='http://www.gdacs.org/XML/RSS.xml'");	
		
	?>
    </head>
    <body>		
		<div id="settings" dojoType="dojox.mobile.View" selected="True" style="font-size:14px;">
			<?php	
				foreach ($xmldoc->results->item as $item) {
					$namespaces = $item->getNameSpaces(true);
					$gdas = $item->children($namespaces['gdas']);
					$geo = $item->children($namespaces['geo']);
					$asgard = $item->children($namespaces['asgard']);
					
					if($asgard->ID == $id_disaster) {
						echo '<h1 dojoType="dojox.mobile.Heading">' . $item->title . '</h1>'; 
						echo '<ul dojoType="dojox.mobile.RoundRectList" id="top">';
						
						echo "<p>" . str_replace("&quote;", "", $item->description) . "</p>";
						echo '<p><b>Pub. Date:</b><br><h2>' . substr($item->pubDate, 0, 16) . '</h2></p>'; 
						echo '<p><h2><a href="comment.php?id=' . $id_disaster . '">Leave a comment</a></h2></p>'; 
					}
				}
			?>
			<?php
			$conexao_comments = new conexao;
			$all_comments = $conexao_comments->sql_query("SELECT * FROM comments WHERE id_disaster = '$id_disaster'");
			$conexao_comments->desconecta;
			
			while($comment = mysql_fetch_object($all_comments)) {
				echo "<b>" . $comment->name . "(" . $comment->email . ")</b> post:<br>";
				echo "<p><i>" . $comment->comment . "</i></p>";
			}
			
			?>

		</div>
		<div style="text-align:center;">RHoK</div>
    </body>
</html>