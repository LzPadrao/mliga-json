<html>
<head>
	<title>GRAVA SORTEIO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initialscale=1.0"> 
	<link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php 
header('content-type: text/html; charset=iso-8859-1');
	
	// VARIAVEIS QUE RECEBEM OS VALORES DE INPUT DO FORMULARIO DO SCRIPT EDITA.PHP
	$cA 		= 1;
	$j			= 0;
	$idSort  	= $_GET['nSort'];

	
	// CONEXAO
	include("conecta.php");
	$pdo = conectar();
		
	// GRAVACAO DOS DADOS NO BANCO
	$selecao 	= $pdo->query('SELECT * FROM tbtimes');	
	$selecao->execute();
	$linha		= $selecao->fetchAll(PDO::FETCH_OBJ);
	$TamAr		= $selecao->rowCount()-1;
	

	foreach ($linha as $list)
	{ 
		$list 	= $pdo->query('UPDATE tbtimes SET IdSorteio = "'.$idSort[$j].'" WHERE IdTime="'.$cA.'"');
		$list->execute();
		$cA++;
		$j++;

	}
	
	print_r($idSort)
	
?>	
</body>
</html>