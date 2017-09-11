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
            Atualizar Parcela</td>
    </tr>
	<TR>
		<TD>
		 <fieldset class="Literal">
                <legend class="Literal">Informações Gerais</legend>
						<?php
                        $palavra = $_POST['id_parcela'];
						$sql=mysql_query("SELECT a.id_parcela, a.vlparcela, a.dtvenc, a.vlpago, a.dtpago, a.id_tipo_pagamento,  a.status_parcela, a.referencia, a.id_proc_processo, b.nome_st_parcela, c.nome_pag
						FROM parcela as a
						LEFT JOIN status_parcela as b ON a.status_parcela = b.id_status
						LEFT JOIN tipo_pagamento as c ON a.id_tipo_pagamento = c.id_pagamento
						WHERE id_parcela = '$palavra'") or die (mysql_error());
						$res=mysql_fetch_array($sql);
						echo "<table width='600' class='TextoNormal' >
						<form id='form1' name='form1' action='sql_editar_parcela.php' method='post'>
                        <tr>
                            <td>Nº da Parcela: </td>
                            <td><input type='hidden' id='id_proc_processo' name='id_proc_processo' value='".$res['id_proc_processo']."'>
							<input type='text' id='id_parcela' name='id_parcela' class='CampoTexto' value='".$res['id_parcela']."' readonly></td>
                        </tr>
                        <tr>
                            <td>Data do Vencimento: </td>
                            <td><input type='text' id='dtvenc' name='dtvenc' class='CampoTexto' value='".date_format(new DateTime($res['dtvenc']), "d/m/Y")."' onkeyup='FormataData(this,event)' maxlength='10'></td>
                        </tr>
                        <tr>
                            <td>Valor da Parcela: </td>
                            <td><input type='text' id='vlparcela' name='vlparcela' class='CampoTexto' value='".$res['vlparcela']."' onkeyup='numMoeda2(event,this);'></td>
                        </tr>
                        <tr>
                            <td>Data do Pagamento: </td>
                            <td><input type='text' id='dtpago' name='dtpago' class='CampoTexto' value='".date_format(new DateTime($res['dtpago']), "d/m/Y")."' onkeyup='FormataData(this,event)' maxlength='10'></td>
                        </tr>
                        <tr>
                            <td>Valor Pago: </td>
                            <td><input type='text' id='vlpago' name='vlpago' class='CampoTexto' value='".$res['vlpago']."' onkeyup='numMoeda2(event,this);'></td>
                        </tr>
						<tr>
                            <td>Tipo do Pagamento: </td>
                            <td>
							
							<select id='id_tipo_pagamento' name='id_tipo_pagamento' class='CampoTexto'>
									<option value='".$res['id_tipo_pagamento']."'>".$res['nome_pag']."</option>";
									$sql_pag = "SELECT id_pagamento, nome_pag FROM tipo_pagamento ORDER BY nome_pag";
									$res_pag = mysql_query($sql_pag) or die (mysql_error());
									while ($row = mysql_fetch_assoc($res_pag)) {
										echo '<option value="'.$row['id_pagamento'].'">'.$row['nome_pag'].'</option>';
									}
							echo "</td>
                        </tr>
						<tr>
                            <td>Status da Parcela: </td>
                            <td>
							
							<select id='status_parcela' name='status_parcela' class='CampoTexto'>
									<option value='".$res['status_parcela']."'>".$res['nome_st_parcela']."</option>";
									$sql_par = "SELECT id_status, nome_st_parcela FROM status_parcela ORDER BY nome_st_parcela";
									$res_par = mysql_query($sql_par) or die (mysql_error());
									while ($row2 = mysql_fetch_assoc($res_par)) {
										echo '<option value="'.$row2['id_status'].'">'.$row2['nome_st_parcela'].'</option>';
									}
							echo "</td>
                        </tr>
						<tr>
                            <td>Número do Boleto: </td>
                            <td><input type='text' id='numref' name='numref' class='CampoTexto' value='".$res['numref']."' maxlength='11'><label class='TextVermelho10N'>(Campo N&Uacute;MERO DO DOCUMENTO no boleto)</label></td>
                        </tr>
						<tr><td><br>
							<input type='submit' id='atualizar' class='Botao' value=' Atualizar Parcela '>
						</td></tr>
                    </table>
            </fieldset>
		</TD>
	</TR>
	<tr>
	    <td>&nbsp;
            </td>
	</tr>
</form></TABLE>";
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