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
            Relatório de Individual de Processo</td>
    </tr>
	<TR>
		<TD>
		 <fieldset class="Literal">
                <legend class="Literal">Informações Gerais</legend>
						<?php
                        $palavra = $_POST['id_processo'];
						$sql=mysql_query("SELECT a.id_processo, a.processo, a.vara, a.objetoacao, a.valorescausa, a.escolas, a.devedor, a.aluno_devedor, a.tipoacordo, a.acordo, a.acordoref, a.vlacordo, a.vloriginal, a.parcelas, a.status, a.observacao, b.nome_st_processo, c.nome_exib, d.nome_dev
						FROM processo as a
						LEFT JOIN status as b ON a.status = b.id_status
						LEFT JOIN cliente as c ON a.escolas = c.id_cliente
						LEFT JOIN devedor as d ON a.devedor = d.id_devedor
						WHERE id_processo = '$palavra'") or die (mysql_error());
					
						$res=mysql_fetch_array($sql);
						echo "<table width='300' class='TextoNormal' >
                        <tr>
                            <td>Processo: </td>
                            <td>".$res['id_processo']." | ".$res['processo']."</td>
                        </tr>
                        <tr>
                            <td>Cliente: </td>
                            <td>".$res['nome_exib']."</td>
                        </tr>
                        <tr>
                            <td>Devedor: </td>
                            <td>".$res['nome_dev']."</td>
                        </tr>
                        <tr>
                            <td>Aluno(s): </td>
                            <td>".$res['aluno_devedor']."</td>
                        </tr>
                        <tr>
                            <td>Valor Original: </td>
                            <td>R$ ".$res['vlacordo']."</td>
                        </tr>
                        <tr>
                            <td>Valor do Acordo: </td>
                            <td>R$ ".$res['vloriginal']."</td>
                        </tr>
                        <tr>
                            <td>Tipo Acordo: </td>
                            <td>".$res['tipoacordo']."</td>
                        </tr>
                        <tr>
                            <td>Status: </td>
                            <td>".$res['nome_st_processo']."</td>
                        </tr>
                    </table>
            </fieldset>
		</TD>
	</TR>
	<TR>
		<TD>
		     <fieldset class='Literal'>
			   <form id='form1' name='form1' action='grava_mensagem.php' method='post'>
               <legend class='Literal'>Nova Mensagem</legend>
                <input name='id_processo' type='hidden' value='".$res['id_processo']."'>
				<textarea name='mensagem' cols='150' rows='6'></textarea>
                <br>
               <input type='submit' id='btIncluir' class='Botao' value='Incluir'>
                    &nbsp;&nbsp;
                    <input name='exibe' type='checkbox' value='1'>Essa mensagem pode ser vista pelo cliente?
        			</form>
			</fieldset>
			 <fieldset class='Literal'>
                <legend class='Literal'>Acompanhamento</legend>
			</fieldset>
			
		</TD>
	</TR>
	<TR>
		<TD>
			     <fieldset class='Literal'>
                <legend class='Literal'>Parcelas</legend>
                    <br>
                        <table width='100%'><form id='form1' name='form1' action='cancela_parcela.php' method='post'>
                        <TR class='TextoTopo' align='center'>
                            <TD width='70'>Cancelar</TD>
                            <TD>Nº Parcela</TD> 
                            <TD>Data Vcto</TD>
                            <TD>Valor</TD>
                            <TD>Data Pgto</TD>
                            <TD>Valor Pago</TD>
                            <TD>Status</TD>
                            <TD>Tipo Pagamento</TD>
                            <TD>Referência</TD>
                            <TD>Editar</TD>
                        </TR>";
						$id_processo = $res['id_processo'];
                        $sql2=mysql_query("SELECT a.id_parcela, a.parcela_atual, a.numref, a.vlparcela, a.dtvenc, a.vlpago, a.dtpago, a.id_tipo_pagamento, a.id_proc_processo, a.referencia, a.id_dev_devedor, a.identificacao, a.status_parcela, b.nome_pag, c.nome_st_parcela 
						FROM parcela as a
						LEFT JOIN tipo_pagamento as b ON a.id_tipo_pagamento = b.id_pagamento
                        LEFT JOIN status_parcela as c ON a.status_parcela = c.id_status
						WHERE a.id_proc_processo = '$id_processo' AND a.status_parcela <> '4'
						order by dtvenc") or die (mysql_error());
                        while($res2=mysql_fetch_assoc($sql2)) {
						echo "<TR align='center'>
                            <TD><input id='id_parcela' type='hidden' name='id_parcela' value='".$res2['id_parcela']."'>
                        		<input type='submit' name='cancelar' value='Cancelar' class='Botao'></TD></form>
                        	<form id='form1' name='form1' action='editar_parcela.php' method='post'>
                            <input name='id_parcela' type='hidden' id='id_parcela' value='".$res2['id_parcela']."'>
							<TD>".$res2['id_parcela']."</TD> 
                            <TD>".date_format(new DateTime($res2['dtvenc']), "d/m/Y")."</TD>
                            <TD>".$res2['vlparcela']."</TD>
                            <TD>".date_format(new DateTime($res2['dtpago']), "d/m/Y")."</TD>
                            <TD>".$res2['vlpago']."</TD>
                            <TD>".$res2['nome_st_parcela']."</TD>
                            <TD>".$res2['nome_pag']."</TD>
                            <TD>".$res2['referencia']."</TD>
                            <TD><input type='submit' name='editar' value='editar' class='Botao' /></TD>
                        </TR>";
                        	}
							echo "<tr><td><br></td></tr></form>
                        </table>
			 		<form id='form1' name='form1' action='incluir_parcela.php' method='post'>
                	<input name='id_processo' type='hidden' id='id_processo' value='".$id_processo."'>
            </fieldset></form>
		</TD>
	</TR>
	<TR>
		<TD>
			     <fieldset class='Literal'>
                <legend class='Literal'>Parcelas Canceladas</legend>
			    <table width='100%'>
                <TR class='TextoTopo' align='center'>
                            <TD>Nº Parcela</TD> 
                            <TD>Data Vcto</TD>
                            <TD>Valor</TD>
                            <TD>Data Pgto</TD>
                            <TD>Valor Pago</TD>
                            <TD>Status</TD>
                            <TD>Tipo Pagamento</TD>
                            <TD>Referência</TD>
                </TR>";
					$sql4=mysql_query("SELECT a.id_parcela, a.parcela_atual, a.numref, a.vlparcela, a.dtvenc, a.vlpago, a.dtpago, a.id_tipo_pagamento, a.id_proc_processo, a.referencia, a.id_dev_devedor, a.identificacao, a.status_parcela, b.nome_pag, c.nome_st_parcela 
						FROM parcela as a
						LEFT JOIN tipo_pagamento as b ON a.id_tipo_pagamento = b.id_pagamento
                        LEFT JOIN status_parcela as c ON a.status_parcela = c.id_status
						WHERE a.id_proc_processo = '$id_processo' AND a.status_parcela = '4'") or die (mysql_error());
					
					 while($res4=mysql_fetch_array($sql4)) {
                	echo "<tr align='center'><TD>".$res4['id_parcela']."</TD> 
                    <TD>".date_format(new DateTime($res4['dtvenc']), "d/m/Y")."</TD>
                    <TD>".$res4['vlparcela']."</TD>
                    <TD>".date_format(new DateTime($res4['dtpago']), "d/m/Y")."</TD>
                    <TD>".$res4['vlpago']."</TD>
					<TD>".$res4['nome_st_parcela']."</TD>
                    <TD>".$res4['nome_pag']."</TD>
                    <TD>".$res4['referencia']."</TD>
                </tr>";
					 }
                echo"</table>
            </fieldset>	
		</TD>
	</TR>
	<tr>
	    <td>&nbsp;
            </td>
	</tr>
</TABLE>";
?>                
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