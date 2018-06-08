<html>
<head>
	<title>LISTAGEM DADOS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initialscale=1.0"> 
	<link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
header('content-type: text/html; charset=iso-8859-1');

//declaracao das includes de conexão
include("Conecta.php");
$pdo=conectar();

// SELECAO DE DADOS
$buscaTime 	= $pdo->prepare('SELECT * FROM tbtimes WHERE IdCategoria = 7');
$buscaTime->execute();
$qtTimes 	= $buscaTime->rowCount();
$rodadas	= $qtTimes-1;
$linha		= $buscaTime->fetchAll(PDO::FETCH_OBJ);
?>

<section class="panel col-lg-4">

<?php
	if ($qtTimes > 0) {
?>
<form metod="post" action="grava-sorteio.php">
<table class="table table-striped table-condensed table-hover" align="center">
	<tbody>
		<tr>
			<th><i class="icon_profile"></i></th>
			<th><i class="icon_profile"></i>Time</th>
			<th><i class="icon_profile"></i>N.Sorteio</th>
		<!-- <th><i class="icon_profile"></i>Edicao</th> -->
		</tr>
		<?php
		foreach ($linha as $lista) {
		?>
		<tr>
			<td><input name="idTime" type="hidden" value="<?php echo $lista->IdTime?>"</td>
			<td><?=$lista->NomeTime?></td>
			<td><input name="nSort[]" type="text" value="" size="3"></td>
		</tr>
<?php } ?>
	</tbody>
	<td><input type="submit" value="Gravar"></td>
	<td><input type='hidden' name='btnOK' value='1'></td>
</table>
	
</form>
<?php } else{ ?>
<h4>Nao foram encontrados registros com essa palavra.</h4>
<?php } ?>
</section>

	<!-- echo "SORTEIO TIMES<BR><BR>"; 
	$linha=$buscaTime->fetchAll(PDO::FETCH_OBJ);
	
	foreach ($linha as $list) 
	{
		echo "Time - ".$list->NomeTime;
		echo " - Id: ".$list->IdTime."<br>";
	}-->	
</body>
</html>