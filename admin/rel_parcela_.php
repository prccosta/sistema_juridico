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
		</script>
        <noscript>
        	<!--[if IE]>
            	<link rel="stylesheet" href="css/ie.css">
            <![endif]-->
        </noscript>
    <form id="form1">
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
                                Relatório de Parcela</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >					
                                        <tr>
                                            <td vAlign="middle" align="left" >
                                                <table width="400"  class="TextoNormal" >
                                                <tr>
                                                    <td width="36%" >Cliente:</td>
                                                    <td width="64%">
                                                        <select name="escolas" id="escolas" class="CampoTexto">
                                                             <option value=""></option>
                                                                <?php
                                                                    $sql = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY nome_cliente";
                                                                    $res = mysql_query( $sql );
                                                                    while ( $row = mysql_fetch_assoc( $res ) ) {
                                                                        echo '<option value="'.$row['id_cliente'].'">'.$row['nome_cliente'].'</option>';
                                                                    }
                                                                ?>
                                                           </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Data Pgto Inicial:</td>
                                                    <td>
                                                        <input type="text" ID="datamenor" class="CampoTexto" Width="126px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Data Pgto Final:</td>
                                                    <td><input type="text" ID="datamaior" class="CampoTexto" Width="126px"></td>
                                                </tr>
                                                <tr>
                                                    <td colSpan="2"><input type="button" id="btPesquisar" value="Pesquisar" class="Botao" OnClientClick="return confirm('Essa pesquisa pode levar alguns minutos. \n\tDeseja continuar?') ">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colSpan="2"><br>
                                                    	<img src="img/ico_excel.gif" width="28" height="28" alt="Exportar como Excel">
                                                        <img src="img/ico_word.gif" width="28" height="28" alt="Exportar como Word"></td>
                                                </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <TR class="TextoTopo" align="center">
                                                            <TD>Cliente</TD>
                                                            <TD>Devedor</TD> 
                                                            <TD>campo3</TD>
                                                            <TD>campo4</TD>
                                                            <TD>campo5</TD>
                                                            <TD>campo6</TD>
                                                            <TD>campo7</TD>
                                                            <TD>campo8</TD> 
                                                </TR>
                                                <tr align="center">
                                                	<td>Priscila Ribeiro da Costa</td>
                                                    <td>Priscila Ribeiro da Costa</td>
                                                    <td>Priscila Ribeiro da Costa</td>
                                                    <td>Priscila Ribeiro da Costa</td>
                                                    <td>Priscila Ribeiro da Costa</td>
                                                    <td>Priscila Ribeiro da Costa</td>
                                                    <td>Priscila Ribeiro da Costa</td>
                                                    <td>Priscila Ribeiro da Costa</td>
                                                </tr>
                                    </table>
                                </fieldset>
                            </td>
                            </tr>
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