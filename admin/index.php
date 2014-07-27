<?php

session_start();

require_once '../lib/connection.class.php';
require_once 'adminPage.php';

$logado = (isset($_SESSION['logado'])) ? $_SESSION['logado'] : null;

$post = (Object) $_POST;
$pdo = Connection::getConnection();

if ($logado === 1){

	echo adminPage::getAdminPage($pdo, '');

} else {

	if (isset($_POST['user']) && isset($_POST['pass'])){

		$sql = "SELECT * FROM users WHERE login = :login";

		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':login', $post->user);
		$stmt->execute();

		if ($obj = $stmt->fetch(PDO::FETCH_OBJ)){
			if (password_verify($post->pass, $obj->pass)){
				$_SESSION['logado'] = 1;
				$_SESSION['user'] = $obj;

				echo adminPage::getAdminPage($pdo, '');

			} else{
				$_SESSION['logado'] = 0;
				header('Location: ./login?error=Acesso+Negado');
			}
		} else{
			header('Location: ./login?error=User+Not+Found');
			$_SESSION['logado'] = 0;
		}

	} else {
		header('Location: ./login');
		$_SESSION['logado'] = 0;
	}
}
