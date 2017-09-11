<?php

// A sess�o precisa ser iniciada em cada p�gina diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;

// Verifica se n�o h� a vari�vel da sess�o que identifica o usu�rio
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destr�i a sess�o por seguran�a
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: ../acesso_sistema.php"); exit;
}

include_once('masterpage.php'); ?>
<HTML>
<HEAD>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	    <link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
    	<link href="css/Style.css" rel="stylesheet" type="text/css" />
</HEAD>
<body>
	<table style="height:100%;width:100%;">
		<tr>
			<td align="center" class="Saudacao">
            	<p>Ol&aacute;, <?php echo $_SESSION['UsuarioNome']; ?>!<br /><br />
                	Seja bem vindo(a) a adminstra&ccedil;&atilde;o do Sistema de Controle de Cobran�a Jur�dica (SCCJ - Vers�o 1.0) da Canut & Oliveira Lima Advogados Associados.</p>
			</td>
		</tr>
	</table>
</body>
</HTML>