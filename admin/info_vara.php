<?php
require_once('includes/conexao.php');

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header('Location: ../acesso_sistema.php'); exit;
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
<html lang='br'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
    <title>Canut e Oliveira Lima Advogados Associados</title>
    <link href='css/Style.css' rel='stylesheet' type='text/css'>
    <link href='css/admin_styles.css' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='css/nav.css'>
	<script src='js/jquery.js'></script>
	<script src="js/formulas.js" type="text/javascript"></script>

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
    <form id='form1' action='sql_info_vara.php' method='post' name='form1'>
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
        <td class='TextoTopo'>Atualização da Vara</td>
    </tr>
    <tr>
        <td>
            <fieldset class='Literal'>
                <legend class='Literal'>Informações Gerais</legend>
                <table width='500' Class='TextoNormal' >
			        <tr>
                    	<?php
						$palavra = $_POST['id_vara'];
						$sql=mysql_query("SELECT * FROM vara WHERE id_vara = '$palavra'");
                        $res=mysql_fetch_array($sql);
						
				        echo "<td width='130'>Nome:</td>
				        <td width='358'><input type='text' id='nome_vara' name='nome_vara' class='CampoTexto' MaxLength='50' value='".$res['nome_vara']."'>
						<input type='hidden' id='id_vara' name='id_vara' value='".$res['id_vara']."'></td>
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
