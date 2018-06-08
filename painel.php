<?php
//chama arquivo de conexão
include("conecta.php");
$pdo=conectar(); 

//seleciona os dados na tabela
$qry_campeonato = $pdo->prepare("SELECT IdCampeonato,NomeCamp FROM tbcampeonato");
$qry_campeonato->execute();
$linha=$qry_campeonato->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="pt-br"> 
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 	
	<meta charset="UTF-8"/>
	<title>MegaLiga :: Painel</title>
	<link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
</head> 
<body>
	<div class="box-pagina">
		<div class="box-cabecalho">
			<div class="box-logo">
				<img src="/megaliga/img/logoML.png">
			</div>
				<select class="obj-select"  name="camp" id="camp" onchange="showOpt(this.value)">
							<option value="" checked><a href="/megaliga/formCampeonato.php">ADICIONAR NOVO CAMPEONATO</a></option>
							<!-- iteração do PHP para preencimento da SELECT -->
							<?php foreach ($linha as $list){ ?>
							<option value="<?php echo "$list->IdCampeonato"?>"><?php echo "$list->NomeCamp"?></option>  
							<?php } ?>
				</select>
			<script>
				var xmlHttp 
				function showOpt(str) 
				{   
					xmlHttp=GetXmlHttpObject()  
					if (xmlHttp==null) 
					{    
						alert ("Browser does not support HTTP Request")    
						return 
					}  

				var url="carrega-cat.php"  
					url=url+"?camp="+str  
					url=url+"&sid="+Math.random()
					xmlHttp.onreadystatechange=stateChanged   
					xmlHttp.open("GET",url,true)  
					xmlHttp.send(null) 
				} 

				function stateChanged() 
				{
				   if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") 
				   {
				        document.getElementById("menucat").innerHTML=xmlHttp.responseText  
				   } 
				} 

				function showCat(str) 
				    {   
				        xmlHttp=GetXmlHttpObject()  
				        if (xmlHttp==null) 
				        {    
				            alert ("Browser does not support HTTP Request")    
				            return 
				        }  

				        var url="carga-times.php"  
				            url=url+"?categ="+str  
				            url=url+"&sid="+Math.random()
				            xmlHttp.onreadystatechange=stateC   
				            xmlHttp.open("GET",url,true)  
				            xmlHttp.send(null) 
				    } 

				function stateC() 
				{
				    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") 
				    {
				        document.getElementById("menutime").innerHTML=xmlHttp.responseText  
				    } 
				} 

				function GetXmlHttpObject() 
				{
				  	var xmlHttp=null;
				  	try {
					      // Firefox, Opera 8.0+, Safari   
					      xmlHttp=new XMLHttpRequest(); 
					    } 
				   	catch (e) 
				      	{   
				      	//Internet Explorer
				    try {
				      	  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				      	} 
				    catch (e) 
				    	{
				    	  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				    	} 
				 }  return xmlHttp; 
				}

				//INICIO SCRIPT TIMES
				/* 
				var xmlHttp
				function showCat(str) 
				    {   
				        xmlHttp=GetXmlHttpObject()  
				        if (xmlHttp==null) 
				        {    
				            alert ("Browser does not support HTTP Request")    
				            return 
				        }  

				        var url="carga-times.php"  
				            url=url+"?categ="+str  
				            url=url+"&sid="+Math.random()
				            xmlHttp.onreadystatechange=stateChanged   
				            xmlHttp.open("GET",url,true)  
				            xmlHttp.send(null) 
				    } 

				function stateChanged() 
				{
				    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") 
				    {
				        document.getElementById("menutime").innerHTML=xmlHttp.responseText  
				    } 
				} 

				function GetXmlHttpObject() 
				{
				    var xmlHttp=null;
				    try {
				    // Firefox, Opera 8.0+, Safari   
				        xmlHttp=new XMLHttpRequest(); 
				        } 
				    catch (e) 
				        {   
				    //Internet Explorer
				    try {
				        xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				        } 
				    catch (e) 
				        {
				        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				        } 
				        }  
				        return xmlHttp; 
				}
				*/
			</script>

			<div class="nav-categ" name="menucat" id="menucat">
			</div>
		</div>
		<div class="box-direito" name="menutime" id="menutime">
		</div>
	</div>
</body> 
</html> 

