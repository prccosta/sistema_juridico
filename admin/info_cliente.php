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
				$("#add2").click(function(){
					var input = '<div class="itens2">';
						input += '&nbsp;&nbsp;<label>DDD: <input type="text" name="ddd_aluno[]" size="2" class="CampoTextosemwidth" /></label>';
						input += '&nbsp;<label>Tel: <input type="text" name="tel_aluno[]" size="8" class="CampoTexto" /></label>';
						input += '&nbsp;<label>Tipo: <select id="tipo_aluno" name="tipo_aluno[]" class="CampoTexto"><option>-- Escolha o Tipo --</option><option value="Residencial">Residencial</option><option value="Trabalho">Trabalho</option><option value="Celular">Celular</option><option value="Recado">Recado</option><option value="Fax">Fax</option></select></label>';
						input += '<a href="#" class="del2">&nbsp;<img src="img/bt_del_campos.jpg" width="86" height="18"  class="valign"></a></label></div>';
						
						$("#campos2").append(input);
						return false;
				});
				
				$(".del2").live('click', function(){
					$(this).parent().remove();
				});
			});
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
                                Atualizar Cliente</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                    <table width="350" Class="TextoNormal">
                                    <form id="form1" action="sql_info_cliente.php" method="post" name="form1">					
                                    <?php

									$palavra = $_POST['id_cliente'];
                                    $sql=mysql_query("SELECT * FROM cliente WHERE id_cliente = '$palavra'") or die (mysql_error());
									$res=mysql_fetch_array($sql);
									
									echo "<tr>
                                        <td vAlign='top'>&nbsp;</td>
                                        <td vAlign='middle' align='left'>
                                            <table class='TextoNormal' width='100%'>
                                                <tr>
                                                    <td>Nome:
                                                    </td>
                                                    <td width='80%'>
													<input type='hidden' name='id_cliente' class='CampoTexto' value='".$res['id_cliente']."'>
													<input type='text' name='nome_cliente' class='CampoTexto' value='".$res['nome_cliente']."'></td>
                                                </tr>
												<tr>
                                                    <td>Nome Exibição:
                                                    </td>
                                                    <td width='80%'>
													<input type='text' name='nome_exib' class='CampoTexto' value='".$res['nome_exib']."'></td>
                                                </tr>
                                                <tr>
                                                    <td>CPF / CNPJ:
                                                    </td>
                                                    <td width='80%'><input type='text' name='cpf_cnpj' class='CampoTexto' value='".$res['cpf_cnpj']."'></td>
                                                </tr>
                                                <tr>
                                                    <td>Responsável:
                                                    </td>
                                                    <td width='80%'><input type='text' name='responsavel' class='CampoTexto' value='".$res['responsavel']."'></td>
                                                </tr>
                                                <tr>
                                                    <td>E-mail:
                                                    </td>
                                                    <td width='80%'><input type='text' name='email' class='CampoTexto' value='".$res['email']."'></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Endereço:
                                                    </td>
                                                    <td width='80%'><input type='text' name='endereco' class='CampoTexto' value='".$res['endereco']."'></td>
                                                </tr>
                                                <tr>
                                                    <td>Número:
                                                    </td>
                                                    <td width='80%'><input type='text' name='numero' class='CampoTexto' value='".$res['numero']."'></td>
                                                </tr>
                                                <tr>
                                                    <td>Complemento:
                                                    </td>
                                                    <td width='80%'><input type='text' name='complemento' class='CampoTexto' value='".$res['complemento']."'></td>
                                                </tr>
                                                <tr>
                                                    <td style='height: 26px'>Bairro:
                                                    </td>
                                                    <td width='80%' style='height: 26px'><input type='text' name='bairro' class='CampoTexto' value='".$res['bairro']."'></td>
                                                </tr>
                                                <tr>
                                                    <td>Cidade:
                                                    </td>
                                                    <td width='80%'><input type='text' name='cidade' class='CampoTexto' value='".$res['cidade']."'></td>
                                                </tr>
                                                <tr>
                                                    <td>UF:
                                                    </td>
                                                    <td width='80%'>
                                                    	<select id='uf' name='uf' class='CampoTexto'>
                                                            <option>".$res['uf']."</option>
                                                            <option value='AC'>AC</option>
                                                            <option value='AL'>AL</option>
                                                            <option value='AM'>AM</option>
                                                            <option value='AP'>AP</option>
                                                            <option value='BA'>BA</option>
                                                            <option value='CE'>CE</option>
                                                            <option value='DF'>DF</option>
                                                            <option value='ES'>ES</option>
                                                            <option value='GO'>GO</option>
                                                            <option value='MA'>MA</option>
                                                            <option value='MG'>MG</option>
                                                            <option value='MS'>MS</option>
                                                            <option value='MT'>MT</option>
                                                            <option value='PA'>PA</option>
                                                            <option value='PB'>PB</option>
                                                            <option value='PE'>PE</option>
                                                            <option value='PI'>PI</option>
                                                            <option value='PR'>PR</option>
                                                            <option value='RJ'>RJ</option>
                                                            <option value='RN'>RN</option>
                                                            <option value='RO'>RO</option>
                                                            <option value='RR'>RR</option>
                                                            <option value='RS'>RS</option>
                                                            <option value='SC'>SC</option>
                                                            <option value='SE'>SE</option>
                                                            <option value='SP'>SP</option>
                                                            <option value='TO'>TO</option>
                                                      </select></td>
                                                </tr>
                                                <tr>
                                                    <td height='20'>CEP:
                                                    </td>
                                                    <td width='80%' height='20'><input type='text' name='cep' class='CampoTexto' value='".$res['cep']."'></td>
                                                </tr>
												<tr><td><br></td>
												</tr>
												<tr><br>";
													$sql3=mysql_query("SELECT * FROM telefone_cliente WHERE id_cliente = '$palavra'") or die (mysql_error());
													$sql4=mysql_query("SELECT * FROM usuarios WHERE id_cliente = '$palavra'") or die (mysql_error());
													$res4=mysql_fetch_array($sql4);
													
													if (mysql_num_rows($sql3)){
													while($res3=mysql_fetch_array($sql3)){
                                                    $id_tel_cliente = $res3['id_tel_cliente'];
													echo "<table width='400' class='TextoNormal'>
													  <td width='92'>DDD:</td>
                                                      <td width='33'><nobr>
													  <input type='hidden' name='id_tel_cliente' class='CampoTexto' value='".$res3['id_tel_cliente']."'>
													  <input type='text' name='ddd_aluno[]' class='CampoTextosemwidth' MaxLength='2' Width='40px' value='".$res3['ddd']."' readonly></td>
                                                      <td >Tel:</td>
                                                      <td style='width: 103px'><nobr><input type='text' name='tel_aluno[]' class='CampoTexto' value='".$res3['telefone']."' readonly></td>
                                                      <td width='1'>Tipo:</td>
                                                      <td><input type='text' name='tipo_aluno[]' class='CampoTexto' value='".$res3['tipo_tel']."' readonly></td>
                                                                <td>
																<input type='button' class='Botao2' id='del_campos' onclick='document.form2.submit();' width='86' height='18'>
                                                                <br>
                                                               </td>
                                                            </tr>
															</table>";
															} }
                                                echo "<br><table><tr><td><input type='button' class='Botao3' id='add_campos' onclick='document.form3.submit();' width='86' height='18'><br></td></tr>
													<tr>
                                                    <td height='20'>Responsável:
                                                    </td>
                                                    <td width='80%' height='20'><input type='text' name='responsavel' class='CampoTexto' value='".$res['responsavel']."'></td>
                                                </tr>
												<tr>
                                                    <td height='20'>E-mail:
                                                    </td>
                                                    <td width='80%' height='20'><input type='text' name='email' class='CampoTexto' value='".$res['email']."'></td>
                                                </tr>
												<tr>
                                                    <td>Pessoa Física/Jurídica:
                                                    </td>
                                                    <td width='80%'>
                                                    	<select id='tipo_pessoa' name='tipo_pessoa' class='CampoTexto'>
                                                            <option value='".$res['tipo_pessoa']."'>".$res['tipo_pessoa']."</option>
                                                            <option value='Física'>Física</option>
                                                            <option value='Jurídica'>Jurídica</option>
                                                      </select></td>
                                                </tr>
												<tr>
                                                    <td height='20'>CPF / CNPJ:
                                                    </td>
                                                    <td width='80%' height='20'><input type='text' name='cpf_cnpj' class='CampoTexto' value='".$res['cpf_cnpj']."'></td>
                                                </tr>
												<tr>
                                                    <td height='20'>URL:
                                                    </td>
                                                    <td width='80%' height='20'><input type='text' name='url' class='CampoTexto' value='".$res['url']."'></td>
                                                </tr>
												<tr><td colspan='2'><br></td></tr>
												<tr><td colspan='2'><legend class='Literal'>Informações de Login</legend></td></tr>
												<tr><td></td></tr>
												<tr><td>Usuário: </td>
													<td><input type='text' name='usuario' class='CampoTexto' value='".$res4['usuario']."'></td></tr>
												<tr><td>E-mail: </td>
													<td><input type='text' name='email' class='CampoTexto' value='".$res4['email']."'></td></tr>
												<tr><td>Status: </td>
													<td><select id='status' name='status' class='CampoTexto'>
                                                            <option value='".$res4['ativo']."'>-- Selecione o status --</option>
                                                            <option value='1'>Ativo</option>
                                                            <option value='2'>Inativo</option>
                                                      </select></td></tr>
												<tr>
                                                   <td colSpan='2'>
                                                   <br><input type='submit' id='btSalvar' class='Botao' value=' Salvar '>
													</td>
                                                </tr>
                                            </form>
											</table></table></table>
											<form id='form3' action='add_tel_cliente.php' method='post' name='form3'>
                                   <input type='hidden' name='id_cliente' class='CampoTexto' value='".$palavra."'>
                                   </form>
                                   <form id='form2' action='sql_del_tel_cliente.php' method='post' name='form2'>
                                   <input type='hidden' name='id_tel_cliente' class='CampoTexto' value='".$id_tel_cliente."'>
                                   </form>";
											?>
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