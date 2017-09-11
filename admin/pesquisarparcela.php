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
    <script src="js/formulas.js" type="text/javascript"></script>
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
                                Pesquisar Parcela</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                  <legend class="Literal">Informações Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >					
                                    <form id="form1" name="form1" action="" method="post">
                                    <tr>
                                        <td colspan="2" vAlign="top" >
                                          <table Class="TextoNormal" width="350">
                                            <tr>
                                              <td>Nº Parcela:</td>
                                              <td width="215"><input id="parcela_atual" name="parcela_atual" class="CampoTexto"></td>
                                              </tr>
                                            <tr>
                                              <td>Processo:</td>
                                              <td width="215"><select id="id_processo" name="id_processo" class="CampoTexto">
                                                 <option value="0">-- Selecione --</option>
                                                    <?php
                                                        $sql_processo = mysql_query("SELECT id_processo, processo FROM processo ORDER BY processo");
														 while($res_processo = mysql_fetch_array($sql_processo) ) {
                                                         echo '<option value="'.$res_processo['id_processo'].'">'.$res_processo['processo'].'</option>';
                                                        }
                                                    ?>
                                            </select></td>
                                              </tr>
                                            <tr>
                                              <td width="123">Devedor:
                                                </td>
                                              <td width="215"><input id="devedor" name="devedor" class="CampoTexto" list="devedores">
                                              <datalist id="devedores">
												<?php
												$sql_id_devedor = mysql_query("SELECT * FROM devedor");
												while($res_id_devedor = mysql_fetch_array($sql_id_devedor) ) {
                                                echo '<option value="'.$res_id_devedor['id_devedor']." - ".$res_id_devedor['nome_dev'].'">'.$res_id_devedor['nome_dev'].'</option>';
                                                        }
												?>
                                              </datalist></td></tr>
                                            <tr>
                                              <td style="height: 20px"><br><input type="submit" id="pesquisar" class="Botao" value=" Pesquisar "></td>
                                              </tr>
                                            
                                            </form>
                                            </table>                                        </td>
                                      </tr>
                                      <tr><td colspan="2">
                                      <table width="100%">
                                      	<TR class="TextoTopo" align="center">
                                        	<TD width="7%">Editar</TD>
                                        	<TD width="23%">Código | Devedor</TD>
                                        	<TD width="24%">Código | Processo</TD>
                                        	<TD width="9%">Parcela Atual</TD>
                                        	<TD width="9%">Tipo Acordo</TD>
                                        	<TD width="10%">Valor</TD>
                                        	<TD width="9%">Vencimento</TD>
                                        	<TD width="10%">Status</TD> 
                                        </TR>
     <?php
	$id_proc_processo = $_POST['id_proc_processo'];
	
	if( $_SERVER['REQUEST_METHOD']=='POST' )  
		{  
	$where = Array();  
	
	if ($id_proc_processo <> ''){
		$id_processo = $id_proc_processo;
		} else {
		$id_processo = getPost('id_processo');
		}
	$parcela_atual = getPost('parcela_atual');
	
	$id_devedor_temp = getPost('devedor');  
	$id_devedor_x = explode(" - ",$id_devedor_temp);
	$devedor = $id_devedor_x[0];
	
	if( $id_processo ){ $where[] = " `id_proc_processo` = '$id_processo'"; }  
	if( $parcela_atual ){ $where[] = " `parcela_atual` = '$parcela_atual'"; }  
	if( $devedor ){ $where[] = " `id_dev_devedor` = '$devedor'"; }  
												  
	$sql = "SELECT * FROM parcela ";  
	if( sizeof( $where ) )  
	$sql .= ' WHERE '.implode( ' AND ',$where );
	$sql .= ' order by parcela_atual ';
													  
	$sql_query = mysql_query($sql) or die (mysql_error());
	if (mysql_num_rows($sql_query)){ 
	while($res=mysql_fetch_array($sql_query)){
														
	$id_processo_temp = $res['id_proc_processo'];
	$id_parcela = $res['id_parcela'];
	$status_parcela = $res['status_parcela'];
	$sql2 = mysql_query("SELECT a.id_processo, a.processo, a.devedor, a.tipoacordo, b.id_cli_cliente, b.id_devedor, b.nome_dev, c.nome_st_parcela
		FROM processo as a
		LEFT JOIN devedor as b ON a.devedor = b.id_devedor
		LEFT JOIN status_parcela as c ON $status_parcela = c.id_status
		WHERE a.id_processo = $id_processo_temp") or die (mysql_error());
		$res2 = mysql_fetch_array($sql2);

		echo "<form name='form1' method='post' action='editar_parcela.php'>
		<table width='100%'>
		<tr align='center'>
		<td><input type='image' src='img/bt_editar.jpg' width='70' height='18'>
		<input id='id_parcela' type='hidden' name='id_parcela' value='".$res['id_parcela']."'>
		</form></td>
		<td><input name='id_devedor' type='text' name='id_devedor' class='CampoForm' readonly value='".$res2['id_devedor']." | ".$res2['nome_dev']."'></td>
		<td><input name='id_processo' type='text' id='id_processo' class='CampoForm' readonly value='".$res2['id_processo']." | ".$res2['processo']."'></td>
		<td><input name='parcela_atual' type='text' id='parcela_atual' class='CampoForm2' readonly value='".$res['parcela_atual']."'></td>
		<td><input name='tipoacordo' type='text' id='tipoacordo' class='CampoForm2' readonly value='".$res2['tipoacordo']."'></td>
		<td><input name='vlparcela' type='text' id='vlparcela' class='CampoForm2' readonly value='".$res['vlparcela']."' onkeyup='numMoeda2(event,this);'></td>
		<td><input name='dtvenc' type='text' id='dtvenc' class='CampoForm2' readonly value='".date_format(new DateTime($res['dtvenc']), "d/m/Y")."'></td>
		<td><input name='status_parcela' type='text' id='status_parcela' class='CampoForm2' readonly value='".$res2['nome_st_parcela']."'></td>
		</tr></table>";
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
                                </td></tr></table>
                                
                            
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