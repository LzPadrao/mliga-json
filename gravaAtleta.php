<!-- NÃO INICIADO -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Inclusão de Colaborador</title>
	<link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
	<?php 
		/*include("conecta.php");
		$pdo=conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec("set names utf8");*/
		
		$aAtleta 	= fopen('dados/atleta.csv', 'r');
		$qIni		= 0;

		while (!feof($aAtleta)) 
		{
    		$qIni = $qIni+1;
		}
 		
 		$qtrb		= $qIni;
		
		fclose($aAtleta);
				
		// Recebe os dados enviados pela submissão
		$acao  		= (isset($_POST['acao'])) 		? $_POST['acao'] 		: '';
		$cota		= (isset($_POST['CdCota'])) 	? $_POST['CdCota'] 		: '';
		$nome		= (isset($_POST['NmAtlet'])) 	? $_POST['NmAtlet'] 	: '';
		$foto_atl	= (isset($_POST['FtAtleta'])) 	? $_POST['FtAtleta'] 	: '';
		$doc 		= (isset($_POST['DcIdent'])) 	? $_POST['DcIdent'] 	: '';
		$sexo	 	= (isset($_POST['Sexo'])) 		? $_POST['Sexo'] 		: '';
		$nasc 		= (isset($_POST['DtNasc'])) 	? $_POST['DtNasc'] 		: '';
		$rua 		= (isset($_POST['Rua'])) 		? $_POST['Rua'] 		: '';
		$num 		= (isset($_POST['Num'])) 		? $_POST['Num'] 		: '';
		$compl 		= (isset($_POST['Compl'])) 		? $_POST['Compl'] 		: '';
		$bair		= (isset($_POST['Bairro'])) 	? $_POST['Bairro'] 		: '';
		$cidad		= (isset($_POST['Cidade'])) 	? $_POST['Cidade'] 		: '';
		$cep		= (isset($_POST['Cep'])) 		? $_POST['Cep'] 		: '';
		$est		= (isset($_POST['Estado'])) 	? $_POST['Estado'] 		: '';
		$tel1		= (isset($_POST['Telef1'])) 	? $_POST['Telef1'] 		: '';
		$tel2		= (isset($_POST['Telef2'])) 	? $_POST['Telef2'] 		: '';
		$correio	= (isset($_POST['Email'])) 		? $_POST['Email'] 		: '';
		$peso		= (isset($_POST['Peso'])) 		? $_POST['Peso'] 		: '';
		$altura		= (isset($_POST['Altura'])) 	? $_POST['Altura'] 		: '';
		$func		= (isset($_POST['Funcao'])) 	? $_POST['Funcao'] 		: '';
		$posic		= (isset($_POST['Posicao'])) 	? $_POST['Posicao'] 	: '';

		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			$arq_atlet = $_FILES['FtAtleta']['name'];
			$foto_atlet = "";
			
			// tratamento para a imagem do atleta
			if(isset($_FILES['FtAtleta']) && $_FILES['FtAtleta']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arq_atlet)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão da logomarca Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			    if(is_uploaded_file($_FILES['FtAtleta']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $foto_atlet = date('dmY') . '_' . $_FILES['FtAtleta']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['FtAtleta']['tmp_name'],"../megaliga/fotos/".$foto_atlet)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			    endif;
			endif;
			
			//Constrói a data nascimento
			$data_temp = explode('/', $nasc);
			$data_ansi = $data_temp[2] . '-' . $data_temp[1] . '-' . $data_temp[0];

			//Remove a mascara dos telefones para a gravação no banco de dados
			$arTel1 = array(" ","-");
			$tel1_ok = str_replace($arTel1,"", $tel1);
			
			$arTel2 = array(" ","-");
			$tel2_ok = str_replace($arTel2,"", $tel2);
			
			//Remove a mascara do cpf para a gravação no banco de dados
			$arCpf = array(".","-");
			$cpf_ok = str_replace($arCpf,"", $doc);

			//Remove a mascara do cep para a gravação no banco de dados
			$cep_ok = str_replace("-","", $cep);

			// Atribui zero para gravação do peso na tabela caso o mesmo não seja informado
			// Remove a mascara do cpf para a gravação no banco de dados
			$arPeso  = array(",");
			if($peso == ""):
				$peso_ok = 0.00;
			else:
				$peso_ok = str_replace($arPeso,".", $peso);
			endif;			
			
			// Atribui zero para gravação da altura na tabela caso essa não seja informada
			$arAltura = array(",");
			if($altura == ""):
				$altur_ok = 0.00;
			else:
				$altur_ok = str_replace($arAltura,".",$altura);
			endif;
			/* 	Estrutura do arquivo CSV atleta
				nReg;CodCota;Nome;Cpf;DtNasc;Sexo;Rua;Num;Compl;Bairro;Cep;Cidade;Estado;Tel1;Tel2;Email;Peso;Altura;Funcao;Posicao;ImgAtleta
			*/
			// string de dados
			$nReg	= $qtrb+1;
			$str 	= $nReg.";".$cota.";".$nome.";".$cpf_ok.";".$data_ansi.";".$sexo.";".$rua.";".$num.";".$compl.";".$bair.";".$cep_ok.";".$cidad.";".$est.";".$tel1_ok.";".$tel2_ok.";".$correio.";".$peso_ok.";".$altur_ok.";".$func.";".$posic.";".$foto_atlet;

			echo($str);

			/* RETIRADO PARA O TRATAMENTO DE ARQUIVOS CSV 
			$sql = "INSERT INTO tbatleta (CodCota,Nome,Cpf,DtNasc,Sexo,Rua,Num,Compl,Bairro,Cep,Cidade,Estado,Tel1,Tel2,Email,Peso,Altura,Funcao,Posicao,ImgAtleta) VALUES (:CdCota,:NmAtlet,:DcIdent,:DtNasc,:Sexo,:Rua,:Num,:Compl,:Bairro,:Cep,:Cidade,:Estado,:Telef1,:Telef2,:Email,:Peso,:Altura,:Funcao,:Posicao,:FtAtleta)";

			$stm = $pdo->prepare($sql);
			$stm->bindValue(':NmAtlet'	,$nome,			PDO::PARAM_STR);
			$stm->bindValue(':CdCota'	,$cota,			PDO::PARAM_STR);
			$stm->bindValue(':FtAtleta'	,$foto_atlet,	PDO::PARAM_STR); 
			$stm->bindValue(':DcIdent'	,$cpf_ok,		PDO::PARAM_STR);
			$stm->bindValue(':Sexo'		,$sexo,			PDO::PARAM_STR); 
			$stm->bindValue(':DtNasc'	,$data_ansi,	PDO::PARAM_STR);
			$stm->bindValue(':Rua'		,$rua,			PDO::PARAM_STR);
			$stm->bindValue(':Num'		,$num,			PDO::PARAM_STR);
			$stm->bindValue(':Compl'	,$compl,		PDO::PARAM_STR); 
			$stm->bindValue(':Bairro'	,$bair,			PDO::PARAM_STR); 
			$stm->bindValue(':Cidade'	,$cidad,		PDO::PARAM_STR);
			$stm->bindValue(':Cep'		,$cep_ok,		PDO::PARAM_STR);
			$stm->bindValue(':Estado'	,$est,			PDO::PARAM_STR);
			$stm->bindValue(':Telef1'	,$tel1_ok,		PDO::PARAM_STR);
			$stm->bindValue(':Telef2'	,$tel2_ok,		PDO::PARAM_STR); 
			$stm->bindValue(':Email'	,$correio,		PDO::PARAM_STR); 
			$stm->bindValue(':Peso'		,$peso_ok,		PDO::PARAM_STR); 
			$stm->bindValue(':Altura'	,$altur_ok,		PDO::PARAM_STR); 
			$stm->bindValue(':Funcao'	,$func,			PDO::PARAM_STR);
			$stm->bindValue(':Posicao'	,$posic,		PDO::PARAM_STR); 
				
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;*/
			


			// echo "<meta http-equiv=refresh content='3;URL=http://localhost/megaliga/'>";
			
		endif;
	
	?>
	</div>
</body>
</html>