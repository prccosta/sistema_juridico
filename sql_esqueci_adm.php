<?php
session_start();
require ("admin/includes/conexao.php");

$usuario = strtoupper($_POST['usuario']);
$email = strtoupper($_POST['email']);

?>
<HTML>
  <HEAD>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <TITLE>Canut e Oliveira Lima Advogados Associados</TITLE>
        <link href="css/out_Styles.css" rel="stylesheet" type="text/css">
  </HEAD>
<BODY leftmargin=o topmargin=0>
<form action="acesso_sistema.php" method="post" name="login">
	<table width="100%" height="100%" cellpadding=0 cellspacing=0>
		<tr >
			<td align=center valign=top>
				<table width=770 border=0 cellpadding=0 cellspacing=0>
					<tr>
						<td>
							<table border=0 cellpadding=0 cellspacing=0>
								<tr>
									<td colspan=3 height=187><img src="img/topo.jpg"></td>
								</tr>
								<?php include_once('inc_menu.php'); ?>
								<tr>
									<td colspan=3>
										<table cellSpacing="0" cellPadding="0" border="0">
	                                        <tr>
		                                        <td width="276" background="img/buscar.jpg" height="21" >&nbsp;
			                                        
		                                        </td>
		                                        <td width="472" height="21" background="img/buscar2.jpg">&nbsp;</td>
		                                        <td width="22" height="21"><IMG src="img/buscar3.jpg"></td>
	                                        </tr>
                                        </table>
									</td>
								</tr>
								<tr>
									<td colspan=3 height=20><img src="img/buscar_I.jpg"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table border="0"  width="100%" cellpadding=0 cellspacing=0>
								<tr>
									<td width=212 valign=top>
										<table border=0 width="100%" cellpadding=0 cellspacing=0>
											<tr>
												<td height=47 width=212 colspan=3><img src="img/detalhe_sub_S.jpg"></td>
											</tr>
											<tr>
												<td background="img/sub_e.jpg" width="31"><img src="img/sub_e.jpg"></td>
												<td width=148 height=142 bgcolor=#b9b9b9 valign=top><font face=verdana size=1 color=#636563><b>:: &Aacute;rea do Cliente</b></font>
												    
												
										          <p><?php include_once('login.php'); ?></p></td>
												<td background="img/sub_d.jpg" width="33"><img src="img/sub_d.jpg"></td>
											</tr>
											<tr>
												<td width=212 colspan=3><img src="img/sub_i.jpg"></td>
											</tr>
										</table>
									</td>
									<td width=536 valign=top>
										<table border=0 width="100%" height="100%" cellpadding=0 cellspacing=0>
											<tr>
												<td colspan=2 bgcolor=#b9b9b9><font face=verdana size=2 color=#ffffff><b>&nbsp;&nbsp;&nbsp;:: CANUT E OLIVEIRA LIMA Advogados Associados</b></font></td>
											</tr>
											<tr>
												<td width=16 height=200 bgcolor=#e3e3e3 valign=top><br>&nbsp;&nbsp;&nbsp;&nbsp;</td>
												<td width="520" align=center valign=middle bgcolor=#e3e3e3>
													<table cellSpacing="0" cellPadding="0" border="0">
                                                        <tr>
                                                            <td colspan="4" height="5" class="TextoCinza10N2"><br>
                                                          :: Área administrativa - Recupere sua senha<br><br></td>
                                                        </tr>
                                                        <tr>
                                                         <td colspan="4" height="25" class="TextoCinza10N2"><br>
                                                           Sua nova senha foi enviada com sucesso para o seu e-mail!</td>
                                                        </tr>
                                                        <tr>
                                                         <td colspan="4" class="TextoCinza10N"><br><br>
														 <?php 
															$sql_lembrar = "SELECT usuario, email FROM usuarios WHERE UCASE(usuario)='$usuario' and UCASE(email) ='$email'";
													
															$rs_lembrar = mysql_query($sql_lembrar);
															$ls_lembrar = mysql_fetch_array($rs_lembrar);
															$qtd_encontrado = mysql_num_rows($rs_lembrar);
															if($qtd_encontrado == 1) {
																$str = '';
																for ($i=1; $i<=10; $i++){
																	$set = array(rand (65,90),rand(97,122));
																	$str .= chr($set[rand(0,1)]);
																}
																$senha = $str;
																echo $senhass = "<br>Sua Nova Senha é : <b style=\"color:#006699;\">" . $senha . "</b><br><br><br>Para sua segurança, altere sua senha logo após o login em: Usuários / Alterar senha.";
																// Gerar nova senha
																mysql_query("UPDATE usuarios SET senha = MD5('$senha') WHERE usuario = '". $ls_lembrar['usuario'] ."'"); 
															}
															else { 
																echo $senhass = "Informações não Encontradas!"; 
															}
															//iremos declarar as variaveis que recebemos pelo método post<br />
															//em alguns servidores nem precisamos declarar, depende do register_global=on ou =off<br />
															//aqui você digita o e-mail a ser recebido os dados do formulário de contato
															$seuemail = "contato@canuteoliveiralima.com.br";
															$assunto = ":. Recuperação de senha - Canut & Oliveira Lima Advogados Associados .:";
															//agora vamos enviar todos esses dados usando a função mail<br />
															
															mail("$email","$assunto","
															
Prezado(a) Senhor(a),

Sua nova senha é $senha


Para sua segurança, altere sua senha logo após o login em Usuários / Alterar senha.

Agradecemos seu contato.

Equipe Canut & Oliveira Lima Advogados Associados.","FROM:$seuemail;$seuemail;");
														 ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="TextoCinza10N" colspan="4">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="TextoCinza10N" colspan="4"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="TextoCinza10N" colspan="4"><br>
                                                            <input type="image" src="img/bt_Voltar.jpg" value="submit" align="center"><br />
                                                                </td>
                                                        </tr>
                                                         <tr>
                                                            <td colspan="4" align="center" class="TextoPreto10N"><br />
                                                            </td>
                                                        </tr>
                                                      </table>
													<p align= justify><br><br>
													<p align= justify><br><br><br>
                        <CENTER></CENTER>
													</td>
											</tr>
										</table>
									</td>
									<td width=22 background="img/corpo_d.jpg">&nbsp;</td>
								</tr>
								<tr>
									<td align=right>&nbsp;</td>
									<td align=right><img src="img/corpo_i.jpg"></td>
									<td align=right><img src="img/corpo_id.jpg"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	</form>
<?php
					  if(isset($_SESSION['erro']))
					{						
						echo ' <script language="javascript"> alert("'.$_SESSION['erro'].'")</script>';
						session_destroy(); 
					}
?>
</BODY>
</HTML>
