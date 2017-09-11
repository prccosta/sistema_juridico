<?php

require_once("includes/conexao.php");

//$user_id = $_SESSION['user_id'];

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

/**
* Função para salvar mensagens de LOG no MySQL
*
* @param string $mensagem - A mensagem a ser salva
*
* @return bool - Se a mensagem foi salva ou não (true/false)
*/
function salvaLog($mensagem) {
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$usuario = $_SESSION['UsuarioLogin']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)

// Usamos o mysql_escape_string() para poder inserir a mensagem no banco
//&nbsp;&nbsp; sem ter problemas com aspas e outros caracteres
$mensagem = mysql_escape_string($mensagem);

require_once("includes/conexao.php");

// Monta a query para inserir o log no sistema
$sql_log = "INSERT INTO `logs` VALUES (NULL, '".$hora."', '".$ip."', '".$usuario."', '".$mensagem."')";

if (mysql_query($sql_log)) {
return true;
} else {
return false;
}
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
                                Pesquisar Débito</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                  <legend class="Literal">Informações Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >
                                    <form id="form1" name="form1" action="" method="post">					
                                    <tr>
                                        <td colspan="2" vAlign="top" >
                                          <table Class="TextoNormal" width="350">
                                            <tr>
                                              <td>Número:</td>
                                              <td width="80%"><input id="processo" name="processo" class="CampoTexto"></td>
                                            </tr>
                                            <tr>
                                              <td width="50%">Colégio Vinculado:</td>
                                              <td width="80%">
                                              <select id="escolas" name="escolas" class="CampoTexto">
                                                 <option value="0">-- Selecione --</option>
                                                    <?php
                                                        $sql_escolas = mysql_query("SELECT id_cliente, nome_exib FROM cliente ORDER BY nome_exib");
														 while($res_escolas=mysql_fetch_array($sql_escolas) ) {
                                                         echo '<option value="'.$res_escolas['id_cliente'].'">'.$res_escolas['nome_exib'].'</option>';
                                                        }
                                                    ?>
                                            </select>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td width="93">
                                                Devedor:
                                              </td>
                                              <td width="75%">
                                                <select id="devedor" name="devedor" class="CampoTexto" >
                                                 <option value="0">-- Selecione --</option>
                                                    <?php
                                                        $sql_devedor = mysql_query("SELECT * FROM devedor ORDER BY nome_dev");
														 while($res_devedor=mysql_fetch_array($sql_devedor) ) {
														 echo '<option value="'.$res_devedor['id_devedor'].'">'.$res_devedor['nome_dev'].'</option>';
                                                        }
                                                    ?>
                                            </select>
                                            </td>
                                            </tr>
                                            <tr>
                                              <td style="height: 20px"><br><input type="submit" id="btPesquisar" class="Botao" value=" Pesquisar "></td>
                                            </form>
                                            </tr>
                                            
                                          </table>                                        </td>
                                      </tr>
                                    <TR class="TextoTopo" align="center">
                                                            <TD>Editar</TD>
                                                            <TD>Código | Número</TD> 
                                                            <TD>Cliente</TD>
                                                            <TD>Devedor</TD>
                                                            <TD>Status</TD>
                                                            <TD>Andamento</TD>
                                                            <TD>Excluir</TD> 
                                      </TR>
                                                <?php
												
									if( $_SERVER['REQUEST_METHOD']=='POST' )  
										{  
									$where = Array();  
													  
									$processo = getPost('processo');  
									$escolas = getPost('escolas');
									$devedor = getPost('devedor');
									
											if( $processo ){ $where[] = " `processo` like '%$processo%'"; }  
											if( $escolas ){ $where[] = " `escolas` like '%$escolas%'"; }  
											if( $devedor ){ $where[] = " `devedor` like '%$devedor%'"; }  
													  
														$sql = "SELECT * FROM processo ";  
														if( sizeof( $where ) )  
															$sql .= ' WHERE '.implode( ' AND ',$where );  
													  
														$sql_query = mysql_query($sql) or die (mysql_error());
														if (mysql_num_rows($sql_query)){ 
														while($res=mysql_fetch_array($sql_query)){
							
														$devedor = $res['devedor'];
														$sql2=mysql_query("SELECT * FROM devedor WHERE id_devedor = $devedor");
														$res2=mysql_fetch_array($sql2);
														
														$status = $res['status'];
														$sql3=mysql_query("SELECT * FROM status WHERE id_status = $status");
														$res3=mysql_fetch_array($sql3);
														
														$cliente = $res['escolas'];
														$sql4=mysql_query("SELECT * FROM cliente WHERE id_cliente = $cliente");
														$res4=mysql_fetch_array($sql4);
														
														echo "<form name='form1' method='post' action='info_processo.php'><tr align='center'>
															<td><input type='image' src='img/bt_editar.jpg' width='70' height='18'>
															<input name='id_processo' type='hidden' id='id_processo' value='".$res['id_processo']."'>
															</form></td>
															<td><input name='nome' type='text' id='nome' class='CampoPesquisa' size='20' readonly value='".$res['id_processo']." | ".$res['processo']."'></td>
															<td><input name='nome_exib' type='text' id='nome_exib' class='CampoPesquisa' readonly size='40' value='".$res4['nome_exib']."'></td>
															<td><input name='nome_dev' type='text' id='nome_dev' class='CampoPesquisa' readonly size='40' value='".$res2['nome_dev']."'></td>
															<td><input name='nome_st_processo' type='text' id='nome_st_processo' class='CampoPesquisa' readonly value='".$res3['nome_st_processo']."'></td>
															<td>
															<form name='form1' method='post' action='rel_processo.php'>
															<input name='id_processo' type='hidden' id='id_processo' value='".$res['id_processo']."'>
															<input type=image src='img/bt_andamento.jpg' width='85' height='18'></form></td>
															<form name='form1' method='post' action='exclui_processo.php'>
															<input name='id_processo' type='hidden' id='id_processo' value='".$res['id_processo']."'>
															<td><input type=image src='img/bt_deletar.jpg' width='70' height='18'></td>
														</tr></form>";
															}
															}
									
															}  
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
        <?php

		$mensagem= "Tela de Pesquisa de Processo";
		salvaLog($mensagem);
		
		?>
              </body>
</html>
