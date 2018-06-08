<?php header('content-type: text/html; charset=UTF-8');?>

<?php
	// declaracao das includes de conexão
	include("conecta.php");
	$pdo=conectar();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec("set names utf8");

	// variavel que recebe o valor do INPUT html
	$categ = $_GET['categ'];

	if($categ == "")
	{
		echo "";
	}
	else
	{	
	// selecao no banco de dados com a palavra informada
	$ret = $pdo->query("SELECT IdTime,IdCategoria,IdSorteio,NomeTime,ImgTime,Representante,QtJogadores,Pontos,SdGol,QtVitorias,QtEmpates,QtDerrotas FROM tbtimes WHERE IdCategoria =".$categ." ORDER BY IdSorteio");
	$ret->execute();
	$qtReg = $ret->rowCount();
	$linha = $ret->fetchAll(PDO::FETCH_OBJ);

	if ($qtReg > 0) 
		{
			foreach ($linha as $lista) 
			{
				echo "<div class='box-time' id= '".$lista->IdTime."' name= '".$lista->NomeTime."'>";
				echo "<div class='box-imgtime' name='imgtime' id='imgtime'>";
				echo "<img class='conf-img' src='/megaliga/fotos/".$lista->ImgTime."'>";
				echo "</div>";
				echo "<div class='box-dettime'><span class='box-nmtime'>".$lista->NomeTime."</span><br><span class='box-rptime'> Representante:".$lista->Representante."</span><br><span class='box-pontos'> Pontos: ".$lista->Pontos."</span><br><span class='box-pontos'> Vit:".$lista->QtVitorias."  Emp:".$lista->QtEmpates."  Der:".$lista->QtDerrotas."</span></div>";
				echo "</div>";
				 
			}
		}	
		else
		{ 
			echo "<h4>Não há categoria cadastrada</h4>";
		}
	}
?>