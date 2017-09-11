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
                                Baixa de Pagamento dos Boletos</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >					
                                    <tr>
                                        <td vAlign="top">&nbsp;</td>
                                        <td vAlign="middle" align="left"></td>
                                     </tr>
                                     <tr>
                                        <td colSpan="2">
                    <?php
					$_pagi_sql = "SELECT *
								FROM `parcela` AS a
								LEFT JOIN devedor AS b ON a.id_dev_devedor = b.id_devedor
								LEFT JOIN remessa AS c ON b.cpf = right(c.num_inscr,11) 
								LEFT JOIN retorno AS d ON c.numbanco = d.nossonum
								LEFT JOIN status_parcela AS e ON a.status_parcela = e.id_status
								WHERE c.numbanco = d.nossonum AND a.status_parcela <> '3' AND d.id_ocorr IN ('06', '17')
								ORDER BY a.dtvenc";
							
					$_pagi_result = mysql_query($_pagi_sql) or die (mysql_error());
					while($res2=mysql_fetch_array($_pagi_result)){
					
					$id_parcela = $res2['id_parcela'];
					$sql = mysql_query("UPDATE parcela SET status_parcela = '3', dtpago = now() where id_parcela = '$id_parcela'") or die(mysql_error());
					}
											if($sql){
echo "<br><br><label class='Saudacao'><center>As parcelas foram baixadas com sucesso!<br>Clique <a href='baixa_boleto.php'>Aqui</a> para voltar para página de Baixa de Pagamento dos Boletos.</label><br><br>";

} else {
echo "<label class='Saudacao'><center>Ocorreu um erro durante a atualização!<br>Clique <strong><a href='baixa_boleto.php'>Aqui</a></strong> para voltar para página de Baixa de Pagamento dos Boletos.</label><br><br>";
}
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
