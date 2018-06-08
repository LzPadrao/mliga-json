<?php header('content-type: text/html; charset=UTF-8');?>

<?php
	// declaracao das includes de conexão
	include("conecta.php");
	$pdo=conectar();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec("set names utf8");

	// variavel que recebe o valor do INPUT html
	$camp = $_GET['camp'];

	if($camp == "")
	{
		echo "";
	}
	else
	{	
	// selecao no banco de dados com a palavra informada
	$busca = $pdo->query('SELECT IdCategoria,IdCampeonato,NomeCateg,AbrevCateg FROM  tbcategoria WHERE IdCampeonato ='.$camp);
	$busca->execute();
	$qtReg = $busca->rowCount();
	$linha = $busca->fetchAll(PDO::FETCH_OBJ);

	if ($qtReg > 0) 
		{
			foreach ($linha as $lista) 
			{
				echo "<div class='caixa-opc' onclick='showCat(this.id)' name='".$lista->NomeCateg."' id='".$lista->IdCategoria."'>".$lista->NomeCateg."</div>";
			}
		}	
		else
		{ 
			echo "<h4>Nao foram encontrados registros com essa palavra.</h4>";
		}
	}
?>