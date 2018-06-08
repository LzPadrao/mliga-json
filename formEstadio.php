<!DOCTYPE html>

<?php
//chama arquivo de conexão
include("conecta.php");
$pdo=conectar(); 

//seleciona os dados na tabela
$qry_campeonato = $pdo->prepare("SELECT IdCampeonato,NomeCamp FROM tbcampeonato");
$qry_campeonato->execute();
$linha=$qry_campeonato->fetchAll(PDO::FETCH_OBJ);
?>
<html lang="pt-br"> 
<head>
	<title>ML :: Estadio</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initialscale=1.0">
	<link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
</head> 
<body> 
<script src="js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<div class="col-md-10">
<form id="Estadio" name="CadastraEstadio" method="post" action="gravaEstadio.php" enctype='multipart/form-data'>
<fieldset>
<legend><h1>CADASTRO ESTADIO</h1></legend>
<div class="form-group row">
	<div class="col-md-9">
		<label>Selecione o campeonato : </label> 
			<select class="form-control"  name="TbCamp" id="TbCamp">
				<option>Selecione...</option>
				<!-- iteração do PHP para preencimento da SELECT -->
				<?php foreach ($linha as $list){ ?>
				<option value="<?php echo "$list->IdCampeonato"?>"><?php echo "$list->NomeCamp"?></option>  
				<?php } ?>
			</select>
			<span class='msg-erro msg-camp'></span>
	</div>
</div>
<div class="form-group row">
	<div class="col-md-9">
		<label for="NmEstad">Nome Estadio : </label> 
		<input class= "form-control" name="NomeEstad" type="text" id="NmEstad" size="55" maxlength="20" placeholder="Informe o nome do estádio">
		<span class='msg-erro msg-nome'></span>
	</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label for="Compr">Comprimento : </label>
<input class="form-control" name="ComprEstad" type="text" id="Compr" placeholder="Informe a medida EX: 50.4">
<span class='msg-erro msg-compr'></span>
</div>
<div class="col-md-3">
<label for="Larg">Largura : </label> 
<input class="form-control" name="LargEstad" type="text" id="Larg" placeholder="Informe a medida EX: 50.4">
<span class='msg-erro msg-larg'></span>
</div>
<div class="col-md-3">
<label for="CapTorc">Capacidade Torcida : </label> 
<input class="form-control" name="CapTorcida" type="text" id="CapTorc" size="55" maxlength="20" placeholder="Informe a capacidade de torcida">
<span class='msg-erro msg-torc'></span>
</div>
</div>
</fieldset>
<fieldset>
<legend><h3>IMAGENS ESTADIO</h3></legend>
<div class="container row fluid">
	<div class="col-md-6">
		<div class="col-md-4">
			<a href="#" class="thumbnail">
			<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="ImgEst1">
			</a>
		<input name="Est1" type="file" id="Est1"> 
		</div>
	</div>
	<div class="col-md-6">
		<div class="col-md-4">
			<a href="#" class="thumbnail">
			<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="ImgEst2">
			</a>
		<input name="Est2" type="file" id="Est2"> 
		</div>
	</div>
</div>
<br>
<div class="container row fluid">
	<div class="col-md-6">
		<div class="col-md-4">
			<a href="#" class="thumbnail">
			<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="ImgEst3">
			</a>
		<input name="Est3" type="file" id="Est3"> 
		</div>
	</div>
	<div class="col-md-6">
		<div class="col-md-4">
			<a href="#" class="thumbnail">
			<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="ImgEst4">
			</a>
		<input name="Est4" type="file" id="Est4"> 
		</div>
	</div>
</div>
</fieldset>
<input type="hidden" name = "acao" value="incluir">
<button type="submit" class="btn btn-primary" id='botao'>Gravar</button>
</p> 
</form> 
</div>
<script type="text/javascript" src="/megaliga/js/vld-estadio.js"></script>
</body> 
</html> 