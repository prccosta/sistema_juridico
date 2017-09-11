<?php 
require_once("../includes/conexao.php");

$db = mysql_select_db("adv_bd"); 
?> 

<?php

$selec = "SELECT * FROM usuarios ORDER BY nome ASC"; 
$exec = mysql_query($selec) or die(mysql_error()); 

/*// Configuração do script
// ========================
$_BS['PorPagina'] = 20; // Número de registros por página

// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante
if (!isset($_GET['consulta'])) {
header("Location: grid.php");
exit;
}
// Se houve busca, continue o script:

// Salva o que foi buscado em uma variável
$busca = $_GET['consulta'];
// Usa a função mysql_real_escape_string() para evitar erros no MySQL
$busca = mysql_real_escape_string($busca);

// ============================================

// Monta a consulta MySQL para saber quantos registros serão encontrados
$sql = "SELECT COUNT(*) AS total FROM `usuarios` WHERE (`ativa` = 1) AND ((`login` LIKE '%".$busca."%') OR ('%".$busca."%'))";
// Executa a consulta
$query = mysql_query($sql);
// Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
$total = mysql_result($query, 0, 'total');
// Calcula o máximo de paginas
$paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);

// ============================================

// Sistema simples de paginação, verifica se há algum argumento 'pagina' na URL
if (isset($_GET['pagina'])) {
$pagina = (int)$_GET['pagina'];
} else {
$pagina = 1;
}
$pagina = max(min($paginas, $pagina), 1);
$inicio = ($pagina - 1) * $_BS['PorPagina'];

// ============================================

// Monta outra consulta MySQL, agora a que fará a busca com paginação
$sql = "SELECT * FROM `usuarios` WHERE (`ativa` = 1) AND ((`login` LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY `id` DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];
// Executa a consulta
$query = mysql_query($sql);

// ============================================

// Começa a exibição dos resultados
echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";
// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>

echo "<ul>";
while ($resultado = mysql_fetch_assoc($query)) {
$titulo = $resultado['titulo'];
$texto = $resultado['texto'];
$link = 'http://www.meusite.com.br/noticia.php?id=' . $resultado['id'];
echo "<li>";
echo '<a href="'.$link.'" title="'.$titulo.'">'.$titulo.'</a><br />';
echo date('d/m/Y H:i', strtotime($resultado['cadastro']));
echo '<p>'.$texto.'</p>';
echo '<a href="'.$link.'" title="'.$titulo.'">'.$link.'</a>';
echo "</li>";
}
echo "</ul>";

// ============================================

// Começa a exibição dos paginadores
if ($total > 0) {
for($n = 1; $n <= $paginas; $n++) {
echo '<a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
}
}
*/

?> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<STYLE type="text/css"> 
td { 
border-style: solid; 
border-width: 1px solid #cccccc; 
font-family: Tahoma, verdana, arial, sans-serif; 
font-size: 12px; 
padding: 0px; 
} 
</STYLE> 

<SCRIPT src="TableCtrl.js"></SCRIPT> 

<BODY onload="init('tblGrid')"> 

<TABLE cellpadding="0" cellspacing="0" border="1" id="tblGrid" name="tblGrid" style="border:1px solid #f9f9f9;"> 

<THEAD> 
<TR bgcolor="#F9F9F9">
<TD width="200">ID (ordenar por n&uacute;mero)</TD>
<TD width="200">Nome (ordenar por nome)</TD> 
<TD width="200">Login (ordenar por n&uacute;mero)</TD> 
</TR> 
</THEAD> 

<TBODY> 

<?php 
while($dados=mysql_fetch_array($exec)) { 
echo "<TR>"; 
echo "<TD>".$dados['id']."</TD>";
echo "<TD>".$dados['nome']."</TD>"; 
echo "<TD>".$dados['usuario']."</TD>"; 
echo "</TR>"; 
} 
?> 
</TBODY> 
</TABLE>