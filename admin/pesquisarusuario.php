<?php
require_once("includes/conexao.php");

// A sess�o precisa ser iniciada em cada p�gina diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;

// Verifica se n�o h� a vari�vel da sess�o que identifica o usu�rio
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destr�i a sess�o por seguran�a
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
                                Pesquisar Usu�rio</td>
                        </tr>
                        <tr>
                            <td>
                              <fieldset class="Literal">
                                    <legend class="Literal">Informa��es Gerais</legend>
                                  <table width="100%" Class="TextoNormal" >					
                                    <tr>
                                        <td colspan="2" vAlign="top">
                                          <table cellSpacing="0" cellPadding="0" width="100%">
                                            <tr>
                                              <td class="TextoNormal">Nome:</td>
                                              <td width="90%" height="30">
                                              <form id="form1" name="form1" action="" method="post">
                                              <input type="text" id="nome" name="nome" class="CampoTexto">
                                              </td>
                                             </tr>
                                            <tr>
                                              <td class="TextoNormal">Ativo:</td>
                                              <td width="90%" height="30">
                                              <select id="ativo" name="ativo" class="CampoTexto">
                                                 <option value="0">-- Selecione --</option>
										<?php
                                        $sql_ativo = mysql_query("SELECT * FROM ativo ORDER BY id_ativo") or die(mysql_error());
										while($res_ativo = mysql_fetch_array($sql_ativo) ) {
                                        echo '<option value="'.$res_ativo['id_ativo'].'">'.$res_ativo['id_ativo'].' - '.$res_ativo['nome_ativo'].'</option>';
                                                        }
                                                    ?>
                                            </select>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td colSpan="2" height="30"><input type="submit" id="pesquisar" name="pesquisar" class="Botao" value="Pesquisar"><br>
                                              </td>
                                              </tr>
                                            <tr>
                                              <td colSpan="2"></td>
                                              </tr>
                                            <tr>
                                            <td align="left" colSpan="2" height="30"><label class="TextoVermelho10">Por Seguran�a n�o � permitido a exclus�o de usu�rios.<br> A Inativa��o impede a utiliza��o do sistema.&nbsp;
                                            </table>                                        </td>
                                    </tr>
                                    <tr class="TextoTopo" align="center">
                                    	<td width="30">Editar</td>
                                        <td width="70">Nome</td>
                                        <td width="70">E-mail</td>
                                        <td width="30">Ativo</td> 
                                    </tr>
									<?php
                                    if( $_SERVER['REQUEST_METHOD']=='POST' )  
											{  
									$where = Array();  
													  
									$nome = getPost('nome');  
									$ativo = getPost('ativo');  
													  
													  
									if( $nome ){ $where[] = " `nome` like '%$nome%'"; }  
									if( $ativo ){ $where[] = " `ativo` = '{$ativo}'"; }  
													  
									$sql = "SELECT * FROM usuarios ";  
									if( sizeof( $where ) )  
									$sql .= ' WHERE '.implode( ' AND ',$where );  
				  
									$sql_query = mysql_query($sql) or die (mysql_error());
									if (mysql_num_rows($sql_query)){ 
									while($res=mysql_fetch_array($sql_query)){
										
									$ativo = $res['ativo'];
									$sql2=mysql_query("SELECT * FROM ativo WHERE id_ativo = $ativo");
									$res2=mysql_fetch_array($sql2);
									
								echo "<form name='form1' method='post' action='info_usuario.php'><tr align='center'>
                                    <td><input type=image src='img/bt_editar.jpg' width='70' height='18'>
									<input name='id_usuario' type='hidden' id='id_usuario' value='".$res['id']."'>
									</form></td>
									<td><input name='nome' type='text' id='nome' class='CampoPesquisa' readonly size='70' value='".$res['nome']."'></td>
                                   	<td><input name='email' type='text' id='email' class='CampoPesquisa' readonly size='70' value='".$res['email']."' size='30'></td>
                                   	<td><input name='nome_ativo' type='text' id='nome_ativo' class='CampoPesquisa' readonly value='".$res2['nome_ativo']."'></td>
                                    </tr>";
										}
										}
										}
										//a cargo do leitor melhorar o filtro anti injection  
										function filter( $str ){  
											return addslashes( $str );  
										}  
										function getPost( $key ){  
											return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;  
										}
										?>
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