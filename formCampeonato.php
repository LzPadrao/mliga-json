<!DOCTYPE html>
<html lang="pt-br"> 
<head>
	<meta charset="UTF-8"/>
	<title>MegaLiga :: Campeonatos</title>
	<link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
</head> 
<body>
<div class="col-md-8">
<fieldset>
<legend><h1>CADASTRO CAMPEONATO</h1></legend> 
<form id="Campeonato" name="CadastraCampeonato" method="post" action="gravaCampeonato.php" enctype='multipart/form-data'>
<fieldset>
<div class="form-group row">
<div class="col-xs-8">
	<label for="NmCamp">Nome Campeonato : </label> 
	<input class="form-control"name="NomeCamp" type="text" id="NmCamp" size="40" maxlength="60">
	<span class='msg-erro msg-nome'></span>
</div>
</div>
<div class="form-group row">
<div class="col-xs-3">
	<label for="DtIni">Data Inicio : </label>
	<input class="form-control" name="DataIni" type="text" id="DtIni">
	<span class='msg-erro msg-data_ini'></span>
</div>
<div class="col-xs-3">
	<label for="DtFim">Data Final : </label> 
	<input class="form-control" name="DataFim" type="text" id="DtFim">	
	<span class='msg-erro msg-data_fim'></span>
</div>
<div class="col-xs-2">
	<label for="StCamp">Situacao :</label>
	<select class="form-control" name="SitCamp" id="StCamp">
		<option value=""></option>
		<option value="Andamento">Andamento</option>
		<option value="Encerrado">Encerrado</option>
	</select>
	<span class='msg-erro msg-situacao'></span>
</div>
</div>
<fieldset>
<legend>Logomarca Campeonato</legend>
<div class="row">
<label for="ArqLogo">Selecionar Foto</label>
<div class="col-md-4">
	<a href="#" class="thumbnail">
	<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="img-campeonato">
	</a>
</div>
<input name="LogoCamp" type="file" id="ArqLogo" value="LogoCamp"> 
</div>
</fieldset>
</p>
</fieldset>
<br>
<fieldset>
<legend>Patrocinadores</legend>
<p>
<!-- PATROCINADOR 1 -->
<div class="row">
<label for="Patr1">Selecione patrocinador 1</label>
<div class="col-md-4">
	<a href="#" class="thumbnail">
	<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="img-patr1">
	</a>
</div>
<input name="ImgPatr1" type="file" id="Patr1" value="ImgPatr1">
</div>
<!-- PATROCINADOR 2 -->
<div class="row">
<label for="Patr2">Selecione patrocinador 2</label>
<div class="col-md-4">
	<a href="#" class="thumbnail">
	<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="img-patr2">
	</a>
</div> 
<input name="ImgPatr2" type="file" id="Patr2" value="ImgPatr2">
</div>
<!-- PATROCINADOR 3 -->
<div class="row">
<label for="Patr3">Selecione patrocinador 3</label>
<div class="col-md-4">
	<a href="#" class="thumbnail">
	<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="img-patr3">
	</a>
</div> 
<input name="ImgPatr3" type="file" id="Patr3" value="ImgPatr3">
</div>
</fieldset>
</fieldset>
<input type="hidden" name = "acao" value="incluir">
<button type="submit" class="btn btn-primary" id='botao'>Gravar</button>
</form> 
</fieldset>
<script type="text/javascript" src="/megaliga/js/vld-campeonato.js"></script>
</div>
</body> 
</html> 