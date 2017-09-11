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
<style type="text/css">
<!--
.pgoff {font-family: Verdana, Arial, Helvetica; font-size: 11px; color: #FF0000; text-decoration: none}
a.pg {font-family: Verdana, Arial, Helvetica; font-size: 11px; color: #003366; text-decoration: none}
a:hover.pg {font-family: Verdana, Arial, Helvetica; font-size: 11px; color: #0066cc; text-decoration:underline}
-->
</style>
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
                                Pesquisar Cliente</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informa��es Gerais</legend>
                                    <table width="350" Class="TextoNormal">
                                    <form id="form1" name="form1" action="" method="post">
                                    <tr>
                                        <td vAlign="top">&nbsp;</td>
                                        <td vAlign="middle" align="left">
                                            <table class="TextoNormal" width="100%">
                                                <tr>
                                                    <td>Nome:
                                                    </td>
                                                    <td width="80%"><input type="text" id="nome" name="nome" class="CampoTexto"></td>
                                                </tr>
                                                <tr>
                                                    <td>F&iacute;sica/Jur&iacute;dica:
                                                    </td>
                                                    <td width="80%"><select name="tipopessoa" id="tipopessoa" class="CampoTexto">
                                                                  <option value="0">-- Escolha o Tipo --</option>
                                                                  <option value="F�sica">F�sica</option>
                                                                  <option value="Jur�dica">Jur�dica</option>
                                                              </select></td>
                                                </tr>
                                                <tr>
                                                    <td>Respons�vel:
                                                    </td>
                                                    <td width="80%"><input type="text" id="responsavel" name="responsavel" class="CampoTexto"></td>
                                                </tr>
                                                <tr>
                                                    <td style="height: 20px">
                                                        <input type="submit" id="btSalvar" class="Botao" value=" Pesquisar "></td>
                                                </tr>
                                                </form>
                                            	</table>
                                    			</tr>
                                                <table width="100%">
                                    <TR class="TextoTopo" align="center">
                                                            <TD>Editar</TD>
                                                            <TD>C�digo</TD> 
                                                            <TD>Nome</TD>
                                                            <TD>CPF / CNPJ</TD>
                                                            <TD>Respons�vel</TD>
                                                            <TD>E-mail</TD>
                                                </TR>
                                                
                                                <?php
												
													if( $_SERVER['REQUEST_METHOD']=='POST' )  
														{  
														$where = Array();  
													  
														$nome = getPost('nome');  
														$tipopessoa = getPost('tipopessoa');  
														$responsavel = getPost('responsavel');  
													  
													  
														if( $nome ){ $where[] = " `nome_cliente` like '%$nome%'"; }  
														if( $tipopessoa ){ $where[] = " `tipo_pessoa` = '$tipopessoa'"; }  
														if( $responsavel ){ $where[] = " `responsavel` like '%$responsavel%'"; }  
													  
										$_pagi_sql = "SELECT * FROM cliente";  
										if( sizeof( $where ) )
											$_pagi_sql .= ' WHERE '.implode( ' AND ',$where );
													  
										$_pagi_result = mysql_query($_pagi_sql) or die (mysql_error());
										if (mysql_num_rows($_pagi_result)){ 
										
											//quantidade de resultados por p�gina (opcional, por padr�o 20)
											$_pagi_cuantos = 20;
											
											//quantidade de links na barra de navega��o
											$_pagi_nav_num_enlaces = 15;
											
											$_pagi_nav_anterior  = "<";
											$_pagi_nav_siguiente = ">";
											$_pagi_nav_primera   = "Primeira";
											$_pagi_nav_ultima    = "�ltima";
											$_pagi_separador     = " ";
											
											//Inclu�mos o script de pagina��o. Este j� executa a consulta automaticamente
											require("includes/paginator.inc.php");				
														
										while($res=mysql_fetch_array($_pagi_result)){
							
										echo "<form name='form1' method='post' action='info_cliente.php'><tr align='center'>
											<td><input type=image src='img/bt_editar.jpg' width='70' height='18'>
											<input name='id_cliente' type='hidden' id='id_cliente' value='".$res['id_cliente']."'>
											</form></td>
											<td><input name='id_cliente' type='text' id='id_cliente' class='CampoPesquisa' size='15' readonly value='".$res['id_cliente']."'></td>
											<td><input name='nome' type='text' id='nome' class='CampoPesquisa' readonly size='50' value='".$res['nome_cliente']."'></td>
											<td><input name='cpf' type='text' id='cpf' class='CampoPesquisa' readonly value='".$res['cpf_cnpj']."'></td>
											<td><input name='responsavel' type='text' id='responsavel' class='CampoPesquisa' readonly size='50' value='".$res['responsavel']."'></td>
											<td><input name='cpf_responsavel' type='text' id='cpf_responsavel' class='CampoPesquisa' size='50' readonly value='".$res['email']."'></td>
											<td></tr>";
											}
											}
											}
											echo "<tr><td colspan='6'>".$_pagi_navegacion."</td></tr>";
											
											//a cargo do leitor melhorar o filtro anti injection  
											function filter( $str ){  
												return addslashes( $str );  
											}  
											function getPost( $key ){  
												return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;  
											}
														?>
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