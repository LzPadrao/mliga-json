<?php
/*
	CODIGO NOME-RODADA.PHP
	ESCRITO POR-LUIZ GUSTAVO PADRAO FRANCA
	DATA-201701122220
	OBJETIVO-A PARTIR DE UM ARRAY DEFINO OS SORTEIOS DOS ENFRENTAMENTOS EM CADA RODADA
	ANOTAÇÕES:
	$a % $b Módulo Resto de $a dividido por $b. 
*/

// arrays envolvidos na operação
$ar1 		= array(); 		//recebe os dados de entrada
$ar2		= array("Atletico MG","Barcelona","Chapecoense","Divinopolis FC","Esmeraldas EC","Figueirense","Goias","Higino Cruz","Internacional","Democrata SL","Bela Vista SC","Clube Remo"); //entrada de dados

// variaveis numericas
$nTm     	= count($ar2); 	// quantidade de times. Também define o tamanho do array
$nJogos		= $nTm/2; 		// quantidade de jogos por rodada
$nRod 		= $nTm-1; 		// quantidade de rodadas no campeonato o valor dessa variavel não pode alterar pois é utilizada no loop de reposicionamento
$nCnt		= 0; 			// Contador do loop de reposicionamento do array
$i 			= 0; 			// Contador de repetição das rodadas do campeonato

// variaveis char - VARIAVEIS DE MANIPULAÇÃO
$cPsAtu		= "";
$cPsPos		= "";

// Sendo uma quantidade ímpar de times é inserida a FOLGA.
if ($nTm%2 != 0)
{
	array_push($ar2,"FOLGA");
	$nRod+=1;
	$nTm+=1;
	$nJogos=$nTm/2;
}

echo " O array tem $nTm TIMES <br>";
for ($i=0;$i<=$nTm-1;$i++)
{
	echo("Id ".$i." - ".$ar2[$i]."<br>");
}

$i=0;
echo "<br>";
echo " $nRod são as rodadas no campeonato<br>";
echo " $nJogos Jogos acontecerão por rodada<br>";
echo "<br>Times<br>";

// INICIO - O loop é executado conforme a quantidade de rodadas
for ($i=0;$i<=$nTm-2;$i++) 
{ 
	// Na posição ZERO é recebido o array conforme sorteio para formação da primeira rodada
	if($i == 0)
	{
		$ar1[$i]=$ar2;
	}
	else
	{
	//REPOSICIONA OS ITENS DO ARRAY
		for($nCnt=0;$nCnt<=$nTm-1;$nCnt++)
		{
			if($nCnt == 0)
			{
				$ar1[$i][$nCnt]	= $ar1[$i-1][$nCnt];
			}	
			if($nCnt == 1)
			{
				$cPsPos = $ar1[$i-1][$nCnt];
			}
			if($nCnt >= 2 && $nCnt <= $nTm-2) 
			{
				$cPsAtu 		= $ar1[$i-1][$nCnt];
				$ar1[$i][$nCnt]	= $cPsPos;
				$cPsPos 		= $cPsAtu;
			}
		 	if($nCnt == $nTm-1)
		 	{
		 		$cPsAtu 			= $ar1[$i-1][$nCnt];
				$ar1[$i][$nCnt]		= $cPsPos;
				$ar1[$i][1]			= $cPsAtu;
		 	}
			
		} 
		//FIM DA REPOSICAO DO ARRAY
		
		ksort($ar1[$i]); //ORDENO O ARRAY SECUNDARIO PARA FAZER O INSERT
	}	
	
}
for ($a=0; $a<=$nTm-2;$a++) 
	{
	$rd = $a+1;
	echo "RODADA - ".$rd;
	echo "<br>";
		for ($b=0;$b<=$nTm-1;$b++)
		{ 
			echo("id ".$b." - Time: ".$ar1[$a][$b]."<br>");
		}
	echo "<br>";
	}

echo"<br><br><br>";
$i = 0;
$j = 0;
$nTjog = 1;

for ($i=0;$i<=$nRod-1;$i++) 
{
$nRd = $i+1;
echo "<table width = '400' border='1' cellspacing='0' cellpadding='0'><tr><td width = '30'>ROD</td><td width = '30'>N.JG</td><td width = '100'>DATA</td><td width = '120'>MANDANTE</td><td width = '30'>X</td><td width = '120'>VISITANTE</td></tr>"; 
echo "<br>";	
for($j=0;$j<=$nJogos-1;$j++)
	{
		echo "<table width = '400' border='1' cellspacing='0' cellpadding='0'><tr><td width = '30'>".$nRd."</td><td width = '30'>".$nTjog."</td><td width = '100'>DD/MM/AA</td><td width = '120'>".$ar1[$i][$j]."</td><td width = '30'>X</td><td width = '120'>".$ar1[$i][($nTm-1)-$j]."</td></tr>";	
		$nTjog++;
	}
}

?>
