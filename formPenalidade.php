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
	<title>ML :: PENALIDADES</title>
	<link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
</head> 
<body> 
<script src="/megaliga/js/jquery.js"></script>
<script src="/megaliga/js/bootstrap.min.js"></script>

	<div class="col-md-8">
	<form class="form-group" id="Penalidade" name="CadastraPenalidade" method="post" action="gravaPenalidade.php" enctype='multipart/form-data'>
	<div class=" container">
		<fieldset>
		<legend><h2>CATEGORIA</h2></legend>
		<div class="row">
			<div class="col-md-5">
				<label>Selecione a categoria : </label>
					<select class="form-control" name="IdCateg" id="IdCateg">
						<option value=""></option>
						<!-- iteração do PHP para preencimento da SELECT -->
						<?php foreach ($linha as $list){ ?>
						<option value="<?php echo "$list->IdCategoria"?>"><?php echo "$list->NomeCateg"?></option>  
						<?php } ?>	
					</select>
					<span class='msg-erro msg-idcateg'></span>
			</div>
		</div>
		</fieldset>
		<fieldset>
		<legend><h2>DADOS PENALIDADE</h2></legend>
		<div class="row">
				<div class="col-md-3">
				<label for="TpPenal">Tipo Penalidade: </label>
					<select class="form-control" id="TpPenal" name="TipoPenal">
						<option value="">Selecione</option>
						<option value="CART.AMARELO">Cartão Amarelo</option>
						<option value="CART.AZUL">Cartão Azul</option>
						<option value="CART.VERMELHO">Cartão Vermelho</option>
						<option value="AUSENCIA">Ausência</option>
						<option value="ATRASO">Atraso</option>
						<option value="FALTA INDVIVIDUAL">Falta Individual</option>
						<option value="FALTA COLETIVA">Falta Coletiva</option>
					</select>
					<span class='msg-erro msg-tppenal'></span>
			</div>
			<div class="col-md-5">
				<label for="DsPenal">Descrição penalidade : </label>
					<input class="form-control" name="DescPen" type="text" id="DsPenal">
					<span class='msg-erro msg-dspenal'></span>
			</div>
		</div>
		</fieldset>
		<fieldset>
		<legend><h2>EFEITO SUSPENSIVO</h2></legend>
		<div class="row">
			<div class="col-md-3">
				<label for="EfSusp">Efeito Suspensivo: </label>
					<select  class="form-control" id="EfSusp" name="EfSusp">
						<option value="">Selecione</option>
						<option value="SIM">Sim</option>
						<option value="NAO">Não</option>
					</select>
					<span class='msg-erro msg-efsusp'></span>
			</div>
			<div class="col-md-3">
				<label for="Recurso">Permite recurso: </label>
					<select class="form-control" name="Recurso" id="Recurso">
						<option value="">Selecione</option>
						<option value="SIM">Sim</option>
						<option value="NAO">Não</option>
					</select>
					<span class='msg-erro msg-recurso'></span>
			</div>
			<div class="col-md-4">
				<label for="DsRecur">Descrição: </label>
					<input class="form-control" name="DsRecur" type="text" size="40" id="DsRecur">
					<span class='msg-erro msg-dsrecur'></span>
			</div>
		</div>
		</fieldset>
		
		<fieldset>
		<legend><h2>DEFINE MULTAS</h2></legend>
		<div class="row">
			<div class="col-md-3">
				<label for="Multa">Aplica Multa: </label>
					<select class="form-control" name="Multa" id="Multa">
						<option value="">Selecione</option>
						<option value="SIM">Sim</option>
						<option value="NAO">Não</option>
					</select>
					<span class='msg-erro msg-multa'></span>
			</div>
			<div class="col-md-2">
				<label for="VlMulta">Valor Multa: R$</label>
					<input class="form-control" name="VlMulta" type="text" size="10" id="VlMulta">
					<span class='msg-erro msg-vlmulta'></span>
			</div>
			<div class="col-md-3">		
				<label for="MultaRec">Recorrencia: </label>
					<select class="form-control" name="MultaRec" id="MultaRec">
						<option value="">Selecione</option>
						<option value="SIM">Sim</option>
						<option value="NAO">Não</option>
					</select>
					<span class='msg-erro msg-multarec'></span>
			</div>
			<div class="col-md-2">
				<label for="VlMultaR">Valor Recorrencia: R$</label>
					<input class="form-control" name="VlMultaR" type="text" size="10" id="VlMultaR">
					<span class='msg-erro msg-vlmultar'></span>
			</div>
		</div>
		</fieldset>
		<br>
			<input type="hidden" name = "acao" value="incluir">
			<button type="submit" class="btn btn-primary" id='botao'>Gravar</button> 
	</div>
	</form> 
	</div>
	<script type="text/javascript" src="/megaliga/js/vld-penalidade.js"></script>
</body> 
</html> 