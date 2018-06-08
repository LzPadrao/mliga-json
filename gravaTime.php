<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Inclusão Time</title>
	<link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
	<?php 
		include("conecta.php");
		$pdo=conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec("set names utf8");

		// Recebe os dados enviados pela submissão
		$acao  		= (isset($_POST['acao'])) 		? $_POST['acao'] : '';
		$idcateg	= (isset($_POST['categ'])) 		? $_POST['categ'] : '';
		$nome  		= (isset($_POST['NmTime']))		? $_POST['NmTime'] : '';
		$qtjog		= (isset($_POST['QtJog'])) 		? $_POST['QtJog'] : '';
		$repres  	= (isset($_POST['NmRep']))	 	? $_POST['NmRep'] : '';

		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($nome == '' || strlen($nome) < 3):
				$mensagem .= '<li>Favor preencher nome do time.</li>';
		    endif;

			if ($qtjog == ''): 		
				$mensagem .= '<li>Favor preencher quantidade de jogadores.</li>';
			endif;

			if ($repres == '' || strlen($repres) < 3):
				$mensagem .= '<li>Favor preencher nome do representante.</li>';
		    endif;

			/* Constrói a data inicio campeonatp no formato ANSI yyyy/mm/dd
			$data_temp = explode('/', $data_ini);
			$data_ansi = $data_temp[2] . '-' . $data_temp[1] . '-' . $data_temp[0];

			// Constrói a data fim do campeonato no formato ANSI yyyy/mm/dd
			$data_temp2 = explode('/', $data_fim);
			$data_ansi2 = $data_temp2[2] . '-' . $data_temp2[1] . '-' . $data_temp2[0];
			*/
		endif;
		
		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			// tratamento imagem do escudo
			$arq_escudo = $_FILES['Escudo']['name'];
			$foto_escudo = "";
			
				if(isset($_FILES['Escudo']) && $_FILES['Escudo']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arq_escudo)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão da logomarca Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			    if(is_uploaded_file($_FILES['Escudo']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $foto_escudo = date('dmY') . '_' . $_FILES['Escudo']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['Escudo']['tmp_name'], '../megaliga/fotos/'.$foto_escudo)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			    endif;
			endif;
			
			// tratamento para foto do primeiro patrocinador
			$arq_patr1 = $_FILES['Patr1']['name'];
			$foto_patr1 = "";
			if(isset($_FILES['Patr1']) && $_FILES['Patr1']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arq_patr1)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão do patrocinador Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['Patr1']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $foto_patr1 = date('dmY') . '_' . $_FILES['Patr1']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['Patr1']['tmp_name'], '../megaliga/fotos/'.$foto_patr1)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;   
			endif;
			
			// tratamento para foto do segundo patrocinador
			$arq_patr2 = $_FILES['Patr2']['name'];
			$foto_patr2 = "";
			if(isset($_FILES['Patr2']) && $_FILES['Patr2']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arq_patr2)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão do patrocinador Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['Patr2']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $foto_patr2 = date('dmY') . '_' . $_FILES['Patr2']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['Patr2']['tmp_name'], '../megaliga/fotos/'.$foto_patr2)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;   
			endif;

			// tratamento para foto do terceiro patrocinador
			$arq_patr3 = $_FILES['Patr3']['name'];
			$foto_patr3 = "";
			if(isset($_FILES['Patr3']) && $_FILES['Patr3']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arq_patr3)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão do patrocinador Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['Patr3']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $foto_patr3 = date('dmY') . '_' . $_FILES['Patr3']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['Patr3']['tmp_name'], '../megaliga/fotos/'.$foto_patr3)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;   
			endif;
				
			$sql = "INSERT INTO tbtimes (IdCategoria,NomeTime,Representante,QtJogadores,ImgTime,Patroc1,Patroc2,Patroc3,Pontos,QtJogos,QtVitorias,QtEmpates,QtDerrotas,GPro,GContra,SdGol,Aproveit,IdSorteio) VALUES (:categ,:NmTime,:NmRep,:QtJog,:Escudo,:Patr1,:Patr2,:Patr3,0,0,0,0,0,0,0,0,0,0)";

			$stm = $pdo->prepare($sql);
			$stm->bindValue(':categ'		, $idcateg,		PDO::PARAM_STR);
			$stm->bindValue(':NmTime'	 	, $nome,	 	PDO::PARAM_STR);
			$stm->bindValue(':QtJog' 		, $qtjog,		PDO::PARAM_STR);
			$stm->bindValue(':NmRep'		, $repres,		PDO::PARAM_STR);
			$stm->bindValue(':Escudo'		, $foto_escudo, PDO::PARAM_STR);
			$stm->bindValue(':Patr1'		, $foto_patr1,  PDO::PARAM_STR);
			$stm->bindValue(':Patr2'		, $foto_patr2,  PDO::PARAM_STR);
			$stm->bindValue(':Patr3'		, $foto_patr3,  PDO::PARAM_STR);
			
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=formTime.php'>";
			
			// echo("Dados recebidos e preparados: ".$idcateg." - ".$nome." - ".$qtjog." - ".$repres." - ".$foto_escudo." - ".$foto_patr1." - ".$foto_patr2." - ".$foto_patr3);
		endif;
	?>
	</div>
</body>
</html>