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
						input += '&nbsp;<label>Tipo: <select id="tipo_aluno" name="tipo_aluno[]" class="CampoTexto"><option value=" ">-- Escolha o Tipo --</option><option value="Residencial">Residencial</option><option value="Trabalho">Trabalho</option><option value="Celular">Celular</option><option value="Recado">Recado</option><option value="Recado">Fax</option></select></label>';
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
                                Incluir Telefone Devedor</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                    <table width="750" Class="TextoNormal" >
                                    <form id="form1" action="sql_add_tel_devedor.php" method="post" name="form1">				
                                    <tr>
                                    	<?php

									$palavra = $_POST['id_devedor'];
                                    $sql=mysql_query("SELECT * FROM devedor WHERE id_devedor = '$palavra'") or die (mysql_error());
									$res=mysql_fetch_array($sql);
                                        echo"<td vAlign='top'>&nbsp;</td>
                                        <td vAlign='middle' align='left'>
                                            <table class='TextoNormal' width='100%'>
                                                <tr>
                                                    <td height='20'>Cliente:</td>
                                                    <td width='80%' height='20'>".$res['nome_dev']."
													<input type='hidden' name='id_devedor' class='CampoTexto' value='".$res['id_devedor']."'></td>
                                                </tr>
                                                <tr>
                                                    <td>Telefone:</td>
                                                    <td width='80%'>
                                                        &nbsp;
                                                        <table width='400' class='TextoNormal'>
                                                            <tr>
                                                                <td width='92'>DDD:</td>
                                                                <td width='33'><nobr><input type='text' name='ddd_aluno[]' class='CampoTextosemwidth' MaxLength='2' Width='40px'></td>
                                                                <td >Tel:</td>
                                                                <td style='width: 103px'><nobr><input type='text' name='tel_aluno[]' class='CampoTexto'></td>
                                                                <td width='1'>Tipo:</td>
                                                                <td ><select id='tipo_aluno' name='tipo_aluno[]' class='CampoTexto'>
                                                                  <option value=''>-- Escolha o Tipo --</option>
                                                                  <option value='Residencial'>Residencial</option>
                                                                  <option value='Trabalho'>Trabalho</option>
                                                                  <option value='Celular'>Celular</option>
                                                                  <option value='Recado'>Recado</option>
                                                                  <option value='Fax'>Fax</option>
                                                              </select></td>
                                                                <td>
                                                               <a href='#' id='add2'><img src='img/bt_add_campos.jpg' width='86' height='18'></a><br>
                                                               </td>
                                                            </tr>
                                                        </table>
                                                        <div id='campos2'></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colSpan='2'><br>
                                                        <input type='submit' id='btSalvar' class='Botao' value=' Salvar ' ValidationGroup='Devedor'>&nbsp;<INPUT name='reset' type='reset' class='Botao' id='btLimpar' value=' Limpar '></td>
                                                </tr>";
												?>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                </fieldset>
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