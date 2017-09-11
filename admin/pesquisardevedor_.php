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
<script language="javascript">
<!--
function fnSetaExcluir(peObj){
	
	if(peObj.checked){
		document.forms[0].hdExcluir.value += peObj.value + ',';
	}else{
		var vetChaves = document.forms[0].hdExcluir.value.split(',');
		document.forms[0].hdExcluir.value = '';

		for(i=0;i < vetChaves.length - 1; i++){
			if(vetChaves[i] != peObj.value){
				document.forms[0].hdExcluir.value += vetChaves[i] + ',';
			}
		}
	}
}
//-->
</script>
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
                                Pesquisar Devedor</td>
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
                                              <td>Código:</td>
                                              <td width="80%"><input id="id_devedor" name="id_devedor" Width="160px" class="CampoTexto"></td>
                                              </tr>
                                            <tr>
                                              <td width="50%">Nome:</td>
                                              <td width="80%"><input id="nome" name="nome" class="CampoTexto"></td>
                                              </tr>
                                            <tr>
                                              <td width="50%">
                                                Cliente:
                                                </td>
                                              <td width="80%">
                                                <select id="id_cliente" name="id_cliente" class="CampoTexto">
                                                 <option value="0">-- Selecione o cliente --</option>
                                                    <?php
                                                        $sql_id_cliente = mysql_query("SELECT a.id_cli_cliente, b.id_cliente, b.nome_exib 
																FROM devedor as a
																LEFT JOIN cliente as b ON a.id_cli_cliente = b.id_cliente
																ORDER BY b.nome_exib");
														 while($res_id_cliente=mysql_fetch_array($sql_id_cliente) ) {
                                                         echo '<option value="'.$res_id_cliente['id_cliente'].'">'.$res_id_cliente['nome_exib'].'</option>';
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
                                                            <TD>Editar</TD>
                                                            <TD>Código</TD> 
                                                            <TD>Nome</TD>
                                                            <TD>CPF</TD>
                                                            <TD>Responsável</TD>
                                                            <TD>CPF Responsável</TD>
                                                </TR>
                                                
                                                <?php
												
													if( $_SERVER['REQUEST_METHOD']=='POST' )  
														{  
														$where = Array();  
													  
														$id_devedor = getPost('id_devedor');  
														$nome = getPost('nome');  
														$id_cliente = getPost('id_cliente');  
													  
													  
														if( $id_devedor ){ $where[] = " `id_devedor` like '%$id_devedor%'"; }  
														if( $nome ){ $where[] = " `nome_dev` like '%$nome%'"; }  
														if( $id_cliente ){ $where[] = " `id_cli_cliente` like '%$id_cliente%'"; }  
													  
														$_pagi_sql = "SELECT * FROM devedor ";  
														if( sizeof( $where ) )  
															$_pagi_sql .= ' WHERE '.implode( ' AND ',$where );
														
														$_pagi_result = mysql_query($_pagi_sql) or die (mysql_error());
														if (mysql_num_rows($_pagi_result)){ 
														
														while($res=mysql_fetch_array($_pagi_result)){
							
														echo "<form name='form1' method='post' action='info_devedor.php'><tr align='center'>
															<td><input type=image src='img/bt_editar.jpg' width='70' height='18'>
															<input name='id_devedor' type='hidden' id='id_devedor' value='".$res['id_devedor']."'>
															</form></td>
															<td><input name='id_devedor' type='text' id='id_devedor' class='CampoPesquisa' readonly value='".$res['id_devedor']."'></td>
															<td><input name='nome' type='text' id='nome' class='CampoPesquisa' readonly size='50' value='".$res['nome_dev']."'></td>
															<td><input name='cpf' type='text' id='cpf' class='CampoPesquisa' readonly value='".$res['cpf']."'></td>
															<td><input name='responsavel' type='text' id='responsavel' class='CampoPesquisa' readonly size='50' value='".$res['responsavel']."'></td>
															<td><input name='cpf_responsavel' type='text' id='cpf_responsavel' class='CampoPesquisa' readonly value='".$res['cpf_responsavel']."'></td>
															<td>";
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
        </form>
</body>
</html>