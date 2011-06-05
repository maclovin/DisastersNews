<?php
	function yql($query) {
		$yql_query = urlencode($query);	
		$url = "http://query.yahooapis.com/v1/public/yql?q=" . $yql_query . '&format=xml';
		
		return simplexml_load_file($url);
	}
?>