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
            Incluir Parcela Manual</td>
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
						echo "<table width='400' class='TextoNormal' >
                        <tr>
                            <td>Nº do Processo: </td>
                            <td>".$res['processo']."</td>
                        </tr>
                        <tr>
                            <td>Colégio Vinculado: </td>
                            <td>".$res['nome_exib']."</td>
                        </tr>
                        <tr>
                            <td>Responsável: </td>
                            <td>".$res['nome_dev']."</td>
                        </tr>
                        <tr>
                            <td>Valor do Acordo: </td>
                            <td>".$res['vlacordo']."</td>
                        </tr>
                        <tr>
                            <td>Parcelas: </td>
                            <td><input id='parcelas' name='parcelas' class='CampoTexto'></td>
                        </tr>
						<tr>
                            <td>Primeiro Vencimento: </td>
                            <td><input id='vencimento' name='vencimento' class='CampoTexto'></td>
                        </tr>
                        <tr>
                            <td>Forma de Pagamento: </td>
                            <td><select id='tipo_pagamento' name='tipo_pagamento' class='CampoTexto'>
									<option value='".$row['id_pagamento']."'>-- Selecione --</option>";
									$sql4 = "SELECT id_pagamento, nome_pag FROM tipo_pagamento ORDER BY nome_pag";
									$res4 = mysql_query($sql4) or die (mysql_error());
									while ($row = mysql_fetch_assoc($res4)) {
										echo '<option value="'.$row['id_pagamento'].'">'.$row['nome_pag'].'</option>';
									}
							echo "</td>
                        </tr>
						<tr><td><br>
							<input type='button' id='btIncluir' class='Botao' value=' Gerar Parcelas '>
						</td></tr>
                    </table>
            </fieldset>
		</TD>
	</TR>";
						$id_processo = $res['id_processo'];
                        $sql2=mysql_query("SELECT a.id_parcela, a.parcela_atual, a.numref, a.vlparcela, a.dtvenc, a.vlpago, a.dtpago, a.id_tipo_pagamento, a.id_processo, a.referencia, a.stpa_cd_codigo, a.deve_cd_codigo, a.identificacao, a.status_parcela, b.nome_pag, c.nome_st_parcela 
						FROM parcela as a
						LEFT JOIN tipo_pagamento as b ON a.id_tipo_pagamento = b.id_pagamento
                        LEFT JOIN status_parcela as c ON a.status_parcela = c.id_status
						WHERE a.id_processo = '$id_processo'") or die (mysql_error());
						
						
						echo "<TR><TD>
			     <fieldset class='Literal'>
                <legend class='Literal'>Parcelas Existentes</legend>
			    <table width='100%'>
                <TR class='TextoTopo' align='center'>
                            <TD>Nº</TD> 
                            <TD>Data Vcto</TD>
                            <TD>Valor</TD>
                            <TD>Data Pgto</TD>
                            <TD>Valor Pago</TD>
                            <TD>Status</TD>
                            <TD>Tipo Pagamento</TD>
                            <TD>Referência</TD>
                </TR>";
				while($res2=mysql_fetch_assoc($sql2)) {
                echo"<tr align='center'>
                	<TD>".$res2['id_processo']."</TD> 
                    <TD>".$res2['dtvenc']."</TD>
                    <TD>".$res2['vlparcela']."</TD>
                    <TD>".$res2['dtpago']."</TD>
                    <TD>".$res2['vlpago']."</TD>
					<TD>".$res['nome']."</TD>
                    <TD>".$res2['nome_pag']."</TD>
                    <TD>".$res2['referencia']."</TD>";
						}
                echo"</tr>
                </table>
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
              </body>
</html>