<?php

//OBS: Vc pode testar usando o print_r(), basta descomentar esta linha e comentar a de baixo.

//Segue o código em programação estruturada:

$data_hoje = "2013-02-01";
$venc_parcelas = $data_hoje;

$numParcelas = 6;

$mesPgto = substr($venc_parcelas,5,1);

$meses = array();

$venc = strtotime($venc_parcelas);

//print $mesPgto; break;

for ($i = 0; $i <= $numParcelas - 1; $i++) {

$mesPgto += 1;

$mth = (int)$mesPgto;

$meses[$i] = date('Y-m-d', mktime(0,0,0,date('m',$venc) + $mth, date('d',$venc), date('Y',$venc)));
$parcela[$i] = $i + 1;

print "<input type='text' name='numParcelas' value=".$meses[$i]."&nbsp;|&nbsp;".$parcela[$i]."><br>";

}

?>