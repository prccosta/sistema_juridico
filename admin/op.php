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
        
        <noscript>
        	<!--[if IE]>
            	<link rel="stylesheet" href="css/ie.css">
            <![endif]-->
        </noscript>
                                       <?php
									   
									   // recebendo conteudo da página anterior, que vêm através do método post
										$pagina = $_POST['pagina'];
										$quant_resul = $_POST['quant_result'];
										$paginas = $_POST['paginas'];
										// calculando onde o limit deve começar no Select
										$start = $pagina * $quant_resul;
										$pagina++;
													  
											// segundo select com os valores já limitados pelo limite no sql
											$result = mysql_query("select * FROM devedor limit 0 , " . $quant_resul); 
/*											if( sizeof( $where ) )  
											$result .= ' WHERE '.implode( ' AND ',$where );
*/											
											include 'indice.php';
											
											 while ($res = mysql_fetch_array($result)) {
										
							
														echo "<form name='form1' method='post' action='info_devedor.php'><tr align='center'>
															<td><input type=image src='img/bt_editar.jpg' width='70' height='18'>
															<input name='id_devedor' type='hidden' id='id_devedor' value='".$res['id_devedor']."'>
															</form></td>
															<td><input name='id_devedor' type='text' id='id_devedor' class='CampoPesquisa' readonly value='".$res['id_devedor']."'></td>
															<td><input name='nome' type='text' id='nome' class='CampoPesquisa' readonly size='50' value='".$res['nome_dev']."'></td>
															<td><input name='cpf' type='text' id='cpf' class='CampoPesquisa' readonly value='".$res['cpf']."'></td>
															<td><input name='responsavel' type='text' id='responsavel' class='CampoPesquisa' readonly size='50' value='".$res['responsavel']."'></td>
															<td><input name='cpf_responsavel' type='text' id='cpf_responsavel' class='CampoPesquisa' readonly value='".$res['cpf_responsavel']."'></td>
															<td>";
															}
														?>
                                                
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
        </form>
</body>
</html>