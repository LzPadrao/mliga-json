<!DOCTYPE html>
<html lang="pt-br"> 
<head>
	<title>ML :: Posição</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initialscale=1.0">
	<link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
</head> 
<body> 
	<script src="../megaliga/js/jquery.js"></script>
	<script src="../megaliga/js/bootstrap.min.js"></script>
	<script src="../megaliga/js/df-posicoes.js"></script>
	<div class="col-md-8">
		<form class="form-group" id="Posicao" name="CadastraPosicao" method="post" action="gravaPosicao.php" enctype="multipart/form-data">
		<div class="container fluid">
		<legend><h2>POSIÇÕES DOS ATLETAS</h2></legend>
		<div class="row">
			<fieldset>
			<div class="col-md-4">
				<label for="funcao">Função :</label>
				<select class="form-control" id="funcao" name="funcao" onchange="loadList(this.value)">
					<option value="x">Selecione...</option> 
				    <option value="Goleiro">Goleiro</option> 
				    <option value="Defesa">Defesa</option> 
				    <option value="Meio_Campo">Meio-Campo</option>
				    <option value="Ataque">Ataque</option>
				</select>
			</div>
			<div class="col-md-4">
				<label for="posicao">Posição :</label>
				<select class="form-control" id="posicao" name="posicao">
				</select>
			</div>
			</fieldset>	
		</div>
		<br>
			<input type="hidden" name="acao"value="incluir">
			<button type="submit" class="btn btn-primary" id='botao'>Gravar</button>
		</form>
	</div> 
	
</body> 
</html> 