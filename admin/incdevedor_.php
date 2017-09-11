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
    <script src="js/formulas.js" type="text/javascript"></script>
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
						input += '&nbsp;&nbsp;<label>Matrícula: <input type="text" name="matricula_aluno[]" size="5" class="CampoTexto" /></label>';
						input += '&nbsp;<label>Nome: <input type="text" name="nome_aluno[]" size="60" class="CampoTexto" /></label>';
						input += '<a href="#" class="del">&nbsp;<img src="img/bt_del_campos.jpg" width="86" height="18"  class="valign"></a></label></div>';
						
						$("#campos").append(input);
						return false;
				});
				
				$(".del").live('click', function(){
					$(this).parent().remove();
				});
			});
			
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
    <form id="form1" action="sql_incdevedor.php" method="post" name="form1">
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
                                Incluir Devedor</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >					
                                    <tr>
                                        <td vAlign="top">&nbsp;</td>
                                        <td vAlign="middle" align="left">
                                            <table class="TextoNormal" width="100%">
                                               <tr>
                                                    <td>Colégio Vinculado:
                                                    </td>
                                                    <td width="80%">
                                                    <select name="escolas" id="escolas" class="CampoTexto">
                                                         <option value=""></option>
                                                            <?php 
                                                                $sql = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY id_cliente";
                                                                $res = mysql_query( $sql );
                                                                while ( $row = mysql_fetch_assoc( $res ) ) {
																	echo '<option value="'.$row['id_cliente'].'">'.$row['id_cliente']." - ".$row['nome_cliente'].'</option>';
                                                                }
                                                           ?>
                                                    </select></td>
                                                </tr>
                                                <tr>
                                                    <td>Nome:
                                                    </td>
                                                    <td width="80%"><input type="text" name="nome" class="CampoTexto" MaxLength="50" Width="200px"></td>
                                                </tr>
                                                <tr>
                                                    <td>CPF:
                                                    </td>
                                                    <td width="80%"><input type="text" name="cpf" class="CampoTexto" MaxLength="20"></td>
                                                </tr>
                                                <tr>
                                                    <td>Responsável:
                                                    </td>
                                                    <td width="80%"><input type="text" name="responsavel" class="CampoTexto" MaxLength="50" Width="200px"></td>
                                                </tr>
                                                <tr>
                                                    <td>CPF Responsável:
                                                    </td>
                                                    <td width="80%"><input type="text" name="cpf_responsavel" class="CampoTexto" MaxLength="20"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Endereço:
                                                    </td>
                                                    <td width="80%"><input type="text" name="endereco" class="CampoTexto" MaxLength="50" Width="200px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Número:
                                                    </td>
                                                    <td width="80%"><input type="text" name="numero" class="CampoTexto" MaxLength="20" Width="50px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Complemento:
                                                    </td>
                                                    <td width="80%"><input type="text" name="complemento" class="CampoTexto" MaxLength="50" Width="100px"></td>
                                                </tr>
                                                <tr>
                                                    <td style="height: 26px">Bairro:
                                                    </td>
                                                    <td width="80%" style="height: 26px"><input type="text" name="bairro" class="CampoTexto" MaxLength="100" Width="200px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Cidade:
                                                    </td>
                                                    <td width="80%"><input type="text" name="cidade" class="CampoTexto" MaxLength="50" Width="200px"></td>
                                                </tr>
                                                <tr>
                                                    <td>UF:
                                                    </td>
                                                    <td width="80%">
                                                    	<select id="uf" name="uf" class="CampoTexto">
                                                            <option>-- Escolha o Estado --</option>
                                                            <option value="AC">AC</option>
                                                            <option value="AL">AL</option>
                                                            <option value="AM">AM</option>
                                                            <option value="AP">AP</option>
                                                            <option value="BA">BA</option>
                                                            <option value="CE">CE</option>
                                                            <option value="DF">DF</option>
                                                            <option value="ES">ES</option>
                                                            <option value="GO">GO</option>
                                                            <option value="MA">MA</option>
                                                            <option value="MG">MG</option>
                                                            <option value="MS">MS</option>
                                                            <option value="MT">MT</option>
                                                            <option value="PA">PA</option>
                                                            <option value="PB">PB</option>
                                                            <option value="PE">PE</option>
                                                            <option value="PI">PI</option>
                                                            <option value="PR">PR</option>
                                                            <option value="RJ">RJ</option>
                                                            <option value="RN">RN</option>
                                                            <option value="RO">RO</option>
                                                            <option value="RR">RR</option>
                                                            <option value="RS">RS</option>
                                                            <option value="SC">SC</option>
                                                            <option value="SE">SE</option>
                                                            <option value="SP">SP</option>
                                                            <option value="TO">TO</option>
                                                      </select></td>
                                                </tr>
                                                <tr>
                                                    <td height="20">CEP:
                                                    </td>
                                                    <td width="80%" height="20"><input type="text" name="cep" class="CampoTexto" MaxLength="9" Width="80px" onkeyup="FormataCep(this,event)"></td>
                                                </tr>
                                                <tr>
                                                    <td>Aluno:
                                                    </td>
                                                    <td width="80%">
                                                        
                                                        <br />
                                                        <table class="TextoNormal" width="400">
                                                            <tr>
                                                                <td>Matrícula:</td>
                                                                <td><label><input type="text" name="matricula_aluno[]" size="5" class="CampoTexto" /></label></td>
                                                                <td>Nome:</td>
                                                                <td><label><input type="text" name="nome_aluno[]" size="60" class="CampoTexto" /></label><br></td>
                                                                <td valign="bottom">
                                                                <a href="#" id="add"><img src="img/bt_add_campos.jpg" width="86" height="18"></a><br></td>
                                                            </tr>
                                                        </table>
                                                            <div id="campos"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Telefone:</td>
                                                    <td width="80%">
                                                        &nbsp;
                                                        <table width="400" class="TextoNormal">
                                                            <tr>
                                                                <td width="92">DDD:</td>
                                                                <td width="33"><nobr><input type="text" name="ddd_aluno[]" class="CampoTextosemwidth" MaxLength="2" Width="40px"></td>
                                                                <td >Tel:</td>
                                                                <td style="width: 103px"><nobr><input type="text" name="tel_aluno[]" class="CampoTexto"></td>
                                                                <td width="1">Tipo:</td>
                                                                <td ><select id="tipo_aluno" name="tipo_aluno[]" class="CampoTexto">
                                                                  <option>-- Escolha o Tipo --</option>
                                                                  <option value="Residencial">Residencial</option>
                                                                  <option value="Trabalho">Trabalho</option>
                                                                  <option value="Celular">Celular</option>
                                                                  <option value="Recado">Recado</option>
                                                                  <option value="Recado">Fax</option>
                                                              </select></td>
                                                                <td>
                                                               <a href="#" id="add2"><img src="img/bt_add_campos.jpg" width="86" height="18"></a><br>
                                                               </td>
                                                            </tr>
                                                        </table>
                                                        <div id="campos2"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colSpan="2">&nbsp;
                                                        <input type="submit" id="btSalvar" class="Botao" value="Salvar" ValidationGroup="Devedor">&nbsp;
                                                        <input name="btLimpar" type="reset" class="Botao" id="btLimpar" value="Limpar"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                </fieldset>
                            </td>
                            </tr>   
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