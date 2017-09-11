<?php
require_once('includes/conexao.php');

// A sessao precisa ser iniciada em cada pagina diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;

// Verifica se nao ha a variavel da sessao que identifica o usuario
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destroi a sessao por seguranca
	session_destroy();
	// Redireciona o visitante de volta pro login
	header('Location: ../acesso_sistema.php'); exit;
}

/**
* Funcao para salvar mensagens de LOG no MySQL
*
* @param string $mensagem - A mensagem a ser salva
*
* @return bool - Se a mensagem foi salva ou nao (true/false)
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
<html lang='pt-br'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
    <title>Canut e Oliveira Lima Advogados Associados</title>
    <link href='css/Style.css' rel='stylesheet' type='text/css'>
    <link href='css/admin_styles.css' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='css/nav.css'>
	<script src='js/jquery.js'></script>
	<script src="js/formulas.js" type="text/javascript"></script>
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

    <!--[if IE]>
			<script src='http://html5shiv.googlecode.com/svn/trunk/html5.js'></script>
	<![endif]-->
</head>
<body leftmargin='0' topmargin='0' class='no-js' onLoad="numMoeda2(event,valorescausa);numMoeda2(event,vloriginal);numMoeda2(event,vlacordo);">
		<script>
			var el = document.getElementsByTagName('body')[0];
			el.className = '';
		</script>
        <script type="text/javascript">
			$(document).ready(function(){
				$("select[name=devedor]").change(function(){
					$("select[name=aluno_devedor]").html('<option value="0">Carregando...</option>');
					
					$.post("c_aluno_devedor.php",
						{devedor:$(this).val()},
						function(valor){
							$("select[name=aluno_devedor]").html(valor);
						}
						)
				})
			})
		</script>
        <noscript>
        	<!--[if IE]>
            	<link rel='stylesheet' href='css/ie.css'>
            <![endif]-->
        </noscript>
    <form id='form1' action='sql_info_processo.php' method='post' name='form1'>
    <table width='100%' height='100%'  cellpadding='0'  cellspacing='0'  border='0'>
		<tr>
			<td background='img/fundo_admin.jpg' align='center' >
				<table width='100' cellpadding='0'  cellspacing='0' >
					<tr>
						<td width='150' >&nbsp;</td>
						<td width='800'>
		                    	<table  bgcolor='#B2B2B2' cellpadding='0'  cellspacing='0' width='100%'>
										<tr>
											<td height='79' valign='top' align='center'>
												<img src='img/logo.jpg'>
											</td>
										</tr>
										<tr>
											<td height='31' align='center'>
												<table height='31' background='img/Linhas.jpg' width='800'>
													<tr>
														<td width='150'>
														<?php include_once('menu.php'); ?>
                                                        </td>
													</tr>
												</table>
                                                
											</td>
										</tr>
										<tr>
											<td background='img/linha_footer.jpg'>&nbsp;</td>
										</tr>
									</table>							
                        </td>
					</tr>
                    <tr>
                    <table width='100%' class='Borda1N' id='TABLE2' language='javascript' background='img/fundo.jpg'>
    <tr>
        <td class='TextoTopo'>Atualização do Débito</td>
    </tr>
    <tr>
        <td>
            <fieldset class='Literal'>
                <legend class='Literal'>Informações Gerais</legend>
                <table width='500' Class='TextoNormal' >
			        <tr>
                    	<?php
						$palavra = $_POST['id_processo'];
						$sql=mysql_query("SELECT a.id_processo, a.processo, a.vara, a.objetoacao, a.valorescausa, a.escolas, a.devedor, a.aluno_devedor, a.tipoacordo, a.acordo, a.acordoref, a.vlacordo, a.vloriginal, a.parcelas, a.status, a.observacao, b.nome_st_processo, c.nome_vara
							FROM processo as a
							LEFT JOIN status as b ON a.status = b.id_status
							LEFT JOIN vara as c ON a.vara = c.id_vara
							WHERE id_processo = '$palavra'");
                        $res=mysql_fetch_array($sql);
						
				        echo "<td width='130'>Processo:</td>
				        <td width='358'><input id='processo' name='processo' class='CampoTexto' MaxLength='50' value='".$res['processo']."'></td>
			        </tr>
			        <tr>
				        <td height='23'><label for='vara'>Vara:</label>
				        </td>
                        <td>
					       <select id='vara' name='vara' class='CampoTexto'>
					         <option value='".$res['vara']."'>".$res['nome_vara']."</option>";
							 
							 $sql2 = "SELECT id_vara, nome_vara FROM vara ORDER BY nome_vara";
									$res2 = mysql_query($sql2);
									while ($row2 = mysql_fetch_assoc($res2) ) {
										echo '<option value="'.$row2['id_vara'].'">'.$row2['nome_vara'].'</option>';
							}
							 	
                           echo "</select> 
                        </td>
			        </tr>
			        <tr>
				        <td >Objeto da Ação:
				        </td>
				        <td><textarea cols='70' rows='5' class='CampoTexto' id='objetoacao' name='objetoacao'>".$res['objetoacao']."</textarea></td>
			        </tr>
			        <tr>
				        <td >Valor da Causa: R$
				        </td>
				        <td><input type='text' id='valorescausa' name='valorescausa' class='CampoTexto' value='".$res['valorescausa']."' onkeyup='numMoeda2(event,this);'></td>
			        </tr>
					<tr>
				        <td >Status: 
				        </td>
				        <td><select id='status' name='status' class='CampoTexto'>
					         <option value='".$res['status']."'>".$res['nome_st_processo']."</option>";
							 
							 $sql7 = "SELECT id_status, nome_st_processo FROM status ORDER BY nome_st_processo";
									$res7 = mysql_query($sql7);
									while ($row7 = mysql_fetch_assoc($res7) ) {
										echo '<option value="'.$row7['id_status'].'">'.$row7['nome_st_processo'].'</option>';
							}
							 	
                           echo "</select></td>
			        </tr>
                </table>
                <br />
			    </fieldset>
			    <fieldset class='Literal'>
                <legend class='Literal'>Cliente</legend>
                <table Class='TextoNormal' >
			        <tr>
				        <td><label for='escolas'>Colégio Vinculado:</label></td>
				        <td>
					       <select name='escolas' id='escolas' class='CampoTexto'>";
						   	 $escolas = $res['escolas'];
						   	 
							 $sql4 = "SELECT id_cliente, nome_cliente FROM cliente WHERE id_cliente = '$escolas'";
							 $res4 = mysql_query($sql4);
							 $row4 = mysql_fetch_assoc($res4);
							 
					         echo "<option value='".$row4['id_cliente']."'>".$row4['nome_cliente']."</option>";
							 
							 $sql3 = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY nome_cliente";
									$res3 = mysql_query($sql3);
									while ($row3 = mysql_fetch_assoc($res3) ) {
										echo '<option value="'.$row3['id_cliente'].'">'.$row3['nome_cliente'].'</option>';
									}
                           echo "</select> 
                        </td>
                    </tr>
                </table>
                <br />
                </fieldset>
			    <fieldset class='Literal'>
                <legend class='Literal'>Devedor e Alunos</legend>
			        <table Class='TextoNormal' >
			        <tr>
				        <td>Devedor:
                            <select name='devedor' id='devedor' class='CampoTexto'>";
								$devedor = $res['devedor'];
						   	 
							 	$sql6 = "SELECT id_devedor, nome_dev FROM devedor WHERE id_devedor = '$devedor'";
							 	$res6 = mysql_query($sql6);
							 	$row6 = mysql_fetch_assoc($res6);
							 
					         	echo "<option value='".$row6['id_devedor']."'> Selecione: ".$row6['nome_dev']." na lista abaixo</option>";
                                
								echo "<option value='0' selected='selected'>Aguardando escola...</option>";
								
                            echo "</select> <label class='TextVermelho10N'>SELECIONE O DEVEDOR NA LISTA!</label>
                        </td>
			        </tr>
			        <tr>
				        <td>Aluno(s):
							<input type='hidden' id='id_processo' name='id_processo' value='".$res['id_processo']."'>
                            <select name='aluno_devedor' id='aluno_devedor' class='CampoTexto'>
                                <option value='0' disabled='disabled'>Escolha um Devedor primeiro</option>
                            </select>
                        <br></td>
			        </tr>
                </table>
                <br />
			    </fieldset>
			    <fieldset class='Literal'>
                <legend class='Literal'>Outras Informações</legend>
			        <table width='100%' Class='TextoNormal' >
			        <tr>
				        <td width='150'>Acordo(s):
				        </td>
				        <td>
                        <select name='tipoacordo' id='tipoacordo' class='CampoTexto'>
                          <option value=''>".$res['tipoacordo']."</option>
                          <option value='Judicial'>Judicial</option>
                          <option value='Extrajudicial'>Extrajudicial</option>
                          <option value='Débito'>D&eacute;bito</option>
                        </select>
                      </td>
			        </tr>
			        <tr>
				        <td width='150'>Acordo(s):
				        </td>
				        <td height='25'><input id='acordo' name='acordo' class='CampoTexto' value='".$res['acordo']."'></td>
			        </tr>
			        <tr>
				        <td width='160'>Acordo(s) Referentes(s) a:
				        </td>
				        <td height='25'><input id='acordoref' name='acordoref' class='CampoTexto' value='".$res['acordoref']."'></td>
			        </tr>
			        <tr>
				        <td width='160'>Valor do Acordo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R$
				        </td>
				        <td height='25'><input id='vlarcordo' name='vlacordo' class='CampoTexto' value='".$res['vlacordo']."' onkeyup='numMoeda2(event,this);'>
                            
                        </td>
			        </tr>
			        <tr>
				        <td width='170'>Valor Original do Débito: R$</td>
				        <td><input type='text' id='vloriginal' name='vloriginal' class='CampoTexto' value='".$res['vloriginal']."' onkeyup='numMoeda2(event,this);'></td>
			        </tr>
			        <tr>
				        <td width='150'>Número de Parcelas:</td>
				        <td><input type='text' id='parcelas' name='parcelas' class='CampoTexto'></td>
			        </tr>
                    <tr>
				        <td width='150'>Primeira Parcela:</td>
				        <td><input type='text' id='primparcela' name='primparcela' class='CampoTexto' onkeyup='numMoeda2(event,this);'></td>
			        </tr>
                    <tr>
				        <td width='150'>Data de Vencimento:</td>
				        <td><input type='text' id='venc' name='venc' class='CampoTexto' onkeyup='FormataData(this,event)' maxlength='10'></td>
			        </tr>
					<tr>
				        <td width='150'>Observação:</td>
				        <td><textarea rows='5' class='CampoTexto' id='obsevacao' name='observacao'>".$res['acordoref']."</textarea></td>
			        </tr>
			        <tr>
				        <td colSpan='4'>&nbsp;&nbsp;
					        <INPUT name='btIncluir' type='submit' class='Botao' id='btIncluir' value=' Salvar '></td>
			        </tr>
                </table>
				 </form>
             </fieldset>
        </td>
    </tr>
</table>";
			?>
			</fieldset>
       
   
    
        <script src='js/modernizr.js'></script>
		<script>
			(function($){
				
				//cache nav
				var nav = $('#topNav');
				
				//add indicator and hovers to submenu parents
				nav.find('li').each(function() {
					if ($(this).find('ul').length > 0) {
						$('<span>').text('^').appendTo($(this).children(':first'));

						//show subnav on hover
						$(this).mouseenter(function() {
							$(this).find('ul').stop(true, true).slideDown();
						});
						
						//hide submenus on exit
						$(this).mouseleave(function() {
							$(this).find('ul').stop(true, true).slideUp();
						});
					}
				});
			})(jQuery);
		</script>
        <?php

		$mensagem= "Tela de Edição de Processo";
		salvaLog($mensagem);
		
		?>
</body>
</html>
