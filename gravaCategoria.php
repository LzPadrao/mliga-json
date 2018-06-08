<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Inclusão de Categoria</title>
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
		$nome		= (isset($_POST['NomeCateg'])) 	? $_POST['NomeCateg'] : '';
		$abrev		= (isset($_POST['AbvCateg'])) 	? $_POST['AbvCateg'] : '';
		$dtmin 		= (isset($_POST['DataMin'])) 	? $_POST['DataMin'] : '';
		$dtmax	 	= (isset($_POST['DataMax'])) 	? $_POST['DataMax'] : '';
		$deftime	= (isset($_POST['DefTimes'])) 	? $_POST['DefTimes'] : '';
		$qtimes		= (isset($_POST['QtTimes'])) 	? $_POST['QtTimes'] : '';
		$qatlet		= (isset($_POST['QtAtleta'])) 	? $_POST['QtAtleta'] : '';
		$formato	= (isset($_POST['Formato'])) 	? $_POST['Formato'] : '';
		$vitoria	= (isset($_POST['PontoVit'])) 	? $_POST['PontoVit'] : '';
		$empate		= (isset($_POST['PontoEmp'])) 	? $_POST['PontoEmp'] : '';
		$derrota	= (isset($_POST['PontoDer'])) 	? $_POST['PontoDer'] : '';
		$tmpart		= (isset($_POST['TempPart'])) 	? $_POST['TempPart'] : '';
		$tminterv	= (isset($_POST['TempInterv'])) ? $_POST['TempInterv'] : '';
		$substit	= (isset($_POST['QtSubst'])) 	? $_POST['QtSubst'] : '';
		
		$seg  	= (isset($_POST['jgSG']))	? $_POST['jgSG'] : '';
		$ter  	= (isset($_POST['jgTR']))	? $_POST['jgTR'] : '';
		$qua  	= (isset($_POST['jgQA']))	? $_POST['jgQA'] : '';
		$qui  	= (isset($_POST['jgQI']))	? $_POST['jgQI'] : '';
		$sex  	= (isset($_POST['jgSX']))	? $_POST['jgSX'] : '';
		$sab  	= (isset($_POST['jgSB']))	? $_POST['jgSB'] : '';
		$dom  	= (isset($_POST['jgDM']))	? $_POST['jgDM'] : '';

		$dsg	= (isset($_POST['sg']))	? $_POST['sg'] : '';
		$dtr	= (isset($_POST['tr']))	? $_POST['tr'] : '';
		$dqa	= (isset($_POST['qa']))	? $_POST['qa'] : '';
		$dqi	= (isset($_POST['qi']))	? $_POST['qi'] : '';
		$dsx	= (isset($_POST['sx']))	? $_POST['sx'] : '';
		$dsb	= (isset($_POST['sb']))	? $_POST['sb'] : '';
		$ddm	= (isset($_POST['dm']))	? $_POST['dm'] : '';
		$irod	= (isset($_POST['sem']))	? $_POST['sem'] : '';

		/* 
		// REMOVER - Constrói a data inicio campeonatp no formato ANSI yyyy/mm/dd
			$data_temp = explode('/', $nasc);
			$data_ansi = $data_temp[2] . '-' . $data_temp[1] . '-' . $data_temp[0];

		echo "Dados ".$nome." - ".$arq_colab." - ".$sexo." - ".$doc." - ".$rua." - ".$num." - ".$compl." - ".$bair." - ".$cep." - ".$cidad." - ".$est." - ".$data_ansi." - ".$tel1_ok." - ".$tel2_ok." - ".$correio." - ".$comis." - ".$func;
		*/
		

		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($idcamp == ''):
				$mensagem .= '<li>Selecione o campeonato.</li>';
		    endif;

			if ($nome == '' || strlen($nome) < 3):
				$mensagem .= '<li>Favor preencher o Nome.</li>';
		    endif;

			if ($abrev == ''): 		
				$mensagem .= '<li>Informe uma abreviação.</li>';
			endif;

			if ($dtmin == ''): 		
				$mensagem .= '<li>Informe a data mínima.</li>';
			else:
				$datmn = explode('/', $dtmin);
				if (!checkdate($datmn[1], $datmn[0], $datmn[2])):
					$mensagem .= '<li>Formato da data mínima inválida.</li>';
				endif;
			endif;

			if ($dtmax == ''): 		
				$mensagem .= '<li>Informe a data máxima.</li>';
			else:
				$datmx = explode('/', $dtmax);
				if (!checkdate($datmx[1], $datmx[0], $datmx[2])):
					$mensagem .= '<li>Formato da data máxima inválida.</li>';
				endif;
			endif;

			if ($deftime == ''):
			   $mensagem .= '<li>Informe a definição dos times.</li>';
			endif;

			if ($qtimes == ''):
			   $mensagem .= '<li>Informe a quantidade de times.</li>';
			endif;
			
			if ($qatlet == ''):
			   $mensagem .= '<li>Informe a quantidade de atletas por time.</li>';
			endif;

			if ($formato == ''):
			   $mensagem .= '<li>Informe o formato da categoria.</li>';
			endif;
			
			if ($vitoria == ''):
			   $mensagem .= '<li>Informe os pontos quando vitória.</li>';
			endif;

			if ($empate == ''):
			   $mensagem .= '<li>Informe os pontos quando empate.</li>';
			endif;

			if ($derrota == ''):
			   $mensagem .= '<li>Informe os pontos quando derrota.</li>';
			endif;

			if ($tmpart == ''):
			   $mensagem .= '<li>Informe o tempo de partida.</li>';
			endif;

			if ($tminterv == ''):
			   $mensagem .= '<li>Informe o tempo de intervalo.</li>';
			endif;

			if ($mensagem != ''):
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
				exit;
			endif;

			// Constrói a data inicio campeonatp no formato ANSI yyyy/mm/dd
			$data_temp = explode('/', $dtmin);
			$data_ansi = $data_temp[2] . '-' . $data_temp[1] . '-' . $data_temp[0];

			// Constrói a data fim do campeonato no formato ANSI yyyy/mm/dd
			$data_temp2 = explode('/', $dtmax);
			$data_ansi2 = $data_temp2[2] . '-' . $data_temp2[1] . '-' . $data_temp2[0];
		endif;
				
		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):
			
		// INICIO DO TRECHO DE CONSTRUÇÃO DOS DIAS DE JOGOS
			// array que armazena a informãção da quantidade de jogos pelo dia da semana 
			$jogos 		= array($seg,$ter,$qua,$qui,$sex,$sab,$dom);
			$tm 		= count($jogos);
			// quantidade de partidas
			$qpart		= 0;
			
			// Para os campos vazios, atribui zero no array
			for($i=0;$i<=($tm-1);$i++)
			{
				if($jogos[$i]=="")
				{
					$jogos[$i] = 0;
				}
				// soma para obter a quantidade de partidas (usar na validação de quantidade de partidas por rodada)
				$qpart += $jogos[$i];
			}

			// transforma o array em string
			$diasjogo = implode(";",$jogos);
		// FIM DO TRECHO DE CONSTRUÇÃO DOS DIAS DE JOGOS

		// Constrói a data minima no formato ANSI yyyy/mm/dd
			$data_temp = explode('/', $dtmin);
			$data_ansi = $data_temp[2] . '-' . $data_temp[1] . '-' . $data_temp[0];

		// Constrói a data maxima no formato ANSI yyyy/mm/dd
			$data_temp2 = explode('/', $dtmax);
			$data_ansi2 = $data_temp2[2] . '-' . $data_temp2[1] . '-' . $data_temp2[0];

			$sql = "INSERT INTO tbcategoria(IdCampeonato,NomeCateg,AbrevCateg,DataMin,DataMax,QtTimes,QtAtletas,DefTimes,Formato,PontoVit,PontoEmp,PontoDer,TempInterv,TempPartid,QtdSubst,JogoQt,JogoDia,InicioRod) VALUES (:TbCamp,:NomeCateg,:AbvCateg,:DataMin,:DataMax,:QtTimes,:QtAtleta,:DefTimes,:Formato,:PontoVit,:PontoEmp,:PontoDer,:TempInterv,:TempPart,:QtSubst,:QtJogos,:DiaJogo,:IniRod)";

			$stm = $pdo->prepare($sql);
			$stm->bindValue(':TbCamp',   	$idcamp,		PDO::PARAM_INT);	
			$stm->bindValue(':NomeCateg',   $nome,			PDO::PARAM_STR);			
			$stm->bindValue(':AbvCateg',    $abrev,			PDO::PARAM_STR);
			$stm->bindValue(':DataMin',    	$data_ansi,		PDO::PARAM_STR);
			$stm->bindValue(':DataMax',    	$data_ansi2,	PDO::PARAM_STR);
			$stm->bindValue(':QtTimes',  	$qtimes,		PDO::PARAM_INT);
			$stm->bindValue(':QtAtleta',  	$qatlet,		PDO::PARAM_INT);
			$stm->bindValue(':DefTimes',  	$deftime,		PDO::PARAM_STR);
			$stm->bindValue(':Formato',  	$formato,		PDO::PARAM_STR);
			$stm->bindValue(':PontoVit', 	$vitoria,		PDO::PARAM_INT);
			$stm->bindValue(':PontoEmp', 	$empate,		PDO::PARAM_INT);
			$stm->bindValue(':PontoDer', 	$derrota,		PDO::PARAM_INT);
			$stm->bindValue(':TempPart', 	$tmpart,		PDO::PARAM_INT);
			$stm->bindValue(':TempInterv',  $tminterv,		PDO::PARAM_INT);
			$stm->bindValue(':QtSubst', 	$substit,		PDO::PARAM_INT);
			$stm->bindValue(':QtJogos', 	$qpart,			PDO::PARAM_INT);
			$stm->bindValue(':DiaJogo',  	$diasjogo,		PDO::PARAM_INT);
			$stm->bindValue(':IniRod', 		$irod,			PDO::PARAM_INT);
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