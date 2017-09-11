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
                                Relatório de Parcelas</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                  <legend class="Literal">Informações Gerais</legend>
                                    <table width="350" Class="TextoNormal" >
                                    <form id="form1" name="form1" action="" method="post">					
                                    <tr>
                                        <td colspan="2" vAlign="top" >
                                          <table Class="TextoNormal" width="100%">
                                            <tr>
                                              <td width="50%">
                                                Devedor:
                                                </td>
                                              <td width="80%">
                                                <select id="id_devedor" name="id_devedor" class="CampoTexto">
                                                 <option value="0">-- Selecione o devedor --</option>
                                                    <?php
                                                        $id_usuario = $_SESSION['UsuarioID'];
														$sql = mysql_query("SELECT * FROM usuarios where id = $id_usuario");
														$res = mysql_fetch_array($sql);
														$id_cliente = $res['id_cliente'];
														
														$sql_id_devedor = mysql_query("SELECT id_devedor, nome_dev
															from devedor order by id_devedor");
														 while($res_id_devedor = mysql_fetch_array($sql_id_devedor) ) {
                                                         echo '<option value="'.$res_id_devedor['id_devedor'].'">'.$res_id_devedor['id_devedor']." | ".$res_id_devedor['nome_dev'].'</option>';
                                                        }
                                                    ?>
                                            </select></td>
                                              </tr>
                                            <tr>
                                              <td style="height: 20px"><br><input type="submit" id="btPesquisar" class="Botao" value=" Pesquisar "></td>
                                              </tr>
                                            
                                            </form>
                                            </table>
                                      </tr>
                                    <table width="100%">
                                    <TR class="TextoTopo" align="center">
                                                            <TD>Devedor</TD>
                                                            <TD>Código | Processo</TD> 
                                                            <TD>Parcela Atual</TD>
                                                            <TD>Tipo Pagamento</TD>
                                                            <TD>Valor</TD>
                                                            <TD>Vencimento</TD>
                                                </TR>
                                                <?php
												
							if( $_SERVER['REQUEST_METHOD']=='POST' )  
								{  
							$where = Array();  
										  
							$id_devedor = getPost('id_devedor');  
											  
							if( $id_devedor ){ $where[] = " `devedor` = '$id_devedor'"; }
							$where[] = " `id_processo` = `id_proc_processo`"; 
													  
							$_pagi_sql = "SELECT *
							FROM processo as a
							LEFT JOIN parcela as b ON a.id_processo = b.id_proc_processo
							LEFT JOIN devedor as c ON a.devedor = c.id_devedor
							LEFT JOIN tipo_pagamento as d ON b.id_tipo_pagamento = d.id_pagamento";
							if( sizeof( $where ) )  
									$_pagi_sql .= ' WHERE '.implode( ' AND ',$where );
									$_pagi_sql .= ' ORDER BY parcela_atual, id_parcela ASC';
														
									$_pagi_result = mysql_query($_pagi_sql) or die (mysql_error());
									if (mysql_num_rows($_pagi_result)){ 
									while($res2=mysql_fetch_array($_pagi_result)){
							
									echo "<tr align='center'>
										<td>".$res2['nome_dev']."</td>
										<td>".$res2['id_processo']." | ".$res2['processo']."</td>
										<td>".$res2['parcela_atual']."</td>
										<td>".$res2['nome_pag']."</td>
										<td>".number_format($res2['vlparcela'], 2, ',', '.')."</td>
										<td>".date_format(new DateTime($res2['dtvenc']), "d/m/Y")."</td>
										</tr>";
										(int)$soma_valor = $soma_valor + $res2['vlparcela'];
										$inteiro = number_format($soma_valor, 2, ',', '.');
										}
										}
										}
										echo "<tr><td colspan='6'><br></td></tr>
											<tr align='center'><td colspan='2'></td>
											<td colspan='3' align='right'><b>Total a Receber</b></td>
											<td colspan='1'><b>".$inteiro."</b></td></tr>";
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