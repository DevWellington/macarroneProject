<?php 

session_start();
unset($_SESSION['user']);
unset($_SESSION['logado']);

header('Location: ../');

?>