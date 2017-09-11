<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
	require_once("includes/conexao.php");
	
	// A sessão precisa ser iniciada em cada página diferente
	if (!isset($_SESSION)) session_start();
	
	$nivel_necessario = 1;
	
	// Verifica se não há a variável da sessão que identifica o usuário
	if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
		// Destrói a sessão por segurança
		session_destroy();
		// Redireciona o visitante de volta pro login
		header("Location: ../acesso_sistema.php"); exit;
	}

	$escolas = $_POST['escolas'];

	$sql = "SELECT id_devedor, nome_dev FROM devedor WHERE id_cli_cliente = $escolas ORDER BY nome_dev ASC";
	$res = mysql_query($sql) or die(mysql_error());
	
	if (mysql_num_rows($res) == 0){
		echo utf8_encode('<option value="0">Não existem devedores!</option>');
	}else{
	while ($row = mysql_fetch_assoc($res)) {
		echo '<option value="'.$row['id_devedor'].'">'.utf8_encode($row['nome_dev']).'</option>';
	}
	}
?>