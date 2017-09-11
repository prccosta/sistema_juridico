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
                                Importação do arquivo de remessa para o servidor</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >
                                        <tr>
                                            <td vAlign="top" >&nbsp;</td>
                                            <td vAlign="middle" align="left"	>
                                                <table class="TextoNormal" width="100%" border="0">
                                                    <tr>
<?php
$arquivo_temp = $_POST['arquivo_temp'];
error_reporting(0);
$arquivo = fopen($arquivo_temp,'r');
//$arquivo = fopen(getPost('arquivo_temp'),'r');

if(!($abre = fopen('delimitador.txt', "w"))){print "Não foi possivel criar arquivo, talvez ele já exista.";die();}

if ($arquivo == false) die('Não foi possível abrir o arquivo.');

	$delimitador = "|";
	
	while(!feof($arquivo)) {
	$valor = fgets($arquivo);
	
	$dados = $campo1 = substr($valor, 0, 1).$delimitador.
		 $campo2 = substr($valor, 1, 5).$delimitador.
		 $campo3 = substr($valor, 6, 1).$delimitador.
		 $campo4 = substr($valor, 7, 5).$delimitador.
		 $campo5 = substr($valor, 12, 7).$delimitador.
		 $campo6 = substr($valor, 19, 1).$delimitador.
		 $campo7 = substr($valor, 20, 17).$delimitador.
		 $campo8 = substr($valor, 37, 25).$delimitador.
		 $campo9 = substr($valor, 62, 3).$delimitador.
		 $campo10 = substr($valor, 65, 1).$delimitador.
		 $campo11 = substr($valor, 66, 4).$delimitador.
		 $campo12 = substr($valor, 70, 11).$delimitador.
		 $campo13 = substr($valor, 81, 1).$delimitador.
		 $campo14 = substr($valor, 82, 10).$delimitador.
		 $campo15 = substr($valor, 92, 1).$delimitador.
		 $campo16 = substr($valor, 93, 1).$delimitador.
		 $campo17 = substr($valor, 94, 10).$delimitador.
		 $campo18 = substr($valor, 104, 1).$delimitador.
		 $campo19 = substr($valor, 105, 1).$delimitador.
		 $campo20 = substr($valor, 106, 2).$delimitador.
		 $campo21 = substr($valor, 108, 2).$delimitador.
		 $campo22 = substr($valor, 110, 10).$delimitador.
		 //$campo23 = substr($valor, 120, 6).$delimitador.
		 $campo23 = "20".substr($valor, 124, 2)."-".substr($valor, 122, 2)."-".substr($valor, 120, 2).$delimitador.
		 $campo24 = substr($valor, 126, 13).$delimitador.
		 $campo25 = substr($valor, 139, 3).$delimitador.
		 $campo26 = substr($valor, 142, 5).$delimitador.
		 $campo27 = substr($valor, 147, 2).$delimitador.
		 $campo28 = substr($valor, 149, 1).$delimitador.
		 $campo29 = substr($valor, 150, 6).$delimitador.
		 $campo30 = substr($valor, 156, 2).$delimitador.
		 $campo31 = substr($valor, 158, 2).$delimitador.
		 $campo32 = substr($valor, 160, 13).$delimitador.
		 $campo33 = substr($valor, 173, 6).$delimitador.
		 $campo34 = substr($valor, 179, 13).$delimitador.
		 $campo35 = substr($valor, 192, 13).$delimitador.
		 $campo36 = substr($valor, 205, 13).$delimitador.
		 $campo37 = substr($valor, 218, 2).$delimitador.
		 $campo38 = substr($valor, 220, 14).$delimitador.
		 $campo39 = substr($valor, 234, 40).$delimitador.
		 $campo40 = substr($valor, 274, 40).$delimitador.
		 $campo41 = substr($valor, 314, 12).$delimitador.
		 $campo42 = substr($valor, 326, 5).$delimitador.
		 $campo43 = substr($valor, 331, 3).$delimitador.
		 $campo44 = substr($valor, 334, 60).$delimitador.
		 $campo45 = substr($valor, 394, 6)."\r\n";
	
	//echo $dados.'<br><br>';
	
	$insere = mysql_query("INSERT INTO remessa (`id_remessa`, `id_reg`,`ag_debito`,`dig_ag_debito`,`raz_cc`, `cc`, `dig_cc`, 
	`id_emp_ced`, `numdoc`, `cd_ban_compensa`, `multa`, `perc_multa`, `numbanco`, `dig_numbanco`, `desc_bon_dia`, `cond_em_cobr`, 
	`id_em_deb_aut`, `id_oper_banco`, `ind_rat_cred`, `ender_av_da`, `branco`, `id_ocorr`, `ndocumento`, `vencimento`, `vltitulo`, 
	`ban_cobr`, `ag_depositaria`, `esp_titulo`, `identificacao`, `dt_emis_tit`, `instrucao_1`, `instrucao_2`, `vlcobr_dia_atraso`, 
	`dt_lim_con_desc`, `vldesc`, `vliof`, `vlabat_con_can`, `id_inscr_sacado`, `num_inscr`, `nome_sacado`, `ender_sacado`, 
	`msg1`, `cep`, `sufixo_cep`, `sacava_msg2`, `seq_reg`) 
		VALUES ('', '$campo1', '$campo2', '$campo3', '$campo4', '$campo5', '$campo6', '$campo7', '$campo8', '$campo9', '$campo10', 
		'$campo11', '$campo12', '$campo13', '$campo14', '$campo15', '$campo16', '$campo17', '$campo18', '$campo19', '$campo20', 
		'$campo21', '$campo22', '$campo23', '$campo24', '$campo25', '$campo26', '$campo27', '$campo28', '$campo29', '$campo30', 
		'$campo31', '$campo32', '$campo33', '$campo34', '$campo35', '$campo36', '$campo37', '$campo38', '$campo39', '$campo40', 
		'$campo41', '$campo42', '$campo43', '$campo44', '$campo45')") or die (mysql_error());
	
	$escreve = fwrite($abre, "$dados");
	}
	echo "<br><label class='Saudacao'><center>Os dados foram importados para a Base de dados com sucesso!<br>
	<br>Clique <b><a href='envio_remessa.php'>AQUI</a></b> para enviar um novo arquivo para a base de dados.</label>";

	fclose($arquivo);
	
	$ArqOrig = 'delimitador.txt';
	$ArqDest = ('retorno/delimitador.txt');
	$arq_delete = ($arquivo_temp);
						 
	//copio o arquivo para a pasta de destino
	copy($ArqOrig, $ArqDest);
	//apago o arquivo da pasta onde se encontra o arquivo
	unlink($ArqOrig);
	unlink($ArqDest);
	unlink($arq_delete);
	
	
			//a cargo do leitor melhorar o filtro anti injection  
			function filter( $str ){  
				return addslashes( $str );  
			}  
			function getPost( $key ){  
				return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;  
			}
			?>
                                                    </td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
            <tr><td>
                                      
            </td></tr>
            <tr><td><br></td></tr>
            <tr><td><br></td></tr>

            </td></tr></table>
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