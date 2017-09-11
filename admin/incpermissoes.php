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
		</script>
        <noscript>
        	<!--[if IE]>
            	<link rel="stylesheet" href="css/ie.css">
            <![endif]-->
        </noscript>
    <form id="form1" action="sql_incpermissoes.php" method="post" name="form1">
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
                    <table width="100%" class="Borda1N" id="TABLE2" background="img/fundo.jpg">
                        <tr>
                            <td class="TextoTopo">
                                Incluir Permiss�es</td>
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
                                                    <td class="TextoNormal">Nome:</td>
                                                    <td width="90%">
                                                    	<select name="status" id="status" class="CampoTexto">
                                            				<option>-- Escolha o Nome --</option>
																<?php
                                                                    $sql = "SELECT id, nome FROM usuarios ORDER BY nome";
                                                                    $res = mysql_query( $sql );
                                                                    while ( $row = mysql_fetch_assoc( $res ) ) {
                                                                        echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                                                                    }
                                                                ?>
			                                            </select></td>
                                                </tr>
                                                <tr>
                                                    <td class="TextoNormal">Permiss�o:</td>
                                                    <td width="90%">
                                                    	<select name="permissao" id="permissao" class="CampoTexto">
                                            				<option>-- Escolha a Permiss�o --</option>
                                                            <option value="1">1- Clientes</option>
                                                            <option value="2">2- Estagi�rios</option>
                                                            <option value="3">3- Advogados</option>
                                                            <option value="4">4- Administradores</option>
			                                            </select></td>
                                                </tr>
                                                <tr>
                                                    <td colSpan="2" height="30">&nbsp;
                                                        <input type="submit" id="btincluir" class="Botao" value=" Salvar "></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" colSpan="2"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                            </td>
                            </tr>
                        </table>
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