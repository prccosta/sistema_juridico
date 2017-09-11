<?php
function geraParcelas($numParcelas, $venc_parcelas) 

{

$venc_parcelas = "2010-11-10";

$numParcelas = "6";

$mesPgto = substr($venc_parcelas,6,2);

$meses = array();

$venc = strtotime($venc_parcelas);

for ($i = 0; $i <= $numParcelas-1; $i++)

{

$mesPgto += 1;

$mth = $mesPgto - 12;

$meses[$i] = date('Y-m-d', mktime(0,0,0,date('m',$venc) + $mth, date('d',$venc), date('Y',$venc)));

//print_r($meses);
echo $meses[$i]. "TESTE";
}
echo $meses[$i];
}

?>
