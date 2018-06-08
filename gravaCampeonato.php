<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Inclusão de campeonato</title>
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
		$nome  		= (isset($_POST['NomeCamp'])) 	? $_POST['NomeCamp'] : '';
		$foto_atual = (isset($_POST['LogoCamp'])) 	? $_POST['LogoCamp'] : '';
		$foto_Pat1  = (isset($_POST['ImgPatr1'])) 	? $_POST['ImgPatr1'] : '';
		$data_ini   = (isset($_POST['DataIni'])) 	? $_POST['DataIni'] : '';
		$data_fim   = (isset($_POST['DataFim'])) 	? $_POST['DataFim'] : '';
		$status    	= (isset($_POST['SitCamp'])) 	? $_POST['SitCamp'] : '';

		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
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



		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			$arquivo = $_FILES['LogoCamp']['name'];
			$nome_foto = "";
			// tratamento para a Logomarca
			if(isset($_FILES['LogoCamp']) && $_FILES['LogoCamp']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arquivo)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão da logomarca Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			    if(is_uploaded_file($_FILES['LogoCamp']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $nome_foto = date('dmY') . '_' . $_FILES['LogoCamp']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['LogoCamp']['tmp_name'], '../megaliga/fotos/'.$nome_foto)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			    endif;
			endif;
			
			// tratamento para a Patrocinador 1
			$arquivoP1 = $_FILES['ImgPatr1']['name'];
			$fotoP1 = "";
			if(isset($_FILES['ImgPatr1']) && $_FILES['ImgPatr1']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arquivoP1)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão do patrocinador Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['ImgPatr1']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $fotoP1 = date('dmY') . '_' . $_FILES['ImgPatr1']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['ImgPatr1']['tmp_name'], '../megaliga/fotos/'.$fotoP1)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;   
			endif;
			
			// tratamento para a Patrocinador 2
			$arquivoP2 = $_FILES['ImgPatr2']['name'];
			$fotoP2 = "";
			if(isset($_FILES['ImgPatr2']) && $_FILES['ImgPatr2']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arquivoP2)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão do patrocinador Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['ImgPatr2']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $fotoP2 = date('dmY') . '_' . $_FILES['ImgPatr2']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['ImgPatr2']['tmp_name'], '../megaliga/fotos/'.$fotoP2)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;   
			endif;

			// tratamento para a Patrocinador 3
			$arquivoP3 = $_FILES['ImgPatr3']['name'];
			$fotoP3 = "";
			if(isset($_FILES['ImgPatr3']) && $_FILES['ImgPatr3']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arquivoP3)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão do patrocinador Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['ImgPatr3']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $fotoP3 = date('dmY') . '_' . $_FILES['ImgPatr3']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['ImgPatr3']['tmp_name'], '../megaliga/fotos/'.$fotoP3)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;   
			endif;

			$sql = "INSERT INTO tbcampeonato (DataIni,DataFim,NomeCamp,ImgCamp,ImgPatr1,ImgPatr2,ImgPatr3,Situacao) VALUES (:DataIni,:DataFim,:NomeCamp,:LogoCamp,:ImgPatr1,:ImgPatr2,:ImgPatr3,:SitCamp)";

			$stm = $pdo->prepare($sql);
			$stm->bindValue(':NomeCamp', $nome,			PDO::PARAM_STR);
			$stm->bindValue(':DataIni' , $data_ansi, 	PDO::PARAM_STR);
			$stm->bindValue(':DataFim' , $data_ansi2,	PDO::PARAM_STR);
			$stm->bindValue(':LogoCamp', $nome_foto,	PDO::PARAM_STR);
			$stm->bindValue(':ImgPatr1', $fotoP1,	    PDO::PARAM_STR);
			$stm->bindValue(':ImgPatr2', $fotoP2,	    PDO::PARAM_STR);
			$stm->bindValue(':ImgPatr3', $fotoP3,	    PDO::PARAM_STR);
			$stm->bindValue(':SitCamp' , $status,		PDO::PARAM_STR);
			
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=formCampeonato.php'>";
		endif;
	?>

	</div>
</body>
</html>