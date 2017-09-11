<?php
	session_start(); // Inicia a sessão
	session_destroy(); // Destrói a sessão limpando todos os valores salvos
	header("Location: ../acesso_sistema.php"); exit; // Redireciona o visitante
?>