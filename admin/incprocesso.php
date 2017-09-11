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
    <!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body leftmargin="0" topmargin="0" class="no-js">
		<script>
			var el = document.getElementsByTagName("body")[0];
			el.className = "";
		</script>
        <script src="js/jquery.js"></script>
		<script type="text/javascript">
   
      $(document).ready(function(){
        // Evento change no campo escolas  
         $("select[name=escolas]").change(function(){
            // Exibimos no campo devedor antes de concluirmos
			$("select[name=devedor]").html('<option value="">Carregando...</option>');
            // Exibimos no campo devedor antes de selecionamos a devedor, serve também em caso
			// do usuario ja ter selecionado o escolas e resolveu trocar, com isso limpamos a
			// seleção antiga caso tenha feito.
			$("select[name=aluno_devedor]").html('<option value="">Aguardando devedor...</option>');
			// Passando tipo por parametro para a pagina ajax-devedor.php
            $.post("c_devedor.php",
                  {escolas:$(this).val()},
                  // Carregamos o resultado acima para o campo devedor
				  function(valor){
                     $("select[name=devedor]").html(valor);
                  }
                  )
         })
     	// Evento change no campo devedor 
	 	$("select[name=devedor]").change(function(){
            // Exibimos no campo aluno_devedor antes de concluirmos
			$("select[name=aluno_devedor]").html('<option value="">Carregando...</option>');
            // Passando devedor por parametro para a pagina ajax-aluno_devedor.php
            $.post("c_aluno_devedor.php",
                  {devedor:$(this).val()},
                  // Carregamos o resultado acima para o campo aluno_devedor
				  function(valor){
                     $("select[name=aluno_devedor]").html(valor);
                  }
                  )
            
         })
	 
	  })
      
</script>
        <noscript>
        	<!--[if IE]>
            	<link rel="stylesheet" href="css/ie.css">
            <![endif]-->
        </noscript>
    <form id="form1" action="sql_incprocesso.php" method="post" name="form1">
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
        <td class="TextoTopo">Incluir Débito</td>
    </tr>
    <tr>
        <td>
            <fieldset class="Literal">
                <legend class="Literal">Informações Gerais</legend>
                <table width="500" Class="TextoNormal" >
			        <tr>
				        <td width="130">Processo:</td>
				        <td width="358"><input id="processo" name="processo" class="CampoTexto" MaxLength="50"></td>
			        </tr>
			        <tr>
				        <td height="23"><label for="vara">Vara:</label>
				        </td>
                        <td>
					       <select id="vara" name="vara" class="CampoTexto">
					         <option value="0">-- Selecione a vara --</option>
                             	<?php
									$sql = "SELECT id_vara, nome_vara FROM vara ORDER BY nome_vara";
									$res = mysql_query( $sql );
									while ( $row = mysql_fetch_assoc( $res ) ) {
										echo '<option value="'.$row['id_vara'].'">'.$row['nome_vara'].'</option>';
									}
								?>
                           </select> 
                        </td>
			        </tr>
			        <tr>
				        <td >Objeto da Ação:
				        </td>
				        <td><textarea cols="70" rows="5" class="CampoTexto" id="objetoacao" name="objetoacao"></textarea></td>
			        </tr>
			        <tr>
				        <td >Valor da Causa: R$
				        </td>
				        <td><input type="text" id="valorescausa" name="valorescausa" class="CampoTexto" onkeyup="numMoeda2(event,this);"></td>
			        </tr>
                </table>
                <br />
			    </fieldset>
			    <fieldset class="Literal">
                <legend class="Literal">Cliente</legend>
                <table Class="TextoNormal" >
			        <tr>
				        <td><label for="escolas">Colégio Vinculado:</label></td>
				        <td>
					       <select name="escolas" id="escolas" class="CampoTexto">
					         <option value=""></option>
                             	<?php
									$sql = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY nome_cliente";
									$res = mysql_query( $sql );
									while ( $row = mysql_fetch_assoc( $res ) ) {
										echo '<option value="'.$row['id_cliente'].'">'.$row['nome_cliente'].'</option>';
									}
								?>
                           </select> 
                        </td>
                    </tr>
                </table>
                <br />
                </fieldset>
			    <fieldset class="Literal">
                <legend class="Literal">Devedor e Alunos</legend>
			        <table Class="TextoNormal" >
			        <tr>
				        <td>Devedor:
                            <select name="devedor" id="devedor" class="CampoTexto">
                                <option value="0" selected="selected">Aguardando escola...</option>
                            </select>
                        </td>
			        </tr>
			        <tr>
				        <td>Aluno(s):
                            <select name="aluno_devedor" id="aluno_devedor" class="CampoTexto">
                                <option value="0" selected="selected">Escolha um Devedor primeiro</option>
                            </select>
                        <br></td>
			        </tr>
                </table>
                <br />
			    </fieldset>
			    <fieldset class="Literal">
                <legend class="Literal">Outras Informações</legend>
			        <table width="800" Class="TextoNormal" >
                    <tr>
				        <td width="150">Acordo(s):
				        </td>
				        <td>
                        <select name="tipoacordo" id="tipoacordo" class="CampoTexto">
                          <option value="0">-- Escolha um acordo --</option>
                          <?php
									$sql_tacordo = "SELECT id_tipo_acordo, nome_tipo_acordo FROM tipo_acordo ORDER BY nome_tipo_acordo";
									$res_tacordo = mysql_query( $sql_tacordo );
									while ( $row_tacordo = mysql_fetch_assoc( $res_tacordo ) ) {
										echo '<option value="'.$row_tacordo['id_tipo_acordo'].'">'.$row_tacordo['nome_tipo_acordo'].'</option>';
									}
								?>
                          
                          
                          <option value="Judicial">Judicial</option>
                          <option value="Extrajudicial">Extrajudicial</option>
                          <option value="D&eacute;bito">D&eacute;bito</option>
                        </select>
                      </td>
			        </tr>
			        <tr>
				        <td width="150">Acordo(s):
				        </td>
				        <td height="25"><input id="acordo" name="acordo" class="CampoTexto"></td>
			        </tr>
			        <tr>
				        <td width="160">Acordo(s) Referentes(s) a:
				        </td>
				        <td height="25"><input id="acordoreferente" name="acordoreferente" class="CampoTexto"></td>
			        </tr>
			        <tr>
				        <td width="160">Valor do Acordo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R$
				        </td>
				        <td height="25"><input id="vlacordo" name="vlacordo" class="CampoTexto" onkeyup="numMoeda2(event,this);">
                            
                        </td>
			        </tr>
			        <tr>
				        <td width="170">Valor Original do Débito: R$</td>
				        <td><input type="text" id="vloriginal" name="vloriginal" class="CampoTexto" onkeyup="numMoeda2(event,this);"></td>
			        </tr>
			        <tr>
				        <td width="150">Número de Parcelas:</td>
				        <td><input type="text" id="parcelas" name="parcelas" class="CampoTexto"></td>
			        </tr>
                    <tr>
				        <td width="150">Primeira Parcela:</td>
				        <td><input type="text" id="primparcela" name="primparcela" class="CampoTexto" onkeyup="numMoeda2(event,this);"></td>
			        </tr>
                    <tr>
				        <td width="150">Data de Vencimento:</td>
				        <td><input type="text" id="venc" name="venc" class="CampoTexto" onkeyup="FormataData(this,event)" maxlength="10"></td>
			        </tr>
			        <tr>
				        <td width="150">Observação:</td>
				        <td><textarea rows="5" class="CampoTexto" id="obsevacao" name="observacao"></textarea></td>
			        </tr>
			        <tr>
				        <td colSpan="4">
					        <INPUT name="btIncluir" type="submit" class="Botao" id="btIncluir" value=" Salvar ">&nbsp;
			          		<INPUT name="btLimpar" type="reset" class="Botao" id="btLimpar" value=" Limpar "></td>
			        </tr>
                </table>
             </fieldset>
        </td>
    </tr>
</table>
			</fieldset>
       
    </form>
    
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