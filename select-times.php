<?php
//declaracao das includes de conexão
include("conecta.php");
$pdo=conectar();

// SELECAO DE DADOS
$buscaTime 	= $pdo->prepare('SELECT * FROM tbtimes');
$buscaTime->execute();
	
	echo "TIMES CAMPEONATO<BR><BR>";
	$linha=$buscaTime->fetchAll(PDO::FETCH_OBJ);
	
	foreach ($linha as $list) 
	{
		echo "Time - ".$list->NomeTime;
		echo " - Id: ".$list->IdTime."<br>";
	}	
	
?>