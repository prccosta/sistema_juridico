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
												<td width=148 height=142 bgcolor=#b9b9b9 valign=top><font face=verdana size=1 color=#636563><b>:: &Aacute;rea Administrativa</b></font>
												    
												
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
																		Endereço:
																		<BR>
																		&nbsp;&nbsp;&nbsp;Avenida Erasmo Braga, 227, 1203
																		<BR>
																		&nbsp;&nbsp;&nbsp;Rio de Janeiro - RJ - Brasil CEP: 20020-000
																		<br>
																		Telefone:
																		<br>
																		&nbsp;&nbsp;&nbsp;+55 (21) 25244055
																	</td>
																</tr>
															</table>
															<table height="245">
															<form name="frm_contato" action="enviar_contato.php" method="post">
																	<td><font class="textocinza11">Nome*:</font></td>
																	<td>
																	  <input type="text" name="nome" id="nome" size="30">
																		</td>
																</tr>
																<tr>
																	<td><font class="textocinza11">E-mail*:</font></td>
																	<td>
																	  <input type="text" name="email" id="email" size="30">
																		</td>
																</tr>
																<tr>
																	<td><font class="textocinza11">Empresa:</font></td>
																	<td>
																	  <input type="text" name="empresa" id="empresa" size="30">
																		</td>
																</tr>
																<tr>
																	<td><font class="textocinza11">Telefone:</font></td>
																	<td><input name="telefone" type="text" id="telefone" size="30" maxlength="13" onkeyup="fone(this,event)" class="tabela">
																		</td>
																</tr>
																<tr>
																	<td valign="top" style="height: 130px"><font class="textocinza11">Mensagem*:</font></td>
																	<td style="height: 130px"><label for="msg"></label>
																	  <textarea name="mensagem" id="mensagem" cols="30" rows="5"></textarea>
																		</td>
																</tr>
																<tr>
																	<td><input type="submit" class="botao" value="Enviar"></td>
																	<td align="center">
																		&nbsp;&nbsp;&nbsp;
																		<input type="reset" class="botao" value="Limpar"></td>
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
