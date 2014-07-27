<?php

require_once '../../lib/connection.class.php';

$pdo = Connection::getConnection();

$pstPageName = (isset($_GET['pageName'])) ? $_GET['pageName'] : null;

if ($pstPageName !== null){

	$sql = "SELECT nome, descricao FROM paginas WHERE nome = :nome";
	$stmt = $pdo->prepare($sql);

	$stmt->bindParam('nome', $pstPageName);
	$stmt->execute();

	if ($obj = $stmt->fetch(PDO::FETCH_OBJ))
		$return = json_encode($obj);
	else
		$return = null;

	echo $return;

}
