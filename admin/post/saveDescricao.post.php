<?php

require_once '../../lib/connection.class.php';

$pdo = Connection::getConnection();

$pstPageName = (isset($_POST['pageName'])) ? $_POST['pageName'] : null;
$pstData = (isset($_POST['data'])) ? $_POST['data'] : null;

if ($pstData !== null && $pstPageName !== null){

	$sql = "UPDATE paginas SET descricao = :descricao WHERE nome = :nome";
	$stmt = $pdo->prepare($sql);

	$stmt->bindParam('nome', $pstPageName);
	$stmt->bindParam('descricao', $pstData);

	if ($stmt->execute())
		$return = "Dados Atualizados com Sucesso !";
	else
		$return = "Erro ao atualizado os Dados.";

	echo $return;

}
