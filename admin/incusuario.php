<?php
require_once("includes/conexao.php");

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
?>
<!DOCTYPE html>
<html lang="br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Canut e Oliveira Lima Advogados Associados</title>
    <link href="css/Style.css" rel="stylesheet" type="text/css">
    <link href="css/admin_styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/nav.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
    
    <!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body leftmargin="0" topmargin="0" class="no-js">
		<script>
			var el = document.getElementsByTagName("body")[0];
			el.className = "";
			
			$(function(){
				$("#add").click(function(){
					var input = '<div class="itens">';
						input += '<label>Matr�cula: <input type="text" name="matricula[]" size="5" class="CampoTexto" /></label>';
						input += '<label>Nome: <input type="text" name="nome[]" size="60" class="CampoTexto" /></label>';
						input += '<a href="#" class="del">X</a> </div>';
						
						$("#campos").append(input);
						return false;
				});
				
				$(".del").live('click', function(){
					$(this).parent().remove();
				});
			});
			
		</script>
        <noscript>
        	<!--[if IE]>
            	<link rel="stylesheet" href="css/ie.css">
            <![endif]-->
        </noscript>
    <form id="form1" action="sql_incusuario.php" method="post" name="form1">
    <table width="100%" height="100%"  cellpadding="0"  cellspacing="0"  border="0">
		<tr>
			<td background="img/fundo_admin.jpg" align="center" >
				<table width="100" cellpadding="0"  cellspacing="0" >
					<tr>
						<td width="150" >&nbsp;</td>
						<td width="800">
		                    	<table  bgcolor="#B2B2B2" cellpadding="0"  cellspacing="0" width="100%">
										<tr>
											<td height="79" valign="top" align="center">
												<img src="img/logo.jpg">
											</td>
										</tr>
										<tr>
											<td height="31" align="center">
												<table height="31" background="img/Linhas.jpg" class="larguramenu">
													<tr>
														<td width="150">
														<?php include_once('menu.php'); ?>
                                                        </td>
													</tr>
												</table>
                                                
											</td>
										</tr>
										<tr>
											<td background="img/linha_footer.jpg">&nbsp;</td>
										</tr>
									</table>							
                        </td>
					</tr>
                    <tr>
                    <table width="100%" class="Borda1N" id="TABLE2" language="javascript" background="img/fundo.jpg">
                        <tr>
                            <td class="TextoTopo">
                                Incluir Usu�rio</td>
                        </tr>
                        <tr>
                          <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informa��es Gerais</legend>
                                    <table width="750" Class="TextoNormal" >									
                                    <tr>
                                        <td vAlign="top">&nbsp;</td>
                                        <td vAlign="middle" align="left">
                                            <table width="100%" class="TextoNormal">
                                                    <tr>
                                                        <td class="TextoNormal" height="25">Nome:</td>
                                                        <td width="90%"><input type="text" id="nome" name="nome" class="CampoTexto"></td>
                                    </tr>
                                    <tr>
                                        <td class="TextoNormal" height="24" style="HEIGHT: 24px">Usu�rio:&nbsp;</td>
                                        <td width="90%" style="HEIGHT: 24px">
                                            <input type="text" id="usuario" name="usuario" class="CampoTexto">
                                        </td>
                                    </tr>                
                                    <tr>
                                        <td class="TextoNormal" height="24" style="HEIGHT: 24px">Senha:&nbsp;</td>
                                        <td width="90%" style="HEIGHT: 24px">
                                            <input type="text" id="senha" name="senha" class="CampoTexto">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="TextoNormal" height="25">E-mail:&nbsp;</td>
                                        <td width="90%"><input type="text" id="email" name="email" class="CampoTexto">&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="TextoNormal" height="25">Perfil:&nbsp;
                                        </td>
                                        <td width="90%">
                                            <select name="perfil" id="perfil" class="CampoTexto">
                                                                      <option>-- Escolha o Perfil --</option>
                                                                      <option value="1">1- Clientes</option>
                                                                      <option value="2">2- Estagi�rios</option>
                                                                      <option value="3">3- Advogados</option>
                                                                      <option value="4">4- Administradores</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="TextoNormal" height="25">Status:&nbsp;</td>
                                        <td width="90%">
                                            <select name="status" id="status" class="CampoTexto">
                                            	<option>-- Escolha o Status --</option>
                                            	<option value="1">Ativo</option>
                                            	<option value="2">Inativo</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colSpan="2" height="25">&nbsp;&nbsp;
                                            <input type="submit" id="gravar" class="Botao" value=" Gravar ">&nbsp;<input name="Reset" type="reset" class="Botao" value=" Limpar "></td>
                                    </tr>
                                
                                </fieldset>
                            	</table>
                        </form>
                        <script src="js/jquery.js"></script>
                                <script src="js/modernizr.js"></script>
                                <script>
                                    (function($){
                                        
                                        //cache nav
                                        var nav = $("#topNav");
                                        
                                        //add indicator and hovers to submenu parents
                                        nav.find("li").each(function() {
                                            if ($(this).find("ul").length > 0) {
                                                $("<span>").text("^").appendTo($(this).children(":first"));
                        
                                                //show subnav on hover
                                                $(this).mouseenter(function() {
                                                    $(this).find("ul").stop(true, true).slideDown();
                                                });
                                                
                                                //hide submenus on exit
                                                $(this).mouseleave(function() {
                                                    $(this).find("ul").stop(true, true).slideUp();
                                                });
                                            }
                                        });
                                    })(jQuery);
                                </script>
                        </body>
                        </html>