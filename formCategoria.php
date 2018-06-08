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
<title>ML :: Categorias</title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initialscale=1.0">
<link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
</head> 
<body> 
<script src="/megaliga/js/jquery.js"></script>
<script src="/megaliga/js/bootstrap.min.js"></script>	
<form class="form-group" id="Categoria" name="CadastraCategoria" method="post" action="gravaCategoria.php" enctype='multipart/form-data'>
		<div class="container">
			<fieldset>
			<legend><h3>DEFINIÇÃO DA CATEGORIA</h1></legend>
				<div class="row">
					<div class="col-md-10">
						<label>Selecione o campeonato : </label> 
						<select class="form-control"  name="TbCamp" id="TbCamp">
							<option value=""></option>
							<!-- iteração do PHP para preencimento da SELECT -->
							<?php foreach ($linha as $list){ ?>
							<option value="<?php echo "$list->IdCampeonato"?>"><?php echo "$list->NomeCamp"?></option>  
							<?php } ?>
						</select>
						<span class='msg-erro msg-camp'></span>
					</div>	
				</div>
				<BR>
				<div class="row">
					<div class="col-md-6">
						<label for="NmCateg">Nome Categoria : </label> 
						<input class="form-control" name="NomeCateg" type="text" id="NmCateg" size="40" maxlength="60">
						<span class='msg-erro msg-nomecat'></span>
					</div>
					<div class="col-md-2">
						<label for="AbCateg">Abreviacao : </label> 
						<input class="form-control" name="AbvCateg" type="text" id="AbCateg" size="40" maxlength="60">
						<span class='msg-erro msg-nomeabv'></span>
					</div>
					<div class="col-md-2">
						<label for="DtMin">Data Nasc. Mínima : </label>
						<input class="form-control" name="DataMin" type="text" id="DtMin">
						<span class='msg-erro msg-dtmin'></span>
					</div>
					<div class="col-md-2">
						<label for="DtMax">Data Nasc. Máxima : </label> 
						<input class="form-control" name="DataMax" type="text" id="DtMax">
						<span class='msg-erro msg-dtmax'></span>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="container">	
			<fieldset>
			<legend><h3>TIMES E FORMATO</h3></legend>
			<div class="row">
				<div class="col-md-3">
					<label for="DfTimes">Define time por: </label>
					<select class="form-control" name="DefTimes"id="DfTimes">
						<option value=""></option>
						<option value="SORTEIO">SORTEIO</option>
						<option value="FORMACAO">FORMAÇÃO</option>
					</select>
					<span class='msg-erro msg-dftime'></span>
				</div>
				<div class="col-md-2">
					<label for="QtTimes"> Quantidade de Times: </label>
					<input class="form-control" name="QtTimes" type="text" id="QtTimes">
					<span class='msg-erro msg-qtime'></span>
				</div>
				<div class="col-md-2">
				<label for="AtTimes"> Atletas por Time: </label>
				<input class="form-control" name="QtAtleta" type="text" id="QtAtleta"> 
				<span class='msg-erro msg-qtatl'></span>
				</div>
				<div class="col-md-3">
					<label for="DfFormat">Formato: </label>
					<select class="form-control" name="Formato" id="DfFormat">
						<option value=""></option>
						<option value="TURNO">TURNO</option>
						<option value="TURNO-RETURNO">TURNO / RETURNO</option>
						<option value="CHAVEAMENTO">CHAVEAMENTO</option>
					</select>
					<span class='msg-erro msg-formato'></span>
				</div>
			</div>
			</fieldset>
		</div>
		<div class="container">
			<fieldset>
			<legend>PONTUACAO PARTIDAS</legend>
			<div class="row">
				<div class="col-md-2">
					<label for="PtVit">Pontos Vitória: </label>
					<input class="form-control" name="PontoVit" type="text" id="PtVit"> 
					<span class='msg-erro msg-vitoria'></span>
				</div>
				<div class="col-md-2">
					<label for="PtEmp">Pontos Empate: </label>
					<input class="form-control" name="PontoEmp" type="text" id="PtEmp">
					<span class='msg-erro msg-empate'></span>
				</div>
				<div class="col-md-2">
					<label for="PtDer">Pontos Derrota: </label>
					<input class="form-control" name="PontoDer" type="text" id="PtDer">
					<span class='msg-erro msg-derrota'></span>
				</div>
			</div>
			</fieldset>
		</div>
		<div class="container">
			<fieldset>
			<legend>TEMPO PARTIDAS</legend>
			<div class="row">
				<div class="col-md-3">
					<label for="TePart">Tempo total partida: </label>
					<input class="form-control" name="TempPart" type="text" id="TePart" placeholder="Em Minutos"> 
					<span class='msg-erro msg-tpart'></span>
				</div>
				<div class="col-md-3">
					<label for="TeInterv">Tempo de intervalo: </label>
					<input class="form-control" name="TempInterv" type="text" id="TeInterv" placeholder="Em Minutos">
					<span class='msg-erro msg-tinterv'></span>
				</div>
				<div class="col-md-3">
					<label for="QtSubs">Substiuições permitidas: </label>
					<input class="form-control" name="QtSubst" type="text" id="QtSubs">
					<span class='msg-erro msg-subst'></span>
				</div>
			</div>
			</fieldset>
		</div>
		<div class="container">
			<fieldset>
			<legend>INFORMAÇÕES RODADA</legend>
			<div class="col-md-12">
				<div class="form-inline"> 
				<label>Marque o dia de início das rodadas e a quantidade de jogos</label>
				<br>  
				   <label>
				   	<input type="radio" name="sem" id="seg" value="1" checked>
				   	Segunda
				   	</label>
				        <input class="form-control" type="text" id="jgSG" name="jgSG" size="3">
				        <input type="hidden" id="sg" name="sg" value="1">
				   <label>
				   	<input type="radio" name="sem" id="ter" value="2">
				   	Terça
				   </label>
				      	<input class="form-control" type="text" id="jgTR" name="jgTR" size="3">
				      	<input type="hidden" id="tr" name="tr" value="2">
				   <label>
				   	<input type="radio" name="sem" id="qua" value="3">
				   	Quarta
				   </label>
				      	<input class="form-control" type="text" id="jgQA" name="jgQA" size="3">
				      	<input type="hidden" id="qa" name="qa" value="3">
				   <label>
				   	<input type="radio" name="sem" id="qui" value="4">
				   	Quinta
				   </label>
				    	<input class="form-control" type="text" id="jgQI" name="jgQI" size="3">
				    	<input type="hidden" id="qi" name="qi" value="4">
				   <label>
				   	<input type="radio" name="sem" id="sex" value="5">
				   	Sexta
				   </label> 
				     	<input class="form-control" type="text" id="jgSX" name="jgSX" size="3">
				    	<input type="hidden" id="sx" name="sx" value="5">
				   <label>
				   	<input type="radio" name="sem" id="sab" value="6">
				   	Sábado
				   </label> 
				      	<input class="form-control" type="text" id="jgSB" name="jgSB" size="3">
				      	<input type="hidden" id="sb" name="sb" value="6">  
				   <label>
				   	<input type="radio" name="sem" id="dom" value="7">
				   	Domingo
				   </label> 
				      	<input class="form-control" type="text" id="jgDM" name="jgDM" size="3">
	      				<input type="hidden" id="dm" name="dm" value="7">  
				</div>
			</div>
			</fieldset>
		</div>
		<input type="hidden" name = "acao" value="incluir">
    	<button type="submit" class="btn btn-primary" id='botao'>Gravar</button>
</form> 
	<script type="text/javascript" src="/megaliga/js/vld-categoria.js"></script>


</body> 
</html> 