<!DOCTYPE html>
<?php
//chama arquivo de conexão
//include("conecta.php");
//$pdo=conectar(); 

//seleciona os dados na tabela
//$qry_categoria = $pdo->prepare("SELECT NomeCateg FROM tbcategoria");
//$qry_categoria->execute();
//$linha=$qry_categoria->fetchAll(PDO::FETCH_OBJ);
//?>
<html lang="pt-br"> 
<head>
<meta charset="UTF-8"/>
<title>ML :: Classe</title>
</head> 
<body> 
<form id="Classe" name="CadastraClasse" method="post" action="#">
<fieldset>
<legend>Classe dos jogadores</legend>
<p>
<label>Nome da classe :</label>
<input name="NomeClasse" type="text" id="NmClasse" size="40">
<label>Abreviação :</label>
<input name="Abrev" type="text" id="Abrev" size="10">
<label for="Nivel">Nível :</label>
<input name="Nivel" type="number" id="Nivel">
<label for="Posic">Posição :</label>
<input name="Posicao" type="text" id="Posic" size="15">
</p>
</fieldset>
<p><input type="submit" value="Enviar"></p> 
<input type='hidden' name='btnOK' value='1'>
</form> 
</body> 
</html> 