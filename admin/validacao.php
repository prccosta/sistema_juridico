<?php

// Verifica se houve POST e se o usu�rio ou a senha �(s�o) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
	header("Location: ../acesso_sistema.php"); exit;
}

require_once("includes/conexao.php");

$usuario = mysql_real_escape_string($_POST['usuario']);
$senha = mysql_real_escape_string($_POST['senha']);

// Valida��o do usu�rio/senha digitados
$sql = "SELECT `id`, `nome`, `usuario`, `nivel` FROM `usuarios` WHERE (`usuario` = '". $usuario ."') AND (`senha` = '". md5($senha) ."') AND (`ativo` = 1) LIMIT 1";
$query = mysql_query($sql);
if (mysql_num_rows($query) != 1) {
	// Mensagem de erro quando os dados s�o inv�lidos e/ou o usu�rio n�o foi encontrado
	echo "Login inv�lido!"; exit;
} else {
	// Salva os dados encontados na vari�vel $resultado
	$resultado = mysql_fetch_assoc($query);

	// Se a sess�o n�o existir, inicia uma
	if (!isset($_SESSION)) session_start();

	// Salva os dados encontrados na sess�o
	$_SESSION['UsuarioID'] = $resultado['id'];
	$_SESSION['UsuarioNome'] = $resultado['nome'];
	$_SESSION['UsuarioLogin'] = $resultado['usuario'];
	$_SESSION['UsuarioNivel'] = $resultado['nivel'];
	$_SESSION['UsuarioCliente'] = $resultado['id_cliente'];

	// Redireciona o visitante
	header("Location: index.php"); exit;
}

?>