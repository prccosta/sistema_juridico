<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
            <!--
            #paginacao{font-family: Verdana, Arial, Helvetica; font-size: 12px;  }
            .pgoff {color: #FF0000; text-decoration: none}
            a.pg {color: #003366; text-decoration: none}
            a:hover.pg { color: #0066cc; text-decoration:underline}
            -->
</style>
<?php
 
echo "<div id='paginacao'>";
    //Verificando se estamos na primeira p�gina se n�o estivetr ele imprime o bot�o de anterior e o numero da primeira p�gina
    //Se n�o ele desativa o bot�o de anterior e seta o indicador na primeira p�gina
    if ($pagina > 1) {
        echo '&nbsp;<a href="javascript:paginar(' . ($pagina - 2) . ',' . $paginas . ',' . $quant_resul . ')">&laquo; anterior</a>&nbsp;';
        echo '&nbsp;<a href="javascript:paginar(0,' . $paginas . ',' . $quant_resul . ')">1</a>&nbsp;';
    } else {
        echo "<font  color=#CCCCCC>&laquo; anterior</font>";
        echo "&nbsp;<span class='pgoff'>[1]</span>&nbsp;";
    }
    // imprimindo as demais p�ginas
 
 
    for ($i = $pagina; $i <= ($pagina + 1); $i++) {
        //imprindo o bot�o da p�gina antes da atual, ela necessita ser diferente da primeira p�gina
        if (($i - 1) == ($pagina - 1) and ($i - 1) != 1 and ($i != 1)) {
            echo '...&nbsp;<a href="javascript:paginar(' . ($i - 2) . ',' . $paginas . ',' . $quant_resul . ')">' . ($i - 1) . '</a>&nbsp;';
        }
        // verificando se estamos na primeira p�gina ou na ultima se estiver ele n�o imprime nada.
        if ($i == 1 or $i == $paginas or $i == $paginas) {
            echo"";
        }
        // se a p�gina for igual a p�gina atual ele seta o indicador na p�gina e desativa o bot�o
        elseif ($pagina == $i) {
            echo "&nbsp;<span class='pgoff'>[$i]</span>&nbsp;";
        }
        //imprimindo a p�gina ap�s a p�gina atual,
        elseif ($i < $pagina) {
            echo '&nbsp;<a href="javascript:paginar(' . $i - 1 . ',' . $paginas . ',' . $quant_resul . ')">' . $i . '</a>&nbsp;';
        }
        if (($i + 1) == ($pagina + 1) and ($i + 1) != $paginas and $i != $paginas) {
            echo '&nbsp;<a href="javascript:paginar(' . ($i) . ',' . $paginas . ',' . $quant_resul . ')">' . ($i + 1) . '</a>&nbsp;...';
        }
    }
    // verificando novamente se existe apenas a primeira p�gina, se so existir ela � impresso o bot�o proximo desativado
    if ($paginas == 1) {
        echo "";
        echo "<font  color=#CCCCCC>pr�ximo &raquo;</font>";
    }
    //verificando se a p�gina atual � diferente  da ultima p�gina se for diferente ele imprime a ultima p�gina e ativa o bot�o pr�ximo
    elseif ($pagina < $paginas) {
 
        echo '&nbsp;<a  href="javascript:paginar(' . ($paginas - 1) . ',' . $paginas . ',' . $quant_resul . ')">' . $paginas . '</a>';
        echo '&nbsp;<a href="javascript:paginar(' . ($pagina) . ',' . $paginas . ',' . $quant_resul . ')"><b>pr�ximo &raquo;</b></a>&nbsp;';
    }
    // se o sistema estiver na ultima p�gina o indicador � setado na p�gina e o bot�o pr�ximo � desativado
    else {
        echo "&nbsp;<span class='pgoff'>[" . $paginas . "]</span>&nbsp;";
        echo "<font  color=#CCCCCC>pr�ximo &raquo;</font>";
    }
 
echo "<div><br>";
?>