<?php
	require("mysqlclass.php");
	
	$id_disaster = $_POST['id_disaster'];
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$email = $_POST['email'];
	
	if(!$id_disaster) {
		echo "<script> history.back(); </script> ";
	}
	else {
		$conexao_post = new conexao;
		$postar = $conexao_post->sql_query("INSERT INTO comments (id_disaster, name, comment, email) VALUES('$id_disaster', '$name', '$comment', '$email')");
		$conexao_post->desconecta;
		echo '<script> window.location="index.php"</script>';
	}
?>