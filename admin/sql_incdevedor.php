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
                                Devedor</td>
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
											if ($_POST){
												function limpaCPF_CNPJ($cpf){
												$cpf = trim($cpf);
												$cpf = str_replace(".", "", $cpf);
												$cpf = str_replace(",", "", $cpf);
												$cpf = str_replace("-", "", $cpf);
												$cpf = str_replace("/", "", $cpf);
												return $cpf;
												}
											   $cpf = limpaCPF_CNPJ($cpf);
											   $escolas = $_POST['escolas'];
											   $matricula_aluno = $_POST['matricula_aluno'];
											   $nome_aluno = $_POST['nome_aluno'];
											   
											   $ddd_aluno = $_POST['ddd_aluno'];
											   $tel_aluno = $_POST['tel_aluno'];
											   $tipo_aluno = $_POST['tipo_aluno'];
											   
											   $sql=mysql_query("INSERT INTO `devedor` VALUES ('', '$escolas', '$nome', '$cpf', '$responsavel', '$cpf_responsavel', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$cep', now())") or die(mysql_error());
											
											   $id_devedor = mysql_insert_id();
											   
											   $quant_linhas = count($matricula_aluno);
											   for ($i=0; $i< $quant_linhas; $i++) {
											
											$sql=mysql_query("INSERT INTO `telefone_devedor` VALUES ('', '$id_devedor', '$ddd_aluno[$i]', '$tel_aluno[$i]', '$tipo_aluno[$i]')") or die(mysql_error());
											
											$sql=mysql_query("INSERT INTO `aluno_devedor` VALUES ('', '$id_devedor', '$matricula_aluno[$i]', '$nome_aluno[$i]')") or die(mysql_error());
											   }
											}
											if($sql){
echo "<br><br><label class='Saudacao'><center>O cadastro do devedor foi efetuado com sucesso!<br>Clique <a href='incdevedor.php'>Aqui</a> para voltar para página de cadastro.</label>";
} else {
echo "<label class='Saudacao'><center>Ocorreu um erro durante o cadastro!<br>Clique <strong><a href='incdevedor.php'>Aqui</a></strong> para voltar para página de cadastro.</label>";
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