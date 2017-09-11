<?php
require_once("includes/conexao.php");
include "post.php";

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
                                Atualização do Débito</td>
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
											$id_processo = $_POST['id_processo'];
											$processo = $_POST['processo'];
											$vara = $_POST['vara'];
											$objetoacao = $_POST['objetoacao'];
/* ------------- TRECHO RESPONSÁVEL PARA RESGATAR E CALCULAR O VALOR DAS PARCELAS NO CAMPO VALORESCAUSA -------------- */											
									//Resgatando os valores digitados pelo cliente e removendo a milhar										
									$remove_milhar_valorescausa = implode('',explode('.',$_POST['valorescausa']));
									//Trocando a vírgula por ponto na casa decimal
									$troca_casa_decimal_valorescausa = implode('.',explode(',',$remove_milhar_valorescausa));
									//Resultado do campo VALORESCAUSA com duas casas decimais
									$valorescausa = number_format($troca_casa_decimal_valorescausa,2,".","");
/* ------------------------------------------- FINAL DO TRECHO --------------------------------------------------- */
											$escolas = $_POST['escolas'];
											$devedor = $_POST['devedor'];
											$aluno_devedor = $_POST['aluno_devedor'];
											$tipoacordo = $_POST['tipoacordo'];
											$acordo = $_POST['acordo'];
											$acordoref = $_POST['acordoref'];
/* ------------- TRECHO RESPONSÁVEL PARA RESGATAR E CALCULAR O VALOR DAS PARCELAS NO CAMPO VLACORDO -------------- */
									//Resgatando os valores digitados pelo cliente e removendo a milhar
									//Removendo a milhar e trocando a vírgula por ponto na casa decimal
									$remove_milhar_primparcela = implode('',explode('.',$_POST['primparcela']));
									$troca_casa_decimal_primparcela = implode('.',explode(',',$remove_milhar_primparcela));
									$parcelas_total = $_POST['parcelas'];
									$parcelas_temp = (int)$_POST['parcelas'] - 1;
									$remove_milhar_vlacordo = implode('',explode('.',$_POST['vlacordo']));
									//Trocando a vírgula por ponto na casa decimal
									$troca_casa_decimal_vlacordo = implode('.',explode(',',$remove_milhar_vlacordo));
									//Subtração da primeira parcela com o valor do acordo
									$valor_subtraido_vlacordo = $troca_casa_decimal_vlacordo - $troca_casa_decimal_primparcela;
									//Cálculo da divisão das parcelas sem formatação de 2 casas decimais
									$divisao_acordo_temp = $valor_subtraido_vlacordo / $parcelas_temp;
									//Resultado do campo VLACORDO com duas casas decimais
									$vlacordo = number_format($divisao_acordo_temp,2,".","");
/* ------------------------------------------- FINAL DO TRECHO --------------------------------------------------- */														
									
/* ------------- TRECHO RESPONSÁVEL PARA RESGATAR E CALCULAR O VALOR DAS PARCELAS NO CAMPO VLORIGINAL -------------- */											
									//Resgatando os valores digitados pelo cliente e removendo a milhar
									$remove_milhar_vloriginal = implode('',explode('.',$_POST['vloriginal']));
									//Trocando a vírgula por ponto na casa decimal
									$troca_casa_decimal_vloriginal = implode('.',explode(',',$remove_milhar_vloriginal));
									//Resultado do campo VLORIGINAL com duas casas decimais
									$vloriginal = number_format($troca_casa_decimal_vloriginal,2,".","");
/* ------------------------------------------- FINAL DO TRECHO --------------------------------------------------- */
									
									$observacao = $_POST['observacao'];
									$status='1';
									
									$venc_parcelas = mysql_escape_string($_POST['venc']);
									$venc_parcelas_convertido_temp = str_replace( '/', '-',$venc_parcelas);
									$venc_parcelas_convertido = date('Y-m-d',strtotime($venc_parcelas_convertido_temp));
									$sql=mysql_query("INSERT INTO `parcela` VALUES ('', '1', '$parcelas_total', '', '$troca_casa_decimal_primparcela', '$venc_parcelas_convertido', '', '', '', '$id_processo', '', '$status', '$devedor', '', now())") or die(mysql_error());
									
									function calcularParcelas($nParcelas, $venc_parcelas = null){
										global $vlacordo;
										global $id_processo;
										global $devedor;
										global $status;
										global $parcelas_total;
										global $venc_parcelas;
										if($venc_parcelas != null){
										   $venc_parcelas = explode( "/",$venc_parcelas);
										   $dia = $venc_parcelas[0];
										   $mes = $venc_parcelas[1] + 1;
										   $ano = $venc_parcelas[2];
											} else {
										   $dia = date("d");
										   $mes = date("m");
										   $ano = date("Y");
											}
											for($x = 0; $x < $nParcelas; $x++){
												$patual_temp += 1;
												$patual = $patual_temp + 1;
										   $parcela = date("Y-m-d",strtotime("+".$x." month",mktime(0, 0, 0,$mes,$dia,$ano)))."<br>";
										   $sql=mysql_query("INSERT INTO `parcela` VALUES ('', '$patual', '$parcelas_total', '', '$vlacordo', '$parcela', '', '', '', '$id_processo', '', '$status', '$devedor', '', now())") or die(mysql_error());
										}//for
									   }//function
									echo "<br>".calcularParcelas($parcelas_temp, $venc_parcelas);		
																					
									$sql=mysql_query("update `processo` set processo = '$processo', vara = '$vara', objetoacao = '$objetoacao', valorescausa = '$valorescausa', escolas = '$escolas', devedor = '$devedor', aluno_devedor = '$aluno_devedor', tipoacordo = '$tipoacordo', acordo = '$acordo', acordoref = '$acordoref', vlacordo = '$vlacordo', vloriginal = '$vloriginal', parcelas = '$parcelas', observacao = '$observacao' where id_processo = '$id_processo'") or die(mysql_error());
									if($sql){
echo "<br><br><label class='Saudacao'><center>Os dados do débito foram atualizados com sucesso!<br>Clique <a href='pesquisarprocesso.php'>Aqui</a> para voltar para página de pesquisa.</label>";
} else {
echo "<label class='Saudacao'><center>Ocorreu um erro durante a atualização!<br>Clique <strong><a href='pesquisarprocesso.php'>Aqui</a></strong> para voltar para página de cadastro.</label>";
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