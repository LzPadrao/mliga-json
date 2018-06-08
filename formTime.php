<!DOCTYPE html>
<?php
//chama arquivo de conexão
include("conecta.php");
$pdo=conectar(); 

//seleciona os dados na tabela
$qry_categoria = $pdo->prepare("SELECT IdCategoria,IdCampeonato,NomeCateg FROM tbcategoria");
$qry_categoria->execute();
$linha=$qry_categoria->fetchAll(PDO::FETCH_OBJ);
?>
	<html lang="pt-br"> 
	<head>
	<meta charset="UTF-8"/>
		<title>ML :: Times</title>
		<link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
	</head> 
	<body>
	<script src="/megaliga/js/jquery.js"></script>
	<script src="/megaliga/js/bootstrap.min.js"></script> 
		<div class="col-md-8">
		<form class="form-group" id="Time" name="CadastraTime" method="post" action="gravaTime.php" enctype="multipart/form-data">
		<div class="container">
		<fieldset>
		<legend><h2>CATEGORIA DISPUTA</h2></legend>
		<div class="row">
			<div class="col-md-5">
				<label for="catdisp">Selecione a categoria :</label>
				<select class="form-control" name="categ" id="categ">
				    <option value="" selected>Selecione...</option>
				    <!-- iteração do PHP para preencimento da SELECT -->
					<?php foreach ($linha as $list){ ?>
					<option value="<?php echo "$list->IdCategoria"?>"><?php echo "$list->NomeCateg"?></option>  
					<?php } ?>	
					</select>
					<span class='msg-erro msg-categ'></span>
			</div>
		</div>
		</fieldset>
		<fieldset>
		<legend><h2>INFORMAÇÕES DO TIME</h2></legend>
		<label>Escudo do Time</label>
		<div class="container row fluid">
			<div class="col-md-4">
				<a href="#" class="thumbnail">
				<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="ImgEscudo">
				</a>
				<input name="Escudo" type="file" id="Escudo">
			</div>
		</div>
		<br>
		<div class="container row fluid">
			<div class="col-md-5">
				<label for="NmTime">Nome do Time :</label>
				<input class="form-control" name="NmTime" type="text" id="NmTime" size="60" placeholder="informe o nome do time">
				<span class='msg-erro msg-nmtime'></span>
			</div>
			<div class="col-md-2">
				<label for="QtJog">Quant. jogadores :</label> 
				<input class="form-control" name="QtJog" type="text" id="QtJog" size="4" placeholder="Quant.Jogadores">
				<span class='msg-erro msg-qtjog'></span>
			</div>
			<div class="col-md-5">
				<label for="NmRep">Representante :</label> 
				<input class="form-control" name="NmRep" type="text" id="NmRep" size="30" placeholder="Nome do representante">
				<span class='msg-erro msg-nmrep'></span>
			</div>
		</div>
		</fieldset>
		<br>
		<fieldset>
		<legend><h2>PATROCINADORES :</h2></legend>
		<div class="container fluid">
		<div class="col-md-4">
			<a href="#" class="thumbnail">
			<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="ImgPatr1">
			</a>
		<input name="Patr1" type="file" id="Patr1">
		</div>		
		<div class="col-md-4">
			<a href="#" class="thumbnail">
			<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="ImgPatr2">
			</a>
		<input name="Patr2" type="file" id="Patr2">
		</div>
		<div class="col-md-4">
			<a href="#" class="thumbnail">
			<img class="img-responsive" src="/megaliga/img/img_padrao.png" height="190" width="150" id="ImgPatr3">
			</a>	
		<input name="Patr3" type="file" id="Patr3">
		</div> 
		</fieldset>
		<br>
		</div>
		<input type="hidden" name="acao"value="incluir">
		<button type="submit" class="btn btn-primary" id='botao'>Gravar</button>
		</div>
		</form> 
		</div>
	<script type="text/javascript" src="/megaliga/js/vld-time.js"></script>
	</body> 
	</html> 