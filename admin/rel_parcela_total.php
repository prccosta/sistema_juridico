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
                                Relatório de Total de Parcelas</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                  <legend class="Literal">Informações Gerais</legend>
                                    <table width="350" Class="TextoNormal" >
                                    <form id="form1" name="form1" action="" method="post">					
                                    <tr>
                                        <td colspan="2" vAlign="top" >
                                          </td>
                                      </tr>
                                    <table width="550" align="center">
                                    <TR class="TextoTopo" align="center">
                                                            <TD>Devedor</TD>
                                                            <TD>Total Parcelas</TD>
                                                            <TD>Total Devedor</TD>
                                                </TR>
                                                <?php
														$id_usuario = $_SESSION['UsuarioID'];
														$sql = mysql_query("SELECT * FROM usuarios where id = $id_usuario");
														$res = mysql_fetch_array($sql);
														$id_cliente = $res['id_cliente'];
														
														$sql_id_devedor = mysql_query("SELECT *
															from devedor where id_cli_cliente = $id_cliente order by id_devedor") or die(mysql_error());
														while($res_id_devedor = mysql_fetch_array($sql_id_devedor) ) {
														$res_id_devedor_temp = $res_id_devedor['id_devedor'];
														$res_nome_devedor_temp = $res_id_devedor['nome_dev'];
														
														/*$sql_parcela = mysql_query("SELECT distinct id_dev_devedor, nome_dev, vlparcela
															FROM parcela AS a
															LEFT JOIN devedor AS b ON a.id_dev_devedor = b.id_devedor
															WHERE id_dev_devedor = $res_id_devedor_temp order by id_dev_devedor");*/

														$sql_parcela = mysql_query("SELECT distinct id_dev_devedor, vlparcela, parcela_total
															FROM parcela
															WHERE id_dev_devedor = $res_id_devedor_temp order by id_dev_devedor") or die(mysql_error());
														
														while($res_parcela = mysql_fetch_array($sql_parcela) ) {
                                                        														
														(int)$soma_valor = $res_parcela['vlparcela'] * $res_parcela['parcela_total'];
														$inteiro = number_format($soma_valor, 2, ',', '.');
														
														$inteiro_temp = number_format($soma_valor, 2, '.', ',');
														(int)$soma_valor2 = $soma_valor2 + $inteiro_temp;
														$inteiro2 = number_format($soma_valor2, 2, ',', '.');
														
														echo "<tr align='center'>
															<td>".$res_nome_devedor_temp."</td>
															<td>".$res_parcela['parcela_total']."</td>
															<td>".$inteiro."</td>
															</tr>";
														}
														}
															echo "<tr><td colspan='3'><br></td></tr>
															<tr align='center'>
															<td colspan='2' align='right'><b>Total a Receber</b></td>
															<td colspan='1'><b>".$inteiro2."</b></td></tr>";
														
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
        </form>
</body>
</html>