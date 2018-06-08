<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Inclusão de Estadio</title>
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
		$idcamp		= (isset($_POST['TbCamp'])) 	? $_POST['TbCamp'] : '';
		$nome  		= (isset($_POST['NomeEstad'])) 	? $_POST['NomeEstad'] : '';
		$comprim	= (isset($_POST['ComprEstad'])) ? $_POST['ComprEstad'] : '';
		$largura  	= (isset($_POST['LargEstad'])) 	? $_POST['LargEstad'] : '';
		$cap_torc   = (isset($_POST['CapTorcida']))	? $_POST['CapTorcida'] : '';

		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    /* Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($nome == '' || strlen($nome) < 3):
				$mensagem .= '<li>Favor preencher o Nome.</li>';
		    endif;

			if ($data_ini == ''): 		
				$mensagem .= '<li>Favor preencher a Data de Inicio do campeonato.</li>';
			else:
				$data = explode('/', $data_ini);
				if (!checkdate($data[1], $data[0], $data[2])):
					$mensagem .= '<li>Formato da data de inicio inválida.</li>';
				endif;
			endif;

			if ($data_fim == ''): 		
				$mensagem .= '<li>Favor preencher a Data Final do campeonato.</li>';
			else:
				$dataf = explode('/', $data_fim);
				if (!checkdate($dataf[1], $dataf[0], $dataf[2])):
					$mensagem .= '<li>Formato da data final inválida.</li>';
				endif;
			endif;

			if ($status == ''):
			   $mensagem .= '<li>Favor preencher a situacao do campeonato.</li>';
			endif;

			if ($mensagem != ''):
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
				exit;
			endif;

			// Constrói a data inicio campeonatp no formato ANSI yyyy/mm/dd
			$data_temp = explode('/', $data_ini);
			$data_ansi = $data_temp[2] . '-' . $data_temp[1] . '-' . $data_temp[0];

			// Constrói a data fim do campeonato no formato ANSI yyyy/mm/dd
			$data_temp2 = explode('/', $data_fim);
			$data_ansi2 = $data_temp2[2] . '-' . $data_temp2[1] . '-' . $data_temp2[0];
		endif;
		*/
		
		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			$arq_estadio1 = $_FILES['Est1']['name'];
			$foto_est1 = "";
			
			// tratamento para a primeira foto do estadio
				if(isset($_FILES['Est1']) && $_FILES['Est1']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arq_estadio1)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão da logomarca Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			    if(is_uploaded_file($_FILES['Est1']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $foto_est1 = date('dmY') . '_' . $_FILES['Est1']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['Est1']['tmp_name'], '../megaliga/fotos/'.$foto_est1)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			    endif;
			endif;
			
			// tratamento para a segunda foto do estadio
			$arq_estadio2 = $_FILES['Est2']['name'];
			$foto_est2 = "";
			if(isset($_FILES['Est2']) && $_FILES['Est2']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arq_estadio2)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão do patrocinador Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['Est2']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $foto_est2 = date('dmY') . '_' . $_FILES['Est2']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['Est2']['tmp_name'], '../megaliga/fotos/'.$foto_est2)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;   
			endif;
			
			// tratamento para a terceira foto do estadio
			$arq_estadio3 = $_FILES['Est3']['name'];
			$foto_est3 = "";
			if(isset($_FILES['Est3']) && $_FILES['Est3']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arq_estadio3)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão do patrocinador Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['Est3']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $foto_est3 = date('dmY') . '_' . $_FILES['Est3']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['Est3']['tmp_name'], '../megaliga/fotos/'.$foto_est3)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;   
			endif;

			// tratamento para a quarta foto do estadio
			$arq_estadio4 = $_FILES['Est4']['name'];
			$foto_est4 = "";
			if(isset($_FILES['Est4']) && $_FILES['Est4']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arq_estadio4)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão do patrocinador Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['Est4']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $foto_est4 = date('dmY') . '_' . $_FILES['Est4']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['Est4']['tmp_name'], '../megaliga/fotos/'.$foto_est4)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;   
			endif;
						
			$sql = "INSERT INTO tbestadio (IdCampeonato,Nome,Comprimento,Largura,CapTorcida,Imagem1,Imagem2,Imagem3,Imagem4) VALUES (:TbCamp,:NomeEstad,:ComprEstad,:LargEstad,:CapTorcida,:Est1,:Est2,:Est3,:Est4)";

			$stm = $pdo->prepare($sql);
			$stm->bindValue(':TbCamp'		, $idcamp,		PDO::PARAM_STR);
			$stm->bindValue(':NomeEstad' 	, $nome,	 	PDO::PARAM_STR);
			$stm->bindValue(':ComprEstad' 	, $comprim,		PDO::PARAM_STR);
			$stm->bindValue(':LargEstad'	, $largura,		PDO::PARAM_STR);
			$stm->bindValue(':CapTorcida'	, $cap_torc,    PDO::PARAM_STR);
			$stm->bindValue(':Est1'			, $foto_est1,   PDO::PARAM_STR);
			$stm->bindValue(':Est2'			, $foto_est2,   PDO::PARAM_STR);
			$stm->bindValue(':Est3'			, $foto_est3,   PDO::PARAM_STR);
			$stm->bindValue(':Est4'			, $foto_est4,   PDO::PARAM_STR);
			
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=formEstadio.php'>";
			
			// echo("Dados recebidos e preparados: ".$idcamp." - ".$nome." - ".$comprim." - ".$largura." - ".$cap_torc." - ".$foto_est1." - ".$foto_est2." - ".$foto_est3." - ".$foto_est4);
		endif;
	?>
	</div>
</body>
</html>