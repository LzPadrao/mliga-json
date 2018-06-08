<?php
/*
	CODIGO NOME-SORTEIO.PHP
	ESCRITO POR-LUIZ GUSTAVO PADRAO FRANCA
	DATA-201610262036
	OBJETIVO-A PARTIR DE UMA PEDRA INICIAL DE SORTEIO O ALGORITMO APLICA UM SEQUENCIAL SIMPLES QUE PREENCHE A PEDRA DE SORTEIO PARA CADA TIME. O OBJETIVO É DINAMIZAR O SORTEIO
*/

// arrays envolvidos na operação
$ar1 		= array(4,'',2,'','','','','','',1);
$ar2		= array();
// variaveis numericas
$nTm1     	= count($ar1);
$nTm2		= 0;
$nPIni		= 3;
$nCi		= 0;
$nCj		= 0;

echo "Os arrays envolvidos na operacao sao: <br><br>Sorteio<br>";
print_r($ar1);
echo "<br>O array SORTEIO tem $nTm1 posicoes<br>";
echo "<br>Pedras Definidas<br>";
print_r($ar2);
echo"<br><br>";
echo "Dois contadores sao usados: <br>$nCi para o SORTEIO<BR>$nCj para PEDRAS DEFINIDAS <br><br>";
echo "Pedra inicial de sorteio: $nPIni <br><br>";

//TRECHO 1 - PREENCHO O ARRAY AR2 (PEDRAS DEFINIDAS) COM OS VALORES QUE JA ESTÃO INFORMADOS EM AR1
while ( $nCi <= ($nTm1-1)) 
{
	if($ar1[$nCi]<>"")
	{
		$ar2[$nCj]=$ar1[$nCi];
		$nCi++;
		$nCj++;
	}	
	else
	{
		$nCi++;
	}
}

$nTm2	= count($ar2);
$nCi	= 0;
$nCj	= 0;
echo "As pedras definidas sao<br>";
print_r($ar2);
echo "<br>O array PEDRAS DEFINIDAS tem $nTm2 posicoes";
echo "<br><br> $nCi eh o valor do contador i";
echo "<br> $nCj eh o valor do contador j";
// FIM DO TRECHO 1

// TRECHO 2 - VERIFICO SE O NUMERO DA PEDRA ESTÁ DENTRO DO AR2 (PEDRAS DEFINIDAS) SE ESTIVER NÃO É CONSIDERADO
while($nCi<=(count($ar1)-1))
{
 	//verifico de o numero da pedra está dentro de AR2
 	while($nCj<=(count($ar2)-1))
 	{
 		if($ar2[$nCj]==$nPIni)
 		{
 			$nPIni++;
 			$nCj++;
 		}
 		else
 		{
 			$nCj++;
 		}
 	}
 	
 	$nCj=0;

 	// preencho as posições do array que estão vazias
 	if($ar1[$nCi]=="")
 	{
 		// se nPIni for maior que o tamanho do array volta para 1
	 	if($nPIni>$nTm1)
	 	{
	 		$nPIni = 1;
	 	}

 		$ar1[$nCi]=$nPIni;
 		$nPIni++;
 		$nCi++;
 		// se nPIni for maior que o tamanho do array volta para 1
	 			if($nPIni>$nTm1)
	 			{
	 				$nPIni = 1;
	 			}
 	}
 	else
 	{
 		$nCi++;
 	}
}
// FIM DO TRECHO 2
	echo "<br><br>As pedras definidas sao<br>";
	print_r($ar2);
	echo "<br><br>O array AR1 preenchido eh<br>";
	print_r($ar1);

?>