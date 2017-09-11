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
                                Relat�rio de Clientes</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                  <legend class="Literal">Informa��es Gerais</legend>
                                    <table width="350" Class="TextoNormal" >
                                    
                                    <table width="100%" border="1">
                                    <TR class="TextoTopo" align="center">
                                                            <TD>Cliente</TD>
                                                            <TD>Cidade</TD> 
                                                            <TD>UF</TD>
                                                            <TD>Respons�vel</TD>
                                                            <TD>E-mail</TD>
                                                            <TD>URL</TD>
                                                </TR>
                                                <?php
														$_pagi_sql = "SELECT * 
														FROM cliente
														ORDER BY nome_cliente";
														
														$_pagi_sql2 = "SELECT count(id_cliente) as total FROM cliente";
														$_pagi_result2 = mysql_query($_pagi_sql2) or die (mysql_error());
														$res2=mysql_fetch_array($_pagi_result2);
														$total_cliente = $res2['total'];
														
														$_pagi_result = mysql_query($_pagi_sql) or die (mysql_error());
														if (mysql_num_rows($_pagi_result)){ 
														while($res=mysql_fetch_array($_pagi_result)){
														
							
														echo "<tr>
															<td>".$res['nome_dev']."</td>
															<td>".$res['cidade']."</td>
															<td align='center'>".$res['uf']."</td>
															<td align='center'>".$res['responsavel']."</td>
															<td align='center'>".$res['email']."</td>
															<td align='center'>".$res['url']."</td>
															</tr>";
															}
															}
															echo "<tr><td colspan='6'><br></td></tr>
															<tr align='center'>
															<td colspan='6' align='right'>
															<b>AT� O MOMENTO EXISTEM ".$total_cliente." CLIENTES.</b></td></tr>";
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