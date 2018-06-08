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
		include("conecta.php");
		$pdo=conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec("set names utf8");
				
		// Recebe os dados enviados pela submissão
		$acao  		= (isset($_POST['acao'])) 		? $_POST['acao'] : '';
		$nome		= (isset($_POST['NomeColab'])) 	? $_POST['NomeColab'] : '';
		$foto_colab = (isset($_POST['FotoColab'])) 	? $_POST['FotoColab'] : '';
		$doc 		= (isset($_POST['DocColab'])) 	? $_POST['DocColab'] : '';
		$sexo	 	= (isset($_POST['Sexo'])) 		? $_POST['Sexo'] : '';
		$nasc 		= (isset($_POST['DataNasc'])) 	? $_POST['DataNasc'] : '';
		$rua 		= (isset($_POST['RuaColab'])) 	? $_POST['RuaColab'] : '';
		$num 		= (isset($_POST['NumColab'])) 	? $_POST['NumColab'] : '';
		$compl 		= (isset($_POST['ComplNum'])) 	? $_POST['ComplNum'] : '';
		$bair		= (isset($_POST['Bairro'])) 	? $_POST['Bairro'] : '';
		$cidad		= (isset($_POST['Cidade'])) 	? $_POST['Cidade'] : '';
		$cep		= (isset($_POST['Cep'])) 		? $_POST['Cep'] : '';
		$est		= (isset($_POST['Estado'])) 	? $_POST['Estado'] : '';
		$tel1		= (isset($_POST['Telefone1'])) 	? $_POST['Telefone1'] : '';
		$tel2		= (isset($_POST['Telefone2'])) 	? $_POST['Telefone2'] : '';
		$correio	= (isset($_POST['Email'])) 		? $_POST['Email'] : '';
		$bconum		= (isset($_POST['Banco'])) 		? $_POST['Banco'] : '';
		$bconom		= (isset($_POST['NomeBanco'])) 	? $_POST['NomeBanco'] : '';
		$bcoag		= (isset($_POST['Agencia'])) 	? $_POST['Agencia'] : '';
		$bcodag		= (isset($_POST['DigAgencia'])) ? $_POST['DigAgencia'] : '';
		$bcocta 	= (isset($_POST['NumConta'])) 	? $_POST['NumConta'] : '';
		$bcodcta	= (isset($_POST['DigConta'])) 	? $_POST['DigConta'] : '';
		$comis		= (isset($_POST['Comissao'])) 	? $_POST['Comissao'] : '';
		$func		= (isset($_POST['FuncColab'])) 	? $_POST['FuncColab'] : '';
		$numreg		= (isset($_POST['RegColab'])) 	? $_POST['RegColab'] : '';

		/* 
		// REMOVER - Constrói a data inicio campeonatp no formato ANSI yyyy/mm/dd
			$data_temp = explode('/', $nasc);
			$data_ansi = $data_temp[2] . '-' . $data_temp[1] . '-' . $data_temp[0];

		// REMOVER
		$arq_colab = date('dmY') . '_' . $_FILES['FotoColab']['name'];

		$arTel1 = array(" ","-");
		$tel1_ok = str_replace($arTel1,"", $tel1);
		
		$arTel2 = array(" ","-");
		$tel2_ok = str_replace($arTel2,"", $tel2);

		echo "Dados ".$nome." - ".$arq_colab." - ".$sexo." - ".$doc." - ".$rua." - ".$num." - ".$compl." - ".$bair." - ".$cep." - ".$cidad." - ".$est." - ".$data_ansi." - ".$tel1_ok." - ".$tel2_ok." - ".$correio." - ".$comis." - ".$func;
		*/
		
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

			$arq_colab = $_FILES['FotoColab']['name'];
			$foto_colab = "";
			
			// tratamento para a primeira foto do estadio
			if(isset($_FILES['FotoColab']) && $_FILES['FotoColab']['size'] > 0):  
				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(@end(explode(".", $arq_colab)));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão da logomarca Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			    if(is_uploaded_file($_FILES['FotoColab']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          //if(!file_exists("fotos")):  
			          //     mkdir("fotos");  
			          //endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $foto_colab = date('dmY') . '_' . $_FILES['FotoColab']['name'];  	
			          
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['FotoColab']['tmp_name'], '../megaliga/fotos/'.$foto_colab)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			    endif;
			endif;
			
			//Constrói a data inicio campeonatp no formato ANSI yyyy/mm/dd
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

			$sql = "INSERT INTO tbcolaborador (Nome,ImgColab,Sexo,Cpf,Rua,Numero,Complem,Bairro,Cep,Cidade,Estado,Banco,NomeBco,AgBanco,DgAgenc,CtBanco,DgConta,DataNasc,Telefone1,Telefone2,Email,Comissao,Funcao,NumReg) VALUES (:NomeColab,:FotoColab,:Sexo,:DocColab,:RuaColab,:NumColab,:ComplNum,:Bairro,:Cep,:Cidade,:Estado,:Banco,:NomeBanco,:Agencia,:DigAgencia,:NumConta,:DigConta,:DataNasc,:Telefone1,:Telefone2,:Email,:Comissao,:FunColab,:RegColab)";

			$stm = $pdo->prepare($sql);
			$stm->bindValue(':NomeColab'	, $nome,		PDO::PARAM_STR);
			$stm->bindValue(':FotoColab'	, $foto_colab,	PDO::PARAM_STR);
			$stm->bindValue(':Sexo'			, $sexo,		PDO::PARAM_STR);
			$stm->bindValue(':DocColab'		, $cpf_ok,		PDO::PARAM_STR);
			$stm->bindValue(':RuaColab'		, $rua,			PDO::PARAM_STR);        
			$stm->bindValue(':NumColab'		, $num,			PDO::PARAM_STR);
			$stm->bindValue(':ComplNum'		, $compl,		PDO::PARAM_STR);
			$stm->bindValue(':Bairro'		, $bair,		PDO::PARAM_STR);
			$stm->bindValue(':Cep'			, $cep_ok,		PDO::PARAM_STR);
			$stm->bindValue(':Cidade'		, $cidad,		PDO::PARAM_STR);
			$stm->bindValue(':Estado'		, $est,			PDO::PARAM_STR);
			$stm->bindValue(':Banco'		, $bconum,		PDO::PARAM_STR);
			$stm->bindValue(':NomeBanco'	, $bconom,		PDO::PARAM_STR);
			$stm->bindValue(':Agencia'		, $bcoag,		PDO::PARAM_STR);
			$stm->bindValue(':DigAgencia'	, $bcodag,		PDO::PARAM_STR);
			$stm->bindValue(':NumConta'		, $bcocta,		PDO::PARAM_STR);
			$stm->bindValue(':DigConta'		, $bcodcta,		PDO::PARAM_STR);
			$stm->bindValue(':DataNasc'		, $data_ansi,	PDO::PARAM_STR);
			$stm->bindValue(':Telefone1'	, $tel1_ok,		PDO::PARAM_STR);
			$stm->bindValue(':Telefone2'	, $tel2_ok,		PDO::PARAM_STR);
			$stm->bindValue(':Email'		, $correio,		PDO::PARAM_STR);
			$stm->bindValue(':Comissao'		, $comis,		PDO::PARAM_STR);
			$stm->bindValue(':FunColab'		, $func,		PDO::PARAM_STR);
			$stm->bindValue(':RegColab'		, $numreg,		PDO::PARAM_STR);
			
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=http://localhost/megaliga/'>";
			
			// echo("Dados recebidos e preparados: ".$idcamp." - ".$nome." - ".$comprim." - ".$largura." - ".$cap_torc." - ".$foto_est1." - ".$foto_est2." - ".$foto_est3." - ".$foto_est4);
			
		endif;
	
	?>
	</div>
</body>
</html>