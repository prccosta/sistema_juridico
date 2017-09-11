<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
	<HEAD>
		<TITLE>Canut e Oliveira Lima Advogados Associados</TITLE>
		<link href="Styles.css" rel="stylesheet" type="text/css">
        <link href="css/out_Styles.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
			function FormataData(campo, teclapres)
			{
				var tecla = teclapres.keyCode;
				var vr = new String(campo.value);
				vr = vr.replace("/", "");
				tam = vr.length + 1;
				if (tecla != 8)
				{
					if (tam == 3)
						campo.value = vr.substr(0, 2) + '/';
					if (tam == 5)
						campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 4) + '/';
				}
			}
			function fone(obj,prox) {
				switch (obj.value.length) {
					case 1:
						obj.value = "(" + obj.value;
						break;
					case 3:
						obj.value = obj.value + ")";
						break;	
					case 8:
						obj.value = obj.value + "-";
						break;	
					case 13:
						prox.focus();
						break;
				}
			}
		</script>
	</HEAD>
	<BODY leftmargin="0" topmargin="0">
		<form name="frm_contato">
			<table width="100%" height="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center" valign="top">
						<table width="770" border="0" cellpadding="0" cellspacing="0">
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
									<table border="0" width="100%" cellpadding="0" cellspacing="0">
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
											<td width="536" valign="top">
												<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
													<tr>
														<td colspan="2" bgcolor="#b9b9b9"><font face="verdana" size="2" color="#ffffff"><b>&nbsp;&nbsp;&nbsp;:: 
																	Contatos</b></font></td>
													</tr>
													<tr>
														<td width='149' height='200' bgcolor='#e3e3e3' valign='top'><br>
															&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/contato.jpg"></td>
														<td bgcolor="#e3e3e3" align="justify" valign="middle">
															<table cellspacing="10">
																<tr>
																	<td class="textocinza10">
																		<br>
																		MENSAGEM ENVIADA!<BR>

<?php
//iremos declarar as variaveis que recebemos pelo método post<br />
//em alguns servidores nem precisamos declarar, depende do register_global=on ou =off<br />
//aqui você digita o e-mail a ser recebido os dados do formulário de contato
$seuemail = "contato@canuteoliveiralima.com.br";
$nome=utf8_decode($_POST['nome']);
$email=$_POST[email];
$empresa=utf8_decode($_POST['empresa']);
$telefone=$_POST[telefone];
$assunto = ":. Canut & Oliveira Lima Advogados Associados - CONTATO .:";
$mensagem=utf8_decode($_POST['mensagem']);
//agora vamos enviar todos esses dados usando a função mail<br />

mail("$seuemail","$assunto","

Nome: $nome
Email: $email
Empresa: $empresa
Telefone: $telefone
Mensagem: $mensagem","FROM:$seuemail;$seuemail;");

echo "<p class='wrapper'><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sua mensagem foi enviada com sucesso!<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clique <a href='contato.php'>aqui</a> para retornar ao formulário de contato</p>"; //aí mostramos no navegador da pessoa que enviou o email uma mensagem
?>
																	&nbsp;&nbsp;&nbsp;<br><br><br><br><br><br><br><br>
                                                                    <br><br><br><br><br><br><br><br></td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
											<td width="22" background="img/corpo_d.jpg">&nbsp;</td>
										</tr>
										<tr>
											<td align="right">&nbsp;</td>
											<td align="right"><img src="img/corpo_i.jpg"></td>
											<td align="right"><img src="img/corpo_id.jpg"></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</BODY>
</HTML>
