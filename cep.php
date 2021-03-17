<?php
 function calculaFrete(
        $cepOrigem,
        $cepDestino,
        $peso,
        $valor,
        $tipoFrete,
        $altura=6,
        $largura=20,
        $comprimento=20)
    {
        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
        $url .= "nCdEmpresa=";
        $url .= "&sDsSenha=";
        $url .= "&sCepOrigem=".$cepOrigem;
        $url .= "&sCepDestino=".$cepDestino;
        $url .= "&nVlPeso=".$peso;
        $url .= "&nVlLargura=".$largura;
        $url .= "&nVlAltura=".$altura;
        $url .= "&nCdFormato=1";
        $url .= "&nVlComprimento=".$comprimento;
        $url .= "&sCdMaoPropria=n";
        $url .= "&nVlValorDeclarado=".$valor;
        $url .= "&sCdAvisoRecebimento=n";
        $url .= "&nCdServico=".$tipoFrete;
        $url .= "&nVlDiametro=0";
        $url .= "&StrRetorno=xml";

       $xml = simplexml_load_file($url);

            return $xml->cServico;
    }

//sedex:40010 pac:41106

    $val = (calculaFrete(
        '17800000',
        '13425010',
        2,
        0,
        '40010'));

echo 'Valor Frete = R$ '.$val->Valor; 
echo 'Prazo Entrega:' .$val->PrazoEntrega;

    ?>