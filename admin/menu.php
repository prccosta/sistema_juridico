<?php 
require_once("includes/conexao.php");
$usuariologado = $_SESSION['UsuarioID'];

$sql = mysql_query("SELECT nivel FROM usuarios WHERE id = '$usuariologado'") or die(mysql_error());
while($res_usuario=mysql_fetch_array($sql)) {
$nivel = $res_usuario[0];
	}														
	switch ( $nivel ){
		case 1:
			include"inc_topmenu_user.php";
			break;
		case 2:
			include"inc_topmenu_est.php";
			break;
		case 3:
			include"inc_topmenu_adv.php";
			break;
		default:
			include"inc_topmenu.php";			
	}
		?>