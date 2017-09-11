<?php
session_start();
require ("admin/includes/conexao.php");

?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<img src="img/linha.jpg" />
			<table cellSpacing="0" cellPadding="0" border="0">
            <form action="admin/validacao.php" method="post" name="login">
			    <tr>
			        <td colspan="2" height="5"></td>
			    </tr>
				<tr>
					<td class="TextoCinza10N">Login</td>
					<td><input type="text" name="usuario" id="usuario" size="12" /></td>
				</tr>
				<tr>
					<td class="TextoCinza10N">Senha</td>
					<td><input type="password" name="senha" id="senha" size="12" /></td>
                </tr>
				<tr>
					<td  colspan="2">
                    <input type="image" src="img/botao_ok.jpg" value="submit" align="right"><br />
                        </td>
				</tr>
			     <tr>
			        <td colspan="2" align="center" class="TextoPreto10N">Esqueci minha senha<br />
                    </td>
	            </tr>
	          </form>
              </table>
			<br /><img src="img/linha.jpg" />
<?php
					  if(isset($_SESSION['erro']))
					{						
						echo ' <script language="javascript"> alert("'.$_SESSION['erro'].'")</script>';
						session_destroy(); 
					}
?>