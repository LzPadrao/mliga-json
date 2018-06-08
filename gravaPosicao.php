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
		$funcao		= (isset($_POST['funcao'])) 	? $_POST['funcao'] : '';
		$posicao  	= (isset($_POST['posicao']))	? $_POST['posicao'] : '';

		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($funcao == ''):
				$mensagem .= '<li>Favor selecionar a função.</li>';
		    endif;

			if ($posicao == ''): 		
				$mensagem .= '<li>Favor preencher quantidade de jogadores.</li>';
			endif;
		endif;
		
		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			$sql = "INSERT INTO tbposicao (Funcao,Posicao) VALUES (:funcao,:posicao)";

			$stm = $pdo->prepare($sql);
			$stm->bindValue(':funcao'		, $funcao,		PDO::PARAM_STR);
			$stm->bindValue(':posicao'	 	, $posicao,	 	PDO::PARAM_STR);
			
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=formPosicao.php'>";
			
			// echo("Dados recebidos e preparados: ".$idcateg." - ".$nome." - ".$qtjog." - ".$repres." - ".$foto_escudo." - ".$foto_patr1." - ".$foto_patr2." - ".$foto_patr3);
		endif;
	?>
	</div>
</body>
</html>